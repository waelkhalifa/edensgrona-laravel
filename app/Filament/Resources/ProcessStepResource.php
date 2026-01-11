<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProcessStepResource\Pages;
use App\Models\ProcessStep;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProcessStepResource extends Resource
{
    protected static ?string $model = ProcessStep::class;

    protected static ?string $navigationIcon = 'heroicon-o-numbered-list';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                                        ->columns()
                                        ->schema([
                                            Forms\Components\TextInput::make('step_number')
                                                                      ->required()
                                                                      ->numeric()
                                                                      ->minValue(1)
                                                                      ->maxValue(10),

                                            Forms\Components\TextInput::make('title')
                                                                      ->required()
                                                                      ->maxLength(255),

                                            Forms\Components\Textarea::make('description')
                                                                     ->required()
                                                                     ->rows(4)
                                                                     ->columnSpanFull(),

                                            /*   Forms\Components\TextInput::make('icon')
                                                   ->maxLength(255)
                                                   ->helperText('Font Awesome icon class'),*/

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
                Tables\Columns\TextColumn::make('step_number')
                                         ->sortable()
                                         ->badge()
                                         ->color('success'),
                Tables\Columns\TextColumn::make('title')
                                         ->searchable()
                                         ->sortable(),
                Tables\Columns\TextColumn::make('description')
                                         ->limit(50)
                                         ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                                         ->boolean(),
            ])
            ->defaultSort('step_number')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active'),
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
            'index' => Pages\ListProcessSteps::route('/'),
            'create' => Pages\CreateProcessStep::route('/create'),
            'edit' => Pages\EditProcessStep::route('/{record}/edit'),
        ];
    }
}
