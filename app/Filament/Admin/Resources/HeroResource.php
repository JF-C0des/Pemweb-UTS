<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroResource\Pages;
use App\Models\Hero;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class HeroResource extends Resource
{
    protected static ?string $model = Hero::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Hero Section';
    protected static ?string $pluralLabel = 'Hero Sections';
    protected static ?string $slug = 'heroes';
    protected static ?string $navigationGroup = 'Frontend Settings';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Judul Hero')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(4)
                    ->nullable(),

                TextInput::make('button_text')
                    ->label('Teks Tombol')
                    ->nullable(),

                TextInput::make('button_link')
                    ->label('Link Tombol')
                    ->nullable(),

                TextInput::make('contact_text')
                    ->label('Kontak Utama')
                    ->nullable(),

                TextInput::make('contact_subtext')
                    ->label('Subteks Kontak')
                    ->nullable(),

                FileUpload::make('image_main')
                    ->label('Gambar Utama')
                    ->image()
                    ->directory('heroes')
                    ->nullable(),

                Repeater::make('shape_images')
                    ->label('Shape Images')
                    ->schema([
                        FileUpload::make('path')
                            ->label('File Shape')
                            ->image()
                            ->directory('heroes/shapes'),
                    ])
                    ->default([])
                    ->columns(1)
                    ->nullable(),

                Toggle::make('is_active')
                    ->label('Aktifkan Hero Ini')
                    ->default(true),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Judul')->searchable()->sortable(),
                IconColumn::make('is_active')->label('Aktif')->boolean(),
                TextColumn::make('created_at')->label('Dibuat')->dateTime('d M Y'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHeroes::route('/'),
            'create' => Pages\CreateHero::route('/create'),
            'edit' => Pages\EditHero::route('/{record}/edit'),
        ];
    }
}
