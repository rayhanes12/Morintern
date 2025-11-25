<?php

namespace App\Filament\Admin\Resources\RoleKonfirmasiResource\Schemas;

use Filament\Actions\Action;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class TableSchema
{
    public static function make(): array
    {
        return [
            'queryCallback' => function ($query) {
                return $query->whereNotNull('requested_role_id')->whereColumn('role_id', '!=', 'requested_role_id');
            },
            'columns' => [
                TextColumn::make('name')->label('Name')->searchable(),
                TextColumn::make('email')->label('Email')->searchable(),
                TextColumn::make('requestedRole.label')->label('Requested Role'),
                TextColumn::make('role.label')->label('Current Role'),
                BadgeColumn::make('status')->label('Status')->formatStateUsing(fn () => 'Pending')->colors(['warning']),
            ],
            'actions' => [
                Action::make('accept')
                    ->label('Accept')
                    ->requiresConfirmation()
                    ->action(function (User $record) {
                        if (!auth()->user() || auth()->user()->role->name !== 'superadmin') {
                            abort(403);
                        }

                        DB::transaction(function () use ($record) {
                            $old = $record->role_id;
                            $record->role_id = $record->requested_role_id;
                            $record->requested_role_id = null;
                            $record->save();
                            Log::info('RoleKonfirmasi: accepted', ['user_id' => $record->id, 'old_role' => $old, 'new_role' => $record->role_id, 'by' => auth()->id()]);
                        });
                    })
                    ->visible(fn () => auth()->user() && auth()->user()->role->name === 'superadmin'),

                Action::make('reject')
                    ->label('Reject')
                    ->requiresConfirmation()
                    ->action(function (User $record) {
                        if (!auth()->user() || auth()->user()->role->name !== 'superadmin') {
                            abort(403);
                        }

                        DB::transaction(function () use ($record) {
                            $oldRequested = $record->requested_role_id;
                            $record->requested_role_id = null;
                            $record->save();
                            Log::info('RoleKonfirmasi: rejected', ['user_id' => $record->id, 'rejected_role' => $oldRequested, 'by' => auth()->id()]);
                        });
                    })
                    ->visible(fn () => auth()->user() && auth()->user()->role->name === 'superadmin'),
            ],
        ];
    }
}
