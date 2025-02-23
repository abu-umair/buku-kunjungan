<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TamuResource\Pages;
use App\Filament\Resources\TamuResource\RelationManagers;
use App\Models\Tamu;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TamuResource extends Resource
{
    protected static ?string $model = Tamu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Tamu';

    // protected static ?string $navigationGroup = 'Data';

    protected static ?string $slug = 'kelola-tamu';


    public static ?string $label = 'Tamu';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_tamu')
                    ->label('Nama Tamu')
                    ->placeholder('masukkan nama tamu')
                    ->required(),
                TextInput::make('nama_siswa')
                    ->label('Nama Siswa')
                    ->placeholder('masukkan nama siswa')
                    ->required(),
                Textarea::make('tujuan')
                    // ->label('Nama Tamu')
                    ->placeholder('masukkan tujuan')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_tamu')
                    ->label('Nama Tamu')
                    ->sortable()
                    // ->copyable()
                    // ->copyMessage('berhasil menyalin')
                    ->searchable(),
                TextColumn::make('nama_siswa')
                    ->label('Nama Siswa')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('tujuan')
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
            'index' => Pages\ListTamus::route('/'),
            'create' => Pages\CreateTamu::route('/create'),
            'edit' => Pages\EditTamu::route('/{record}/edit'),
        ];
    }
}
