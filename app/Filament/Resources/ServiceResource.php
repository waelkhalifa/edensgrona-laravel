<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                                        ->columns()
                                        ->schema([
                                            Forms\Components\TextInput::make('title')
                                                                      ->required()
                                                                      ->maxLength(255)
                                                                      ->columnSpanFull(),

                                            SpatieMediaLibraryFileUpload::make('image')
                                                                        ->collection('image')
                                                                        ->image()
                                                                        ->imageEditor()
                                                                        ->imageEditorAspectRatios([
                                                                            '16:9',
                                                                            '4:3',
                                                                            '1:1',
                                                                        ])
                                                                        ->maxSize(2048)
                                                                        ->helperText('Upload service image (max 2MB)')
                                                                        ->columnSpanFull(),

                                            Forms\Components\Textarea::make('description')
                                                                     ->rows(3)
                                                                     ->columnSpanFull(),

                                          /*  Forms\Components\TextInput::make('icon')
                                                                      ->maxLength(255)
                                                                      ->helperText('Font Awesome icon class (e.g., fa-solid fa-tree)')
                                                                      ->placeholder('fa-solid fa-tree'),*/

                                            Forms\Components\TextInput::make('order')
                                                                      ->numeric()
                                                                      ->default(0)
                                                                      ->required()
                                                                      ->minValue(0),

                                            Forms\Components\Toggle::make('is_active')
                                                                   ->default(true)
                                                                   ->required(),
                                        ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')
                                         ->sortable()
                                         ->badge()
                                         ->color('success'),

                SpatieMediaLibraryImageColumn::make('image')
                                             ->collection('image')
                                             ->circular()
                                             ->size(60),

                Tables\Columns\TextColumn::make('title')
                                         ->searchable()
                                         ->sortable()
                                         ->weight('bold'),

                Tables\Columns\TextColumn::make('icon')
                                         ->icon(fn($record) => $record->icon)
                                         ->toggleable(),

                Tables\Columns\IconColumn::make('is_active')
                                         ->boolean()
                                         ->trueIcon('heroicon-o-check-circle')
                                         ->falseIcon('heroicon-o-x-circle')
                                         ->trueColor('success')
                                         ->falseColor('danger'),

                Tables\Columns\TextColumn::make('created_at')
                                         ->dateTime()
                                         ->sortable()
                                         ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('order')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                                            ->label('Status')
                                            ->placeholder('All services')
                                            ->trueLabel('Active only')
                                            ->falseLabel('Inactive only'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('order');
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
