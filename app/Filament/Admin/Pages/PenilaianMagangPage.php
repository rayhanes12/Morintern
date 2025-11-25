<?php

namespace App\Filament\Admin\Pages;

use App\Models\PenilaianMagang;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class PenilaianMagangPage extends Page implements Forms\Contracts\HasForms, Tables\Contracts\HasTable
{
    use Forms\Concerns\InteractsWithForms;
    use Tables\Concerns\InteractsWithTable;

    public function getTitle(): string
    {
        return 'Penilaian Magang';
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-document-text';
    }

    public static function getNavigationGroup(): string
    {
        return 'Magang';
    }

    public function getView(): string
    {
        return 'filament.pages.penilaian-magang-page';
    }


    // Query data tabel
    public function getTableQuery()
    {
        return PenilaianMagang::query();
    }

    // 🔹 Bagian form input penilaian
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('nama')
                    ->label('Pilih Anggota Magang')
                    ->options([
                        'Siti Khodijah' => 'Siti Khodijah',
                        'Ahmad Satria Wibowo' => 'Ahmad Satria Wibowo',
                        'Arda Yudrik' => 'Arda Yudrik',
                    ])
                    ->searchable()
                    ->required(),

                TextInput::make('nilai_rata_rata')
                    ->label('Nilai')
                    ->numeric()
                    ->suffix('%')
                    ->required(),

                Textarea::make('masukan')
                    ->label('Masukan / Catatan')
                    ->rows(3)
                    ->maxLength(500),

                FileUpload::make('file_penilaian')
                    ->label('Upload File Penilaian')
                    ->directory('penilaian-magang')
                    ->preserveFilenames()
                    ->acceptedFileTypes([
                        'application/pdf',
                        'application/vnd.ms-excel',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    ]),
            ])
            ->statePath('data');
    }

    // 🔹 Bagian tabel daftar penilaian
    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns([
                TextColumn::make('id')->label('No')->rowIndex(),
                TextColumn::make('nama')->label('Nama Anggota'),
                TextColumn::make('nilai_rata_rata')->label('Nilai Rata-rata'),
                TextColumn::make('file_penilaian')->label('File Penilaian'),
                TextColumn::make('masukan')->label('Masukan')->limit(30),
            ])
            ->defaultSort('id', 'asc')
            ->emptyStateHeading('Belum ada data penilaian');
    }

    // 🔹 Saat form disubmit
    public function save(): void
    {
        PenilaianMagang::create($this->form->getState());

        $this->notify('success', 'Penilaian berhasil disimpan!');
        $this->reset('data');
    }
}
