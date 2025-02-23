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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_tamu'),
                TextInput::make('nama_siswa'),
                Textarea::make('tujuan')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_tamu'),
                TextColumn::make('nama_siswa'),
                TextColumn::make('tujuan'),
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
