<?php

namespace App\Filament\Pages;

use App\Settings\AboutSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageAboutSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 3;

    protected static string $settings = AboutSettings::class;

    protected static ?string $title = 'About Page';

    protected static ?string $navigationLabel = 'About Page';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('About Page Content')
                                        ->description('Manage the content displayed on the About page')
                                        ->schema([
                                            Forms\Components\TextInput::make('title')
                                                                      ->required()
                                                                      ->maxLength(255)
                                                                      ->label('Page Title')
                                                                      ->placeholder('Om oss'),

                                            Forms\Components\TextInput::make('subtitle')
                                                                      ->maxLength(255)
                                                                      ->label('Subtitle')
                                                                      ->placeholder('Kunskap, kärlek och kvalitet i varje detalj'),

                                            Forms\Components\RichEditor::make('content')
                                                                       ->required()
                                                                       ->label('Main Content')
                                                                       ->columnSpanFull()
                                                                       ->toolbarButtons([
                                                                           'bold',
                                                                           'italic',
                                                                           'underline',
                                                                           'bulletList',
                                                                           'orderedList',
                                                                           'h2',
                                                                           'h3',
                                                                           'link',
                                                                           'undo',
                                                                           'redo',
                                                                       ]),

                                            Forms\Components\TextInput::make('values_title')
                                                                      ->maxLength(255)
                                                                      ->label('Values Section Title')
                                                                      ->placeholder('Våra värderingar'),
                                        ]),
            ]);
    }
}
