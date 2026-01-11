<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactSubmissionResource\Pages;
use App\Models\ContactSubmission;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactSubmissionResource extends Resource
{
    protected static ?string $model = ContactSubmission::class;
    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationLabel = 'Contact Submissions';
    protected static ?string $modelLabel = 'Contact Submission';
    protected static ?string $pluralModelLabel = 'Contact Submissions';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::where('status', 'new')->count();

        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::where('status', 'new')->count() > 0 ? 'warning' : 'success';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)
                                     ->schema([
                                         // Left Column - Contact Info
                                         Forms\Components\Section::make('Contact Information')
                                                                 ->schema([
                                                                     Forms\Components\Grid::make(2)
                                                                                          ->schema([
                                                                                              Forms\Components\TextInput::make('first_name')
                                                                                                                        ->label('Förnamn')
                                                                                                                        ->disabled()
                                                                                                                        ->dehydrated(false),
                                                                                              Forms\Components\TextInput::make('last_name')
                                                                                                                        ->label('Efternamn')
                                                                                                                        ->disabled()
                                                                                                                        ->dehydrated(false),
                                                                                          ]),
                                                                     Forms\Components\TextInput::make('email')
                                                                                               ->label('E-post')
                                                                                               ->disabled()
                                                                                               ->dehydrated(false)
                                                                                               ->prefixIcon('heroicon-o-envelope')
                                                                                               ->url(fn($record
                                                                                               ) => $record ? "mailto:{$record->email}" : null),
                                                                     Forms\Components\TextInput::make('phone')
                                                                                               ->label('Telefonnummer')
                                                                                               ->disabled()
                                                                                               ->dehydrated(false)
                                                                                               ->prefixIcon('heroicon-o-phone')
                                                                                               ->url(fn($record
                                                                                               ) => $record ? "tel:{$record->phone}" : null),
                                                                     Forms\Components\Select::make('customer_type')
                                                                                            ->label('Kundtyp')
                                                                                            ->options([
                                                                                                'private' => 'Privatperson',
                                                                                                'company' => 'Företag eller bostadsrättsförening',
                                                                                            ])
                                                                                            ->disabled()
                                                                                            ->dehydrated(false),
                                                                 ])
                                                                 ->columnSpan(1),

                                         // Middle Column - Address & Request
                                         Forms\Components\Section::make('Address & Request Details')
                                                                 ->schema([
                                                                     Forms\Components\TextInput::make('address')
                                                                                               ->label('Adress')
                                                                                               ->disabled()
                                                                                               ->dehydrated(false)
                                                                                               ->prefixIcon('heroicon-o-map-pin'),
                                                                     Forms\Components\Grid::make(2)
                                                                                          ->schema([
                                                                                              Forms\Components\TextInput::make('postal_code')
                                                                                                                        ->label('Postnummer')
                                                                                                                        ->disabled()
                                                                                                                        ->dehydrated(false),
                                                                                              Forms\Components\TextInput::make('city')
                                                                                                                        ->label('Stad')
                                                                                                                        ->disabled()
                                                                                                                        ->dehydrated(false),
                                                                                          ]),
                                                                     Forms\Components\Textarea::make('help_needed')
                                                                                              ->label('Behöver hjälp med')
                                                                                              ->disabled()
                                                                                              ->dehydrated(false)
                                                                                              ->rows(4)
                                                                                              ->columnSpanFull(),
                                                                     Forms\Components\Textarea::make('measurements')
                                                                                              ->label('Mått')
                                                                                              ->disabled()
                                                                                              ->dehydrated(false)
                                                                                              ->rows(3)
                                                                                              ->columnSpanFull()
                                                                                              ->visible(fn($record
                                                                                              ) => $record && $record->measurements),
                                                                     Forms\Components\Textarea::make('message')
                                                                                              ->label('Ytterligare meddelande')
                                                                                              ->disabled()
                                                                                              ->dehydrated(false)
                                                                                              ->rows(3)
                                                                                              ->columnSpanFull()
                                                                                              ->visible(fn($record
                                                                                              ) => $record && $record->message),
                                                                 ])
                                                                 ->columnSpan(1),

                                         // Right Column - Admin & Attachments
                                         Forms\Components\Section::make('Admin Section')
                                                                 ->schema([
                                                                     Forms\Components\Select::make('status')
                                                                                            ->label('Status')
                                                                                            ->options([
                                                                                                'new' => 'Ny',
                                                                                                'read' => 'Läst',
                                                                                                'replied' => 'Besvarad',
                                                                                                'archived' => 'Arkiverad',
                                                                                            ])
                                                                                            ->required()
                                                                                            ->native(false)
                                                                                            ->live(),
                                                                     Forms\Components\Textarea::make('notes')
                                                                                              ->label('Interna anteckningar')
                                                                                              ->rows(4)
                                                                                              ->placeholder('Lägg till anteckningar här...')
                                                                                              ->columnSpanFull(),
                                                                     Forms\Components\Placeholder::make('created_at')
                                                                                                 ->label('Mottagen')
                                                                                                 ->content(fn($record
                                                                                                 ) => $record ? $record->created_at->format('Y-m-d H:i:s') : '-'),
                                                                     Forms\Components\Placeholder::make('updated_at')
                                                                                                 ->label('Senast uppdaterad')
                                                                                                 ->content(fn($record
                                                                                                 ) => $record ? $record->updated_at->format('Y-m-d H:i:s') : '-'),

                                                                     SpatieMediaLibraryFileUpload::make('attachments')
                                                                                                 ->label('Bifogade filer')
                                                                                                 ->collection('attachments')
                                                                                                 ->multiple()
                                                                                                 ->disabled()
                                                                                                 ->dehydrated(false)
                                                                                                 ->downloadable()
                                                                                                 ->openable()
                                                                                                 ->previewable()
                                                                                                 ->columnSpanFull()
                                                                                                 ->visible(function ($record
                                                                                                 ) {
                                                                                                     return $record && $record->hasMedia('attachments');
                                                                                                 }),
                                                                 ])
                                                                 ->columnSpan(1),
                                     ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                                         ->label('ID')
                                         ->sortable()
                                         ->searchable()
                                         ->toggleable(),

                Tables\Columns\TextColumn::make('full_name')
                                         ->label('Namn')
                                         ->searchable(['first_name', 'last_name'])
                                         ->sortable(['first_name', 'last_name'])
                                         ->weight('bold')
                                         ->icon('heroicon-o-user')
                                         ->iconColor('primary'),

                Tables\Columns\TextColumn::make('email')
                                         ->label('E-post')
                                         ->searchable()
                                         ->copyable()
                                         ->icon('heroicon-o-envelope')
                                         ->iconColor('success')
                                         ->limit(30),

                Tables\Columns\TextColumn::make('phone')
                                         ->label('Telefon')
                                         ->searchable()
                                         ->copyable()
                                         ->icon('heroicon-o-phone')
                                         ->iconColor('info'),

                Tables\Columns\TextColumn::make('full_address')
                                         ->label('Adress')
                                         ->searchable(['address', 'city', 'postal_code'])
                                         ->limit(40)
                                         ->icon('heroicon-o-map-pin')
                                         ->toggleable()
                                         ->toggledHiddenByDefault(),

                Tables\Columns\TextColumn::make('city')
                                         ->label('Stad')
                                         ->searchable()
                                         ->sortable()
                                         ->toggleable(),

                Tables\Columns\BadgeColumn::make('customer_type')
                                          ->label('Kundtyp')
                                          ->colors([
                                              'primary' => 'private',
                                              'success' => 'company',
                                          ])
                                          ->icons([
                                              'heroicon-o-user' => 'private',
                                              'heroicon-o-building-office' => 'company',
                                          ])
                                          ->formatStateUsing(fn(string $state
                                          ): string => $state === 'private' ? 'Privatperson' : 'Företag'
                                          ),

                Tables\Columns\TextColumn::make('help_needed')
                                         ->label('Behöver hjälp med')
                                         ->limit(50)
                                         ->searchable()
                                         ->wrap()
                                         ->toggleable(),

                Tables\Columns\BadgeColumn::make('status')
                                          ->label('Status')
                                          ->colors([
                                              'warning' => 'new',
                                              'info' => 'read',
                                              'success' => 'replied',
                                              'secondary' => 'archived',
                                          ])
                                          ->icons([
                                              'heroicon-o-sparkles' => 'new',
                                              'heroicon-o-eye' => 'read',
                                              'heroicon-o-check-circle' => 'replied',
                                              'heroicon-o-archive-box' => 'archived',
                                          ])
                                          ->formatStateUsing(fn(string $state): string => match ($state) {
                                              'new' => 'Ny',
                                              'read' => 'Läst',
                                              'replied' => 'Besvarad',
                                              'archived' => 'Arkiverad',
                                              default => $state,
                                          }),

                Tables\Columns\IconColumn::make('has_attachments')
                                         ->label('Filer')
                                         ->boolean()
                                         ->getStateUsing(fn($record) => $record->hasMedia('attachments'))
                                         ->trueIcon('heroicon-o-paper-clip')
                                         ->falseIcon('heroicon-o-minus')
                                         ->trueColor('success')
                                         ->falseColor('gray')
                                         ->alignCenter(),

                Tables\Columns\TextColumn::make('created_at')
                                         ->label('Mottagen')
                                         ->dateTime('Y-m-d H:i')
                                         ->sortable()
                                         ->toggleable()
                                         ->since()
                                         ->description(fn($record) => $record->created_at->format('Y-m-d H:i')),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                                           ->label('Status')
                                           ->options([
                                               'new' => 'Ny',
                                               'read' => 'Läst',
                                               'replied' => 'Besvarad',
                                               'archived' => 'Arkiverad',
                                           ])
                                           ->multiple(),

                Tables\Filters\SelectFilter::make('customer_type')
                                           ->label('Kundtyp')
                                           ->options([
                                               'private' => 'Privatperson',
                                               'company' => 'Företag',
                                           ]),

                Tables\Filters\Filter::make('has_attachments')
                                     ->label('Har bifogade filer')
                                     ->query(fn($query) => $query->whereHas('media')),

                Tables\Filters\Filter::make('created_at')
                                     ->form([
                                         Forms\Components\DatePicker::make('created_from')
                                                                    ->label('Från datum'),
                                         Forms\Components\DatePicker::make('created_until')
                                                                    ->label('Till datum'),
                                     ])
                                     ->query(function ($query, array $data) {
                                         return $query
                                             ->when($data['created_from'],
                                                 fn($q, $date) => $q->whereDate('created_at', '>=', $date))
                                             ->when($data['created_until'],
                                                 fn($q, $date) => $q->whereDate('created_at', '<=', $date));
                                     }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                                         ->label('Visa'),

                Tables\Actions\EditAction::make()
                                         ->label('Redigera'),

                Tables\Actions\Action::make('markAsRead')
                                     ->label('Markera som läst')
                                     ->icon('heroicon-o-eye')
                                     ->color('info')
                                     ->visible(fn(ContactSubmission $record) => $record->status === 'new')
                                     ->action(function (ContactSubmission $record) {
                                         $record->markAsRead();
                                         Notification::make()
                                                     ->title('Markerad som läst')
                                                     ->success()
                                                     ->send();
                                     }),

                Tables\Actions\Action::make('markAsReplied')
                                     ->label('Markera som besvarad')
                                     ->icon('heroicon-o-check-circle')
                                     ->color('success')
                                     ->visible(fn(ContactSubmission $record) => in_array($record->status,
                                         ['new', 'read']))
                                     ->action(function (ContactSubmission $record) {
                                         $record->markAsReplied();
                                         Notification::make()
                                                     ->title('Markerad som besvarad')
                                                     ->success()
                                                     ->send();
                                     }),

                Tables\Actions\DeleteAction::make()
                                           ->label('Ta bort'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('markAsRead')
                                             ->label('Markera som läst')
                                             ->icon('heroicon-o-eye')
                                             ->color('info')
                                             ->action(function ($records) {
                                                 $records->each->markAsRead();
                                                 Notification::make()
                                                             ->title('Markerade som läst')
                                                             ->success()
                                                             ->send();
                                             }),

                    Tables\Actions\BulkAction::make('markAsReplied')
                                             ->label('Markera som besvarad')
                                             ->icon('heroicon-o-check-circle')
                                             ->color('success')
                                             ->action(function ($records) {
                                                 $records->each->markAsReplied();
                                                 Notification::make()
                                                             ->title('Markerade som besvarad')
                                                             ->success()
                                                             ->send();
                                             }),

                    Tables\Actions\DeleteBulkAction::make()
                                                   ->label('Ta bort'),
                ]),
            ])
            ->emptyStateHeading('Inga kontaktförfrågningar ännu')
            ->emptyStateDescription('När någon skickar in kontaktformuläret kommer det att visas här.')
            ->emptyStateIcon('heroicon-o-envelope');
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
