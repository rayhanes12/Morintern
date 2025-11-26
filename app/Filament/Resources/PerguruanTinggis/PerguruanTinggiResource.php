<?php

namespace App\Filament\Resources\PerguruanTinggis;

use App\Filament\Resources\PerguruanTinggis\Pages\ManagePerguruanTinggis;
use App\Models\PerguruanTinggi;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PerguruanTinggiResource extends Resource
{
    protected static ?string $model = PerguruanTinggi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Perguruan Tinggi';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('Perguruan Tinggi')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Perguruan Tinggi')
            ->columns([
                TextColumn::make('Perguruan Tinggi')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManagePerguruanTinggis::route('/'),
        ];
    }
}
