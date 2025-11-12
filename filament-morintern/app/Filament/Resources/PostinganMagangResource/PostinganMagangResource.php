<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostinganMagangResource\Pages;
use App\Models\PostinganMagang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PostinganMagangResource extends Resource
{
    protected static ?string $model = PostinganMagang::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationLabel = 'Postingan Magang';
    protected static ?string $navigationGroup = 'Manajemen Magang';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('judul_posisi')
                ->label('Judul Posisi')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('deskripsi')
                ->label('Deskripsi Pekerjaan')
                ->required()
                ->rows(4),

            Forms\Components\TextInput::make('durasi')
                ->label('Durasi Magang (contoh: 3 Bulan)')
                ->required(),

            Forms\Components\TextInput::make('kuota')
                ->label('Kuota')
                ->numeric()
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul_posisi')
                    ->label('Posisi')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('durasi')
                    ->label('Durasi')
                    ->sortable(),

                Tables\Columns\TextColumn::make('kuota')
                    ->label('Kuota')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPostinganMagangs::route('/'),
            'create' => Pages\CreatePostinganMagang::route('/create'),
            'edit' => Pages\EditPostinganMagang::route('/{record}/edit'),
        ];
    }
}
