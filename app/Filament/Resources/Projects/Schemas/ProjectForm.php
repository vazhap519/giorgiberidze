<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('პროექტის სათაურები')
                    ->columns(3)
                    ->schema([

                        TextInput::make('title')
                            ->label('პროექტის სათაური')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('project_overview_title')
                            ->label('პროექტის მიმოხილვის სათაური')
                            ->maxLength(255),

                        TextInput::make('project_gallery_title')
                            ->label('პროექტის გალერიის სათაური')
                            ->maxLength(255),

                    ]),

                Section::make('აღწერა')
                    ->schema([

                        Textarea::make('description')
                            ->label('აღწერა')
                            ->rows(5)
                            ->columnSpanFull(),

                    ]),

                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true),

                Tabs::make('Media')
                    ->tabs([

                        Tabs\Tab::make('Cover Image')
                            ->schema([

                                SpatieMediaLibraryFileUpload::make('cover_image')
                                    ->collection('cover_image')
                                    ->image()
                                    ->imageEditor()
                                    ->disk('public')
                                    ->helperText('Upload project cover image')
                                    ->columnSpanFull(),

                            ]),

                        Tabs\Tab::make('Gallery')
                            ->schema([

                                SpatieMediaLibraryFileUpload::make('images')
                                    ->collection('images')
                                    ->multiple()
                                    ->reorderable()
                                    ->image()
                                    ->imageEditor()
                                    ->disk('public')
                                    ->responsiveImages()
                                    ->helperText('Upload project gallery images')
                                    ->columnSpanFull(),


                            ]),

                        Tabs\Tab::make('Videos')
                            ->schema([

                                SpatieMediaLibraryFileUpload::make('videos')
                                    ->collection('videos')
                                    ->multiple()
                                    ->reorderable()
                                    ->disk('public')
                                    ->maxSize(512000)
                                    ->acceptedFileTypes([
                                        'video/mp4',
                                        'video/webm',
                                        'video/quicktime',
                                        'video/x-msvideo',
                                        'video/x-matroska'
                                    ])
                                    ->helperText('Upload project videos')
                                    ->columnSpanFull(),


                            ]),

                    ])

            ]);
    }
}
