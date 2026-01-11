<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactSubmissionResource\Pages;
use App\Models\ContactSubmission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactSubmissionResource extends Resource
{
    protected static ?string $model = ContactSubmission::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'Contact Submissions';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'new')->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                                        ->columns()
                                        ->schema([
                                            Forms\Components\TextInput::make('first_name')
                                                                      ->required()
                                                                      ->maxLength(255)
                                                                      ->disabled(),

                                            Forms\Components\TextInput::make('last_name')
                                                                      ->required()
                                                                      ->maxLength(255)
                                                                      ->disabled(),

                                            Forms\Components\TextInput::make('email')
                                                                      ->email()
                                                                      ->required()
                                                                      ->maxLength(255)
                                                                      ->disabled(),

                                            Forms\Components\TextInput::make('phone')
                                                                      ->tel()
                                                                      ->maxLength(255)
                                                                      ->disabled(),

                                            Forms\Components\Textarea::make('message')
                                                                     ->required()
                                                                     ->disabled()
                                                                     ->columnSpanFull(),

                                            Forms\Components\Select::make('status')
                                                                   ->options([
                                                                       'new' => 'New',
                                                                       'read' => 'Read',
                                                                       'replied' => 'Replied',
                                                                       'archived' => 'Archived',
                                                                   ])
                                                                   ->required(),

                                            Forms\Components\Textarea::make('notes')
                                                                     ->rows(3)
                                                                     ->columnSpanFull(),
                                        ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                                         ->label('Name')
                                         ->searchable(['first_name', 'last_name'])
                                         ->weight('bold'),

                Tables\Columns\TextColumn::make('email')
                                         ->searchable()
                                         ->copyable(),

                Tables\Columns\TextColumn::make('phone')
                                         ->searchable()
                                         ->copyable(),

                Tables\Columns\TextColumn::make('message')
                                         ->limit(50)
                                         ->searchable(),

                Tables\Columns\TextColumn::make('status')
                                         ->badge()
                                         ->colors([
                                             'warning' => 'new',
                                             'primary' => 'read',
                                             'success' => 'replied',
                                             'secondary' => 'archived',
                                         ]),

                Tables\Columns\TextColumn::make('created_at')
                                         ->dateTime()
                                         ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                                           ->options([
                                               'new' => 'New',
                                               'read' => 'Read',
                                               'replied' => 'Replied',
                                               'archived' => 'Archived',
                                           ]),
            ])
            ->actions([
//                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListContactSubmissions::route('/'),
            'view' => Pages\ViewContactSubmission::route('/{record}'),
            'edit' => Pages\EditContactSubmission::route('/{record}/edit'),
        ];
    }
}
