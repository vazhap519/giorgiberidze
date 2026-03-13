<?php
//
//namespace App\Filament\Resources\Products\Schemas;
//
//use App\Models\Filter;
//use Filament\Schemas\Components\Grid;
//use Filament\Schemas\Schema;
//use Filament\Schemas\Components\Section;
//
//use Filament\Forms\Components\TextInput;
//use Filament\Forms\Components\Textarea;
//use Filament\Forms\Components\Repeater;
//use Filament\Forms\Components\ColorPicker;
//use Filament\Forms\Components\Select;
//use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
//use Illuminate\Support\Str;
//
//class ProductForm
//{
//    public static function configure(Schema $schema): Schema
//    {
//        return $schema->components([
//
//            /*
//            |--------------------------------------------------------------------------
//            | პროდუქტის ინფორმაცია
//            |--------------------------------------------------------------------------
//            */
//
//            Section::make('პროდუქტის ინფორმაცია')
//                ->schema([
//
//                    TextInput::make('title')
//                        ->label('პროდუქტის სახელი')
//                        ->required()
//                        ->live(onBlur: true)
//                        ->afterStateUpdated(fn ($state, $set) =>
//                        $set('slug', Str::slug($state))
//                        ),
//
//                    TextInput::make('slug')
//                        ->label('სლაგი')
//                        ->required()
//                        ->unique(ignoreRecord: true)->disabled()
//                        ->dehydrated(),
//
//                    Textarea::make('description')
//                        ->label('აღწერა'),
//
//
//                ]),
//            Section::make('მახასიათებლები')
//                ->schema([
//
//                    Repeater::make('features')
//                        ->label('პროდუქტის მახასიათებლები')
//                        ->addActionLabel('მახასიათებლის დამატება')
//
//                        ->schema([
//
//                            Select::make('filter')
//                                ->label('ფილტრი')
//
//                                ->options(fn () =>
//                                Filter::orderBy('sort')
//                                    ->pluck('name','slug')
//                                )
//
//                                ->searchable()
//
//                                ->createOptionForm([
//
//                                    TextInput::make('name')
//                                        ->label('ფილტრის სახელი')
//                                        ->required()
//                                        ->live(onBlur: true)
//                                        ->afterStateUpdated(fn ($state, $set) =>
//                                        $set('slug', \Illuminate\Support\Str::slug($state))
//                                        ),
//
//                                    TextInput::make('slug')
//                                        ->label('Slug')
//                                        ->required()
//                                        ->disabled()
//                                        ->dehydrated()
//
//                                ->createOptionUsing(function ($data) {
//
//                                    $filter = Filter::create([
//                                        'name' => $data['name'],
//                                        'slug' => $data['slug'],
//                                        'is_active' => true,
//                                    ]);
//
//                                    return $filter->slug;
//                                })
//
//                                ->required(),
//
//                            TextInput::make('value')
//                                ->label('მნიშვნელობა')
//                                ->required(),
//
//                        ])
//
//                        ->columns(2)
//                        ->collapsible()
//                        ->reorderable()
//                        ->defaultItems(1)
//
//                        ->dehydrateStateUsing(function ($state) {
//
//                            return collect($state)
//                                ->filter(fn ($item) =>
//                                    !empty($item['filter']) &&
//                                    !empty($item['value'])
//                                )
//                                ->values()
//                                ->toArray();
//
//                        }),
//
//                ]),
//
//Section::make('პროდუქტის სურათები')->schema([
//
//
//            SpatieMediaLibraryFileUpload::make('image')
//                ->collection('image')
//                ->image()
//                ->imageEditor()
//                ->conversion('webp')
//                ->disk('public')
//                ->responsiveImages()
//                ->label('პროდუქტის ფოტო'),
//            SpatieMediaLibraryFileUpload::make('gallery')
//                ->collection('gallery')
//                ->multiple()
//                ->image()
//                ->imageEditor()
//                ->disk('public')
//                ->reorderable()
//                ->responsiveImages()
//                ->conversion('webp')
//                ->label('პროდუქტის გალერეა'),
//]),
//            Section::make('სპეციფიკაციები')
//                ->schema([
//
//                    Repeater::make('specs')
//                        ->label('პროდუქტის სპეციფიკაციები')
//                        ->schema([
//
//                            TextInput::make('label')
//                                ->label('დასახელება')
//                                ->required(),
//
//                            TextInput::make('value')
//                                ->label('მნიშვნელობა')
//                                ->required(),
//
//                        ])
//                        ->columns(2)
//                        ->collapsible()
//                        ->reorderable()
//                        ->default([]),
//
//                ]),
//            Section::make('ჩამოტვირთვები')
//                ->schema([
//
//                    Repeater::make('downloads')
//                        ->label('ფაილები')
//                        ->schema([
//
//                            TextInput::make('name')
//                                ->label('ფაილის დასახელება')
//                                ->required(),
//
//                            SpatieMediaLibraryFileUpload::make('file')
//                                ->disk('public')
//                                ->downloadable()
//                                ->required()
//                                ->saveUploadedFileUsing(function ($file, $record, $get) {
//
//                                    return $record
//                                        ->addMedia($file)
//                                        ->usingName($get('name'))
//                                        ->toMediaCollection('downloads');
//
//                                })
//
//                        ])
//                        ->columns(2)
//                        ->collapsible()
//                        ->reorderable()
//                        ->addActionLabel('ფაილის დამატება'),
//                    ColorPicker::make('download_btn_bg')
//                        ->label('ღილაკის ფონი')
//                        ->default('#ef4444'),
//
//                    ColorPicker::make('download_btn_hover')
//                        ->label('Hover ფერი')
//                        ->default('#dc2626'),
//
//                    ColorPicker::make('download_btn_text')
//                        ->label('ტექსტის ფერი')
//                        ->default('#ffffff'),
//
//                    TextInput::make('download_btn_radius')
//                        ->numeric()
//                        ->default(6)
//                        ->label('Border radius'),
//
//                    TextInput::make('download_btn_size')
//                        ->numeric()
//                        ->default(14)
//                        ->label('ფონტის ზომა'),
//
//                ]),
//
//            /*
//            |--------------------------------------------------------------------------
//            | ბარათის დიზაინი
//            |--------------------------------------------------------------------------
//            */
//
//            Section::make('ბარათის დიზაინი')
//                ->schema([
//
//                    ColorPicker::make('card_bg')
//                        ->label('ბარათის ფონი')
//                        ->default('#ffffff'),
//
//                    ColorPicker::make('card_border')
//                        ->label('ჩარჩოს ფერი')
//                        ->default('#e5e7eb'),
//
//                    Select::make('card_radius')
//                        ->label('კუთხეების მომრგვალება')
//                        ->default(16)
//                        ->options([
//                            12 => '12px',
//                            16 => '16px',
//                            20 => '20px',
//                            24 => '24px',
//                        ]),
//
//                    Select::make('card_shadow')
//                        ->label('ჩრდილი')
//                        ->default('lg')
//                        ->options([
//                            'sm' => 'Small',
//                            'md' => 'Medium',
//                            'lg' => 'Large',
//                            'xl' => 'XL',
//                        ]),
//
//                ])
//                ->columns(2),
//
//
//            /*
//            |--------------------------------------------------------------------------
//            | სათაურის სტილები
//            |--------------------------------------------------------------------------
//            */
//
//            Section::make('სათაურის სტილები')
//                ->schema([
//
//                    ColorPicker::make('title_color')
//                        ->label('სათაურის ფერი')
//                        ->default('#1f2937'),
//
//                    Select::make('title_size')
//                        ->label('ფონტის ზომა')
//                        ->default(18)
//                        ->options([
//                            16 => '16px',
//                            18 => '18px',
//                            20 => '20px',
//                            24 => '24px',
//                        ]),
//
//                    Select::make('title_weight')
//                        ->label('Font Weight')
//                        ->default(600)
//                        ->options([
//                            400 => 'Normal',
//                            500 => 'Medium',
//                            600 => 'SemiBold',
//                            700 => 'Bold',
//                        ]),
//
//                ])
//                ->columns(2),
//
//
//            /*
//            |--------------------------------------------------------------------------
//            | Overlay დიზაინი
//            |--------------------------------------------------------------------------
//            */
//
//            Section::make('Overlay დიზაინი')
//                ->schema([
//
//                    ColorPicker::make('overlay_bg_from')
//                        ->label('Gradient From')
//                        ->default('#1d4ed8'),
//
//                    ColorPicker::make('overlay_bg_via')
//                        ->label('Gradient Via')
//                        ->default('#2563eb'),
//
//                    ColorPicker::make('overlay_bg_to')
//                        ->label('Gradient To')
//                        ->default('#3b82f6'),
//
//                    ColorPicker::make('overlay_text_color')
//                        ->label('Overlay ტექსტის ფერი')
//                        ->default('#ffffff'),
//
//                ])
//                ->columns(2),
//
//
//            /*
//            |--------------------------------------------------------------------------
//            | Feature სტილები
//            |--------------------------------------------------------------------------
//            */
//
//            Section::make('Feature სტილები')
//                ->schema([
//
//                    ColorPicker::make('feature_icon_color')
//                        ->label('Icon ფერი')
//                        ->default('#86efac'),
//
//                    ColorPicker::make('feature_text_color')
//                        ->label('ტექსტის ფერი')
//                        ->default('#ffffff'),
//
//                    Select::make('feature_icon_size')
//                        ->label('Icon ზომა')
//                        ->default(18)
//                        ->options([
//                            14 => '14px',
//                            16 => '16px',
//                            18 => '18px',
//                            20 => '20px',
//                        ]),
//
//                    Select::make('feature_text_size')
//                        ->label('ტექსტის ზომა')
//                        ->default(14)
//                        ->options([
//                            12 => '12px',
//                            14 => '14px',
//                            16 => '16px',
//                        ]),
//
//                ])
//                ->columns(2),
//
//
//
//
//
//
//
//
//            Section::make('არჩეული პროდუქტის სტილები')
//                ->schema([
//
//                    Grid::make(2)->schema([
//
//                        TextInput::make('single_image_radius')
//                            ->label('პროდუქტის სურათის კუთხის რადიუსი')
//                            ->numeric()
//                            ->default(12),
//
//                        TextInput::make('single_image_max_height')
//                            ->label('პროდუქტის სურათის მაქსიმალური სიმაღლე')
//                            ->numeric()
//                            ->default(500),
//
//                    ]),
//
//
//                    Grid::make(2)->schema([
//
//                        TextInput::make('single_gallery_thumb_width')
//                            ->label('გალერიის სურათის სიგანე')
//                            ->numeric()
//                            ->default(80),
//
//                        TextInput::make('single_gallery_thumb_height')
//                            ->label('გალერიის სურათის სიმაღლე')
//                            ->numeric()
//                            ->default(80),
//
//                        ColorPicker::make('single_gallery_border_color')
//                            ->label('გალერიის საზღვრის ფერი')
//                            ->default('#e5e7eb'),
//
//                        ColorPicker::make('single_gallery_hover_border')
//                            ->label('გალერიის Hover საზღვრის ფერი')
//                            ->default('#ef4444'),
//
//                    ]),
//
//
//                    Grid::make(2)->schema([
//
//                        TextInput::make('single_title_font_size')
//                            ->label('პროდუქტის სათაურის ტექსტის ზომა')
//                            ->numeric()
//                            ->default(24),
//
//                        ColorPicker::make('single_title_color')
//                            ->label('პროდუქტის სათაურის ფერი')
//                            ->default('#000000'),
//
//                        TextInput::make('single_description_font_size')
//                            ->label('აღწერის ტექსტის ზომა')
//                            ->numeric()
//                            ->default(16),
//
//                        ColorPicker::make('single_description_color')
//                            ->label('აღწერის ტექსტის ფერი')
//                            ->default('#6b7280'),
//
//                    ]),
//
//
//                    Grid::make(2)->schema([
//
//                        ColorPicker::make('single_feature_icon_color')
//                            ->label('მახასიათებლების აიქონის ფერი')
//                            ->default('#22c55e'),
//
//                        TextInput::make('single_feature_font_size')
//                            ->label('მახასიათებლების ტექსტის ზომა')
//                            ->numeric()
//                            ->default(15),
//
//                    ]),
//
//
//                    Grid::make(2)->schema([
//
//                        TextInput::make('single_tabs_font_size')
//                            ->label('ტაბების ტექსტის ზომა')
//                            ->numeric()
//                            ->default(16),
//
//                        ColorPicker::make('single_tabs_border_color')
//                            ->label('ტაბების ქვედა ხაზის ფერი')
//                            ->default('#e5e7eb'),
//
//                        ColorPicker::make('single_tabs_active_border')
//                            ->label('აქტიური ტაბის ხაზის ფერი')
//                            ->default('#000000'),
//
//                    ]),
//
//
//                    Grid::make(2)->schema([
//
//                        ColorPicker::make('single_spec_table_border')
//                            ->label('მახასიათებლების ცხრილის საზღვრის ფერი')
//                            ->default('#e5e7eb'),
//
//                        ColorPicker::make('single_spec_label_bg')
//                            ->label('მახასიათებლის სახელის ფონის ფერი')
//                            ->default('#f9fafb'),
//
//                    ]),
//
//
//                    Grid::make(2)->schema([
//
//                        ColorPicker::make('single_download_btn_bg')
//                            ->label('გადმოწერის ღილაკის ფონი')
//                            ->default('#000000'),
//
//                        ColorPicker::make('single_download_btn_hover')
//                            ->label('გადმოწერის ღილაკის Hover ფონი')
//                            ->default('#333333'),
//
//                        ColorPicker::make('single_download_btn_text')
//                            ->label('გადმოწერის ღილაკის ტექსტის ფერი')
//                            ->default('#ffffff'),
//
//                        TextInput::make('single_download_btn_radius')
//                            ->label('გადმოწერის ღილაკის კუთხის რადიუსი')
//                            ->numeric()
//                            ->default(6),
//
//                        TextInput::make('single_download_btn_size')
//                            ->label('გადმოწერის ღილაკის ტექსტის ზომა')
//                            ->numeric()
//                            ->default(14),
//
//                    ]),
//
//
//                    Grid::make(2)->schema([
//
//                        TextInput::make('single_download_card_radius')
//                            ->label('გადმოწერის ბლოკის კუთხის რადიუსი')
//                            ->numeric()
//                            ->default(6),
//
//                        ColorPicker::make('single_download_card_border')
//                            ->label('გადმოწერის ბლოკის საზღვრის ფერი')
//                            ->default('#e5e7eb'),
//
//                        ColorPicker::make('single_download_card_hover')
//                            ->label('გადმოწერის ბლოკის Hover ფონი')
//                            ->default('#f9fafb'),
//
//                    ]),
//
//                ])
//                ->collapsed()
//                ->columns(1)
//
//        ]);
//    }
//}
//



namespace App\Filament\Resources\Products\Schemas;

use App\Models\Filter;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            /*
            |--------------------------------------------------------------------------
            | პროდუქტის ინფორმაცია
            |--------------------------------------------------------------------------
            */

            Section::make('პროდუქტის ინფორმაცია')
                ->schema([

                    TextInput::make('title')
                        ->label('პროდუქტის სახელი')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn ($state, $set) =>
                            $set('slug', Str::slug($state))
                        ),

                    TextInput::make('slug')
                        ->label('სლაგი')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->disabled()
                        ->dehydrated(),

                    Textarea::make('description')
                        ->label('აღწერა'),

                ]),

            Section::make('მახასიათებლები')
                ->schema([

                    Repeater::make('features')
                        ->label('პროდუქტის მახასიათებლები')
                        ->addActionLabel('მახასიათებლის დამატება')

                        ->schema([

                            Select::make('filter')
                                ->label('ფილტრი')

                                ->options(fn () =>
                                    Filter::orderBy('sort')
                                        ->pluck('name','slug')
                                )

                                ->searchable()

                                ->createOptionForm([

                                    TextInput::make('name')
                                        ->label('ფილტრის სახელი')
                                        ->required()
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(fn ($state, $set) =>
                                            $set('slug', \Illuminate\Support\Str::slug($state))
                                        ),

                                    TextInput::make('slug')
                                        ->label('Slug')
                                        ->required()
                                        ->disabled()
                                        ->dehydrated(),

                                ])

                                ->createOptionUsing(function ($data) {

                                    $filter = Filter::create([
                                        'name' => $data['name'],
                                        'slug' => $data['slug'],
                                        'is_active' => true,
                                    ]);

                                    return $filter->slug;
                                })

                                ->required(),

                            TextInput::make('value')
                                ->label('მნიშვნელობა')
                                ->required(),

                        ])

                        ->columns(2)
                        ->collapsible()
                        ->reorderable()
                        ->defaultItems(1)

                        ->dehydrateStateUsing(function ($state) {

                            return collect($state)
                                ->filter(fn ($item) =>
                                    !empty($item['filter']) &&
                                    !empty($item['value'])
                                )
                                ->values()
                                ->toArray();

                        }),

                ]),

            Section::make('პროდუქტის სურათები')->schema([

                SpatieMediaLibraryFileUpload::make('image')
                    ->collection('image')
                    ->image()
                    ->imageEditor()
                    ->conversion('webp')
                    ->disk('public')
                    ->responsiveImages()
                    ->label('პროდუქტის ფოტო'),

                SpatieMediaLibraryFileUpload::make('gallery')
                    ->collection('gallery')
                    ->multiple()
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->reorderable()
                    ->responsiveImages()
                    ->conversion('webp')
                    ->label('პროდუქტის გალერეა'),

            ]),

            Section::make('სპეციფიკაციები')
                ->schema([

                    Repeater::make('specs')
                        ->label('პროდუქტის სპეციფიკაციები')
                        ->schema([

                            TextInput::make('label')
                                ->label('დასახელება')
                                ->required(),

                            TextInput::make('value')
                                ->label('მნიშვნელობა')
                                ->required(),

                        ])
                        ->columns(2)
                        ->collapsible()
                        ->reorderable()
                        ->default([]),

                ]),

            Section::make('ჩამოტვირთვები')
                ->schema([

                    Repeater::make('downloads')
                        ->label('ფაილები')
                        ->schema([

                            TextInput::make('name')
                                ->label('ფაილის დასახელება')
                                ->required(),

                            SpatieMediaLibraryFileUpload::make('file')
                                ->disk('public')
                                ->downloadable()
                                ->required()
                                ->saveUploadedFileUsing(function ($file, $record, $get) {

                                    return $record
                                        ->addMedia($file)
                                        ->usingName($get('name'))
                                        ->toMediaCollection('downloads');

                                })

                        ])
                        ->columns(2)
                        ->collapsible()
                        ->reorderable()
                        ->addActionLabel('ფაილის დამატება'),

                    ColorPicker::make('download_btn_bg')
                        ->label('ღილაკის ფონი')
                        ->default('#ef4444'),

                    ColorPicker::make('download_btn_hover')
                        ->label('Hover ფერი')
                        ->default('#dc2626'),

                    ColorPicker::make('download_btn_text')
                        ->label('ტექსტის ფერი')
                        ->default('#ffffff'),

                    TextInput::make('download_btn_radius')
                        ->numeric()
                        ->default(6)
                        ->label('Border radius'),

                    TextInput::make('download_btn_size')
                        ->numeric()
                        ->default(14)
                        ->label('ფონტის ზომა'),

                ]),

            /*
            |--------------------------------------------------------------------------
            | ბარათის დიზაინი
            |--------------------------------------------------------------------------
            */

            Section::make('ბარათის დიზაინი')
                ->schema([

                    ColorPicker::make('card_bg')
                        ->label('ბარათის ფონი')
                        ->default('#ffffff'),

                    ColorPicker::make('card_border')
                        ->label('ჩარჩოს ფერი')
                        ->default('#e5e7eb'),

                    Select::make('card_radius')
                        ->label('კუთხეების მომრგვალება')
                        ->default(16)
                        ->options([
                            12 => '12px',
                            16 => '16px',
                            20 => '20px',
                            24 => '24px',
                        ]),

                    Select::make('card_shadow')
                        ->label('ჩრდილი')
                        ->default('lg')
                        ->options([
                            'sm' => 'Small',
                            'md' => 'Medium',
                            'lg' => 'Large',
                            'xl' => 'XL',
                        ]),

                ])
                ->columns(2),

            /*
            |--------------------------------------------------------------------------
            | სათაურის სტილები
            |--------------------------------------------------------------------------
            */

            Section::make('სათაურის სტილები')
                ->schema([

                    ColorPicker::make('title_color')
                        ->label('სათაურის ფერი')
                        ->default('#1f2937'),

                    Select::make('title_size')
                        ->label('ფონტის ზომა')
                        ->default(18)
                        ->options([
                            16 => '16px',
                            18 => '18px',
                            20 => '20px',
                            24 => '24px',
                        ]),

                    Select::make('title_weight')
                        ->label('Font Weight')
                        ->default(600)
                        ->options([
                            400 => 'Normal',
                            500 => 'Medium',
                            600 => 'SemiBold',
                            700 => 'Bold',
                        ]),

                ])
                ->columns(2),

            /*
            |--------------------------------------------------------------------------
            | Overlay დიზაინი
            |--------------------------------------------------------------------------
            */

            Section::make('Overlay დიზაინი')
                ->schema([

                    ColorPicker::make('overlay_bg_from')
                        ->label('Gradient From')
                        ->default('#1d4ed8'),

                    ColorPicker::make('overlay_bg_via')
                        ->label('Gradient Via')
                        ->default('#2563eb'),

                    ColorPicker::make('overlay_bg_to')
                        ->label('Gradient To')
                        ->default('#3b82f6'),

                    ColorPicker::make('overlay_text_color')
                        ->label('Overlay ტექსტის ფერი')
                        ->default('#ffffff'),

                ])
                ->columns(2),

            /*
            |--------------------------------------------------------------------------
            | Feature სტილები
            |--------------------------------------------------------------------------
            */

            Section::make('Feature სტილები')
                ->schema([

                    ColorPicker::make('feature_icon_color')
                        ->label('Icon ფერი')
                        ->default('#86efac'),

                    ColorPicker::make('feature_text_color')
                        ->label('ტექსტის ფერი')
                        ->default('#ffffff'),

                    Select::make('feature_icon_size')
                        ->label('Icon ზომა')
                        ->default(18)
                        ->options([
                            14 => '14px',
                            16 => '16px',
                            18 => '18px',
                            20 => '20px',
                        ]),

                    Select::make('feature_text_size')
                        ->label('ტექსტის ზომა')
                        ->default(14)
                        ->options([
                            12 => '12px',
                            14 => '14px',
                            16 => '16px',
                        ]),

                ])
                ->columns(2),



        ]);
    }
}
