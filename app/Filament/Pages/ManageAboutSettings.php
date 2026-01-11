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

    protected static ?int $navigationSort = 2;

    protected static string $settings = AboutSettings::class;

    protected static ?string $title = 'About Page';

    protected static ?string $navigationLabel = 'About Page';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Page Header')
                                        ->description('Main heading and subtitle for the about page')
                                        ->icon('heroicon-o-document-text')
                                        ->schema([
                                            Forms\Components\TextInput::make('title')
                                                                      ->required()
                                                                      ->maxLength(255)
                                                                      ->label('Page Title')
                                                                      ->placeholder('Om oss')
                                                                      ->columnSpanFull(),

                                            Forms\Components\TextInput::make('subtitle')
                                                                      ->maxLength(255)
                                                                      ->label('Subtitle')
                                                                      ->placeholder('Kunskap, kärlek och kvalitet i varje detalj')
                                                                      ->columnSpanFull(),
                                        ]),

                Forms\Components\Section::make('About Image')
                                        ->description('Upload the main about page image')
                                        ->icon('heroicon-o-photo')
                                        ->schema([
                                            Forms\Components\FileUpload::make('image_path')
                                                                       ->label('About Us Image')
                                                                       ->image()
                                                                       ->imageEditor()
                                                                       ->imageEditorAspectRatios([
                                                                           '16:9',
                                                                           '4:3',
                                                                           '1:1',
                                                                       ])
                                                                       ->maxSize(10240)
                                                                       ->directory('about')
                                                                       ->visibility('public')
                                                                       ->helperText('Upload the main about page image (max 10MB)')
                                                                       ->columnSpanFull(),
                                        ]),

                Forms\Components\Section::make('Content')
                                        ->description('Main content for the about page')
                                        ->icon('heroicon-o-document-text')
                                        ->schema([
                                            Forms\Components\RichEditor::make('content')
                                                                       ->required()
                                                                       ->label('About Content')
                                                                       ->toolbarButtons([
                                                                           'bold',
                                                                           'italic',
                                                                           'underline',
                                                                           'strike',
                                                                           'link',
                                                                           'heading',
                                                                           'bulletList',
                                                                           'orderedList',
                                                                           'blockquote',
                                                                           'codeBlock',
                                                                           'undo',
                                                                           'redo',
                                                                       ])
                                                                       ->columnSpanFull(),
                                        ]),
            ]);
    }
}
