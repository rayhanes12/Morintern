<?php

namespace App\Filament\Admin\Resources\RoleKonfirmasiResource\Pages;

use Illuminate\Database\Eloquent\Builder;
use App\Filament\Admin\Resources\RoleKonfirmasiResource;
use App\Models\User;
use App\Filament\Admin\Resources\RoleKonfirmasiResource\Schemas\TableSchema;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class ListRoleKonfirmasis extends ListRecords
{
    protected static string $resource = RoleKonfirmasiResource::class;

    protected function getTableQuery(): Builder
    {
        $schema = TableSchema::make();

        if (! empty($schema['queryCallback']) && is_callable($schema['queryCallback'])) {
            return call_user_func($schema['queryCallback'], User::query()->with(['role', 'requestedRole']));
        }

        return User::query()->with(['role', 'requestedRole'])->whereNotNull('requested_role_id')->whereColumn('role_id', '!=', 'requested_role_id');
    }

    protected function getTableColumns(): array
    {
        $schema = TableSchema::make();

        return $schema['columns'] ?? [];
    }

    protected function getTableActions(): array
    {
        $schema = TableSchema::make();

        return $schema['actions'] ?? [];
    }
}