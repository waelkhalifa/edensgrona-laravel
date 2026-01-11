<?php

namespace App\Filament\Pages;

use App\Settings\HeroSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageHeroSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 5;

    protected static string $settings = HeroSettings::class;

    protected static ?string $title = 'Hero Section';

    protected static ?string $navigationLabel = 'Hero Section';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                /*Forms\Components\Section::make('Hero Content')
                                        ->description('Manage the main hero section content')
                                        ->icon('heroicon-o-document-text')
                                        ->schema([
                                            Forms\Components\TextInput::make('title')
                                                                      ->required()
                                                                      ->maxLength(255)
                                                                      ->label('Main Title')
                                                                      ->placeholder('Välkommen till Edens Gröna')
                                                                      ->columnSpanFull(),

                                            Forms\Components\TextInput::make('subtitle')
                                                                      ->maxLength(255)
                                                                      ->label('Subtitle')
                                                                      ->placeholder('Trädgårdsservice med passion')
                                                                      ->columnSpanFull(),

                                            Forms\Components\Textarea::make('description')
                                                                     ->rows(3)
                                                                     ->label('Description')
                                                                     ->placeholder('Vi skapar vackra och hållbara trädgårdsmiljöer...')
                                                                     ->columnSpanFull(),

                                            Forms\Components\Toggle::make('is_active')
                                                                   ->label('Show Hero Section')
                                                                   ->default(true)
                                                                   ->helperText('Toggle to show/hide the hero section on the homepage')
                                                                   ->columnSpanFull(),
                                        ]),*/

                Forms\Components\Section::make('Media')
                                        ->description('Upload hero section media files')
                                        ->icon('heroicon-o-photo')
                                        ->schema([
                                            /*Forms\Components\FileUpload::make('logo_path')
                                                                       ->label('Logo')
                                                                       ->image()
                                                                       ->imageEditor()
                                                                       ->imageEditorAspectRatios([
                                                                           '1:1',
                                                                           '16:9',
                                                                       ])
                                                                       ->maxSize(5120)
                                                                       ->directory('hero')
                                                                       ->visibility('public')
                                                                       ->helperText('Upload your logo (max 5MB)')
                                                                       ->columnSpanFull(),

                                            Forms\Components\FileUpload::make('background_image_path')
                                                                       ->label('Background Image')
                                                                       ->image()
                                                                       ->imageEditor()
                                                                       ->imageEditorAspectRatios([
                                                                           '16:9',
                                                                           '21:9',
                                                                       ])
                                                                       ->maxSize(10240)
                                                                       ->directory('hero')
                                                                       ->visibility('public')
                                                                       ->helperText('Background image (max 10MB)')
                                                                       ->columnSpanFull(),*/

                                            Forms\Components\FileUpload::make('background_video_path')
                                                                       ->label('Background Video')
                                                                       ->acceptedFileTypes([
                                                                           'video/mp4',
                                                                           'video/webm',
                                                                           'video/ogg',
                                                                           'video/quicktime',
                                                                       ])
                                                                       ->maxSize(51200) // 50MB
                                                                       ->directory('hero')
                                                                       ->visibility('public')
                                                                       ->helperText('Upload background video (max 50MB, MP4/WebM recommended)')
                                                                       ->columnSpanFull(),
                                        ]),

                /*Forms\Components\Section::make('Primary Button')
                                        ->description('Main call-to-action button')
                                        ->icon('heroicon-o-cursor-arrow-rays')
                                        ->schema([
                                            Forms\Components\TextInput::make('primary_button_text')
                                                                      ->maxLength(50)
                                                                      ->label('Button Text')
                                                                      ->placeholder('Kontakta oss')
                                                                      ->columnSpan(1),

                                            Forms\Components\TextInput::make('primary_button_url')
                                                                      ->maxLength(255)
                                                                      ->label('Button URL')
                                                                      ->placeholder('/contact')
                                                                      ->helperText('Use relative URLs like /contact or full URLs')
                                                                      ->columnSpan(1),
                                        ])
                                        ->columns(2)
                                        ->collapsible(),

                Forms\Components\Section::make('Secondary Button')
                                        ->description('Optional secondary button')
                                        ->icon('heroicon-o-cursor-arrow-rays')
                                        ->schema([
                                            Forms\Components\TextInput::make('secondary_button_text')
                                                                      ->maxLength(50)
                                                                      ->label('Button Text')
                                                                      ->placeholder('Våra tjänster')
                                                                      ->columnSpan(1),

                                            Forms\Components\TextInput::make('secondary_button_url')
                                                                      ->maxLength(255)
                                                                      ->label('Button URL')
                                                                      ->placeholder('/services')
                                                                      ->helperText('Use relative URLs like /services or full URLs')
                                                                      ->columnSpan(1),
                                        ])
                                        ->columns(2)
                                        ->collapsible(),*/
            ]);
    }
}
