<?php

namespace App\Filament\Pages;

use App\Settings\ContactSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageContactSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-phone';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 2;

    protected static string $settings = ContactSettings::class;

    protected static ?string $title = 'Contact Settings';

    protected static ?string $navigationLabel = 'Contact';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Contact Information')
                                        ->schema([
                                            Forms\Components\TextInput::make('email')
                                                                      ->required()
                                                                      ->email()
                                                                      ->label('Email Address'),

                                            Forms\Components\TextInput::make('phone')
                                                                      ->required()
                                                                      ->tel()
                                                                      ->label('Phone Number'),

                                            Forms\Components\Textarea::make('address')
                                                                     ->required()
                                                                     ->rows(3)
                                                                     ->label('Physical Address'),
                                        ]),

            ]);
    }
}
