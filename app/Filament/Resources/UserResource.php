<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
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

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'User';

    // protected static ?string $navigationGroup = 'Data';

    protected static ?string $slug = 'kelola-user';


    // public static ?string $label = 'User';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('User')
                    // ->description('Prevent abuse by limiting the number of requests per period')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama User')
                            ->placeholder('masukkan nama user')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label('Email')
                            ->placeholder('masukkan email')
                            ->required()
                            ->maxLength(255)
                            ->email()
                            ->unique(ignoreRecord: true),
                        TextInput::make('password')
                            ->label('Password')
                            ->password()
                            ->required()
                            ->maxLength(255),
                            Select::make('roles')
                            ->relationship('roles', 'name')
                        // DateTimePicker::make('email_verified_at'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->sortable()
                    // ->copyable()
                    // ->copyMessage('berhasil menyalin')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('roles.name')
                    ->searchable(),
                // TextColumn::make('email_verified_at')
                //     ->label('Email verified at')
                //     ->sortable()
                //     ->dateTime()
                //     ->searchable(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
