<?php

namespace App\Filament\Admin\Pages;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class ProfilePage extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-user-circle';
    }
    public function getTitle(): string
    {
        return 'Profil HRD';
    }
    public function getView(): string
    {
        return 'filament.pages.profile-page';
    }
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            // nanti bisa diisi data user login
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('foto_profil')
                    ->label('Foto Profil')
                    ->avatar()
                    ->imageEditor()
                    ->directory('profile-photos'),

                TextInput::make('nama')
                    ->label('Nama')
                    ->required(),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->disabled(), // misal tidak bisa diubah

                TextInput::make('jabatan')
                    ->label('Jabatan'),

                TextInput::make('no_telepon')
                    ->label('No. Telepon'),

                TextInput::make('nama_perusahaan')
                    ->label('Nama Perusahaan'),

                Textarea::make('alamat')
                    ->label('Alamat'),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        // nanti diisi backend untuk update ke database
        $this->notify('success', 'Profil berhasil disimpan!');
    }
}
