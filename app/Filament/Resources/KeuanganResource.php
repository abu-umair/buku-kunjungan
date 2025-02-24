<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KeuanganResource\Pages;
use App\Filament\Resources\KeuanganResource\RelationManagers;
use App\Models\Keuangan;
use App\Models\Tamu;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KeuanganResource extends Resource
{
    protected static ?string $model = Keuangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Keuangan')
                    // ->description('Keuangan')
                    ->schema([
                        Select::make('tamu_id')
                            ->label('Pilih Tamu')
                            // ->options(Tamu::all()->pluck('nama_tamu', 'id'))
                            ->relationship('tamu', 'nama_tamu') //bisa jg pake ini
                            ->required()
                            ->reactive()
                            // ->searchable()
                            ->afterStateUpdated(function ($state, callable $set) {
                                // Dapatkan ID tamu yang dipilih
                                $tamu = Tamu::find($state);

                                // Jika tamu ditemukan, setel value ke field ID tamu
                                // if ($tamu) {
                                //     $set('tamu_id_label', $tamu->id);
                                // }
                                if ($tamu) {
                                    $set('nama_siswa', $tamu->nama_siswa);
                                }
                            }),

                        TextInput::make('nama_siswa')
                            ->label('Nama Siswa')
                            ->disabled(),

                        Textarea::make('tujuan_pembayaran')
                            ->label('Tujuan Pembayaran')
                            ->placeholder('masukkan tujuan pembayaran')
                            ->required(),
                    ])
            ]);

        // Penjelasan:

        // reactive():

        //     Membuat Select field menjadi reaktif sehingga ketika nilai diubah, fungsi afterStateUpdated akan dipanggil.

        // afterStateUpdated(function ($state, callable $set):

        //     Fungsi ini akan dipanggil setiap kali nilai dari Select field diubah.

        // $state adalah nilai yang dipilih di Select field.

        //     callable $set adalah fungsi yang digunakan untuk mengubah nilai dari field lain.

        // $tamu = Tamu::find($state):

        //     Mendapatkan objek Tamu yang dipilih berdasarkan ID ($state).

        // $set('tamu_id_label', $tamu->id):

        //     Mengatur nilai dari field tamu_id_label ke ID tamu yang dipilih.

        // TextInput::make('tamu_id_label')->label('ID Tamu')->disabled():

        //     Membuat TextInput field yang menampilkan ID tamu dan dinonaktifkan agar tidak dapat diubah oleh pengguna.
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tamu.nama_tamu')
                    ->label('Nama Tamu')
                    ->sortable()
                    // ->copyable()
                    // ->copyMessage('berhasil menyalin')
                    ->searchable(),
                TextColumn::make('tamu.nama_siswa')
                    ->label('Nama Siswa')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('tujuan_pembayaran')
                    // ->label('Nama Tamu')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListKeuangans::route('/'),
            'create' => Pages\CreateKeuangan::route('/create'),
            'edit' => Pages\EditKeuangan::route('/{record}/edit'),
        ];
    }
}
