<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageGeneralSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 2;

    protected static string $settings = GeneralSettings::class;

    protected static ?string $title = 'General Settings';

    protected static ?string $navigationLabel = 'General';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Site Information')
                                        ->description('Manage general site settings')
                                        ->schema([
                                            Forms\Components\TextInput::make('site_title')
                                                                      ->required()
                                                                      ->maxLength(255)
                                                                      ->label('Site Title')
                                                                      ->placeholder('Edens Gröna')
                                                                      ->helperText('The main title of your website'),

                                            Forms\Components\TextInput::make('google_reviews_url')
                                                                      ->required()
                                                                      ->url()
                                                                      ->maxLength(500)
                                                                      ->label('Google Reviews URL')
                                                                      ->placeholder('https://www.google.com/...')
                                                                      ->helperText('Link to your Google Business reviews')
                                                                      ->columnSpanFull(),

                                            Forms\Components\TextInput::make('footer_text')
                                                                      ->required()
                                                                      ->maxLength(255)
                                                                      ->label('Footer Copyright Text')
                                                                      ->placeholder('© 2025 - Utvecklad av Multicaret Inc.')
                                                                      ->helperText('Text displayed in the website footer'),
                                        ]),
            ]);
    }
}
