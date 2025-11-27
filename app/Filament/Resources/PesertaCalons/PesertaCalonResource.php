<?php

namespace App\Filament\Resources\PesertaCalons;

use App\Filament\Resources\PesertaCalons\Pages\CreatePesertaCalon;
use App\Filament\Resources\PesertaCalons\Pages\EditPesertaCalon;
use App\Filament\Resources\PesertaCalons\Pages\ListPesertaCalons;
use App\Filament\Resources\PesertaCalons\Pages\ViewPesertaCalon;
use App\Filament\Resources\PesertaCalons\Schemas\PesertaCalonForm;
use App\Filament\Resources\PesertaCalons\Schemas\PesertaCalonInfolist;
use App\Filament\Resources\PesertaCalons\Tables\PesertaCalonsTable;
use App\Models\PesertaCalon;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

    class PesertaCalonResource extends Resource
    {
        protected static ?string $model = PesertaCalon::class;

        protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

        protected static ?string $recordTitleAttribute = 'Calon Peserta';

        public static function form(Schema $schema): Schema
        {
            return PesertaCalonForm::configure($schema);
        }

        public static function infolist(Schema $schema): Schema
        {
            return PesertaCalonInfolist::configure($schema);
        }

        public static function table(Table $table): Table
        {
            return PesertaCalonsTable::configure($table);
        }

        public static function getRelations(): array
        {
            return [
                //
            ];
        }

        public static function getPages(): array
        {
            return [
                'index' => ListPesertaCalons::route('/'),
                'create' => CreatePesertaCalon::route('/create'),
                'view' => ViewPesertaCalon::route('/{record}'),
                'edit' => EditPesertaCalon::route('/{record}/edit'),
            ];
        }
    }
