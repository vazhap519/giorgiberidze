<?php
//
//namespace App\Filament\Resources\SiteSettings\Schemas;
//
//use Filament\Schemas\Components\Section;
//use Filament\Schemas\Schema;
//
//use Filament\Forms\Components\TextInput;
//use Filament\Forms\Components\ColorPicker;
//use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
//
//class SiteSettingForm
//{
//    public static function configure(Schema $schema): Schema
//    {
//        return $schema
//            ->components([
//
//                /*
//                |--------------------------------------------------------------------------
//                | Basic
//                |--------------------------------------------------------------------------
//                */
//
//                Section::make('საიტის ძირითადი ინფორმაცია')
//                    ->schema([
//
//                        TextInput::make('site_name')
//                            ->label('Site Name')
//                            ->required()
//                            ->maxLength(255),
//
//                        SpatieMediaLibraryFileUpload::make('favicon')
//                            ->collection('favicon')
//                            ->image()
//                            ->imageEditor()
//                            ->disk('public')
//                            ->conversion('webp')
//                            ->responsiveImages()
//                            ->helperText('Recommended 32x32 or 64x64')
//                            ->required(),
//
//                        SpatieMediaLibraryFileUpload::make('logo')
//                            ->collection('logo')
//                            ->image()
//                            ->imageEditor()
//                            ->disk('public')
//                            ->conversion('webp')
//                            ->responsiveImages()
//                            ->required(),
//
//                    ])->columns(2),
//
//
//                /*
//                |--------------------------------------------------------------------------
//                | Section Titles
//                |--------------------------------------------------------------------------
//                */
//
//                Section::make('საიტის სექციების სათაურები')
//                    ->schema([
//
//
//
//                        TextInput::make('services_header')
//                            ->label('სერვისების სათაური'),
//
//                        TextInput::make('about_header')
//                            ->label('ჩვენს შესახებ სათაური'),
//
//                        TextInput::make('project_header')
//                            ->label('პროექტების სათაური'),
//                        TextInput::make('project_header')
//                            ->label('პროექტების სათაური'),
//                        TextInput::make('partner_title')->label('პარნიორების სათაური')
//
//
//
//
//
//
//                    ])->columns(2),
//Section::make('პროდუქტები')->schema([
//    TextInput::make('products_title')
//        ->label('პროდუქტების სათაური (მთავარ გვერე)'),
//    TextInput::make('product_overview')
//        ->label('პროექტების განხილვა'),
//
//    TextInput::make('Downloads_Features')
//        ->label('პროდუქტის გადმოსაწერი მასალები'),
//    TextInput::make('product_Features')
//        ->label('პროდუქტის მახასიათებლები')
//]),
//
//                /*
//                |--------------------------------------------------------------------------
//                | Product Page Texts
//                |--------------------------------------------------------------------------
//                */
//
//                Section::make('პროდუქტების გვერდი')
//                    ->schema([
//
//                        TextInput::make('products_page_title')
//                            ->label('Products Page Title')
//                            ->default('IP Cameras'),
//
//                        TextInput::make('filter_title')
//                            ->label('Filter Title')
//                            ->default('Filter by Features'),
//
//                        TextInput::make('clear_filters_text')
//                            ->label('Clear Filters Text')
//                            ->default('Clear Filters'),
//
//                    ])->columns(2),
//
//
//                /*
//                |--------------------------------------------------------------------------
//                | Colors
//                |--------------------------------------------------------------------------
//                */
//
//                Section::make('ფერები')
//                    ->schema([
//
//                        ColorPicker::make('accent_color')
//                            ->label('Accent Color (Red)')
//                            ->default('#dc2626'),
//
//                        ColorPicker::make('dark_color')
//                            ->label('Dark Color')
//                            ->default('#111827'),
//
//                    ])->columns(2),
//
//
//
//
//
//
//            ]);
//    }
//}


namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                /*
                |--------------------------------------------------------------------------
                | ძირითადი ინფორმაცია
                |--------------------------------------------------------------------------
                */

                Section::make('საიტის ძირითადი ინფორმაცია')
                    ->schema([

                        TextInput::make('site_name')
                            ->label('საიტის სახელი')
                            ->required()
                            ->maxLength(255),

                        SpatieMediaLibraryFileUpload::make('favicon')
                            ->label('Favicon')
                            ->collection('favicon')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->conversion('webp')
                            ->responsiveImages()
                            ->required(),

                        SpatieMediaLibraryFileUpload::make('logo')
                            ->label('ლოგო')
                            ->collection('logo')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->conversion('webp')
                            ->responsiveImages()
                            ->required(),

                    ])->columns(2),

                /*
                |--------------------------------------------------------------------------
                | სექციების სათაურები
                |--------------------------------------------------------------------------
                */

                Section::make('სექციების სათაურები')
                    ->schema([

                        TextInput::make('services_header')
                            ->label('სერვისების სათაური'),

                        TextInput::make('about_header')
                            ->label('ჩვენს შესახებ სათაური'),

                        TextInput::make('project_header')
                            ->label('პროექტების სათაური'),

                        TextInput::make('partner_title')
                            ->label('პარტნიორების სათაური'),

                    ])->columns(2),

                /*
                |--------------------------------------------------------------------------
                | პროდუქტები
                |--------------------------------------------------------------------------
                */

                Section::make('პროდუქტები')
                    ->schema([

                        TextInput::make('products_title')
                            ->label('პროდუქტების სათაური'),

                        TextInput::make('product_overview')
                            ->label('პროდუქტების აღწერა'),

                        TextInput::make('Downloads_Features')
                            ->label('გადმოსაწერი მასალები'),

                        TextInput::make('product_Features')
                            ->label('პროდუქტის მახასიათებლები'),

                    ])->columns(2),

                /*
                |--------------------------------------------------------------------------
                | პროდუქტების გვერდი
                |--------------------------------------------------------------------------
                */

                Section::make('პროდუქტების გვერდის ტექსტები')
                    ->schema([

                        TextInput::make('products_page_title')
                            ->label('პროდუქტების გვერდის სათაური'),

                        TextInput::make('filter_title')
                            ->label('ფილტრის სათაური'),

                        TextInput::make('clear_filters_text')
                            ->label('ფილტრების გასუფთავების ტექსტი'),

                    ])->columns(2),

                /*
                |--------------------------------------------------------------------------
                | საიტის ძირითადი დიზაინი
                |--------------------------------------------------------------------------
                */

                Section::make('საიტის ძირითადი დიზაინი')
                    ->schema([

                        ColorPicker::make('site_bg_color')
                            ->label('საიტის ფონის ფერი'),

                        ColorPicker::make('site_text_color')
                            ->label('ტექსტის ფერი'),

                        TextInput::make('site_container_width')
                            ->label('კონტეინერის მაქსიმალური სიგანე')
                            ->numeric(),

                    ])->columns(3),

                /*
                |--------------------------------------------------------------------------
                | სექციის სტილი
                |--------------------------------------------------------------------------
                */

                Section::make('სექციის სტილი')
                    ->schema([

                        TextInput::make('site_section_padding')
                            ->label('სექციის შიდა დაშორება')
                            ->numeric(),

                        TextInput::make('site_section_padding_y')
                            ->label('სექციის ვერტიკალური დაშორება')
                            ->numeric(),

                        Select::make('site_section_position')
                            ->label('სექციის პოზიცია')
                            ->options([
                                'relative' => 'Relative',
                                'static' => 'Static',
                                'absolute' => 'Absolute',
                            ]),

                        ColorPicker::make('site_section_bg')
                            ->label('სექციის ფონის ფერი'),

                    ])->columns(2),

                /*
                |--------------------------------------------------------------------------
                | გრადიენტი
                |--------------------------------------------------------------------------
                */

                Section::make('სექციის გრადიენტი')
                    ->schema([

                        Toggle::make('site_section_gradient')
                            ->label('გრადიენტის ჩართვა'),

                        ColorPicker::make('site_section_gradient_from')
                            ->label('გრადიენტის საწყისი ფერი'),

                        ColorPicker::make('site_section_gradient_to')
                            ->label('გრადიენტის საბოლოო ფერი'),

                    ])->columns(3),

                /*
                |--------------------------------------------------------------------------
                | კონტეინერის პარამეტრები
                |--------------------------------------------------------------------------
                */

                Section::make('კონტეინერის პარამეტრები')
                    ->schema([

                        TextInput::make('site_container_padding_x')
                            ->label('კონტეინერის ჰორიზონტალური დაშორება')
                            ->numeric(),

                        TextInput::make('site_container_padding_mobile')
                            ->label('მობილურის დაშორება')
                            ->numeric(),

                        Select::make('site_container_align')
                            ->label('კონტეინერის განლაგება')
                            ->options([
                                'center' => 'ცენტრი',
                                'left' => 'მარცხენა',
                            ]),

                    ])->columns(3),

                /*
                |--------------------------------------------------------------------------
                | ღილაკების სტილი
                |--------------------------------------------------------------------------
                */

                Section::make('ღილაკების სტილი')
                    ->schema([

                        ColorPicker::make('site_primary_color')
                            ->label('ძირითადი ფერი'),

                        TextInput::make('site_button_radius')
                            ->label('ღილაკის მომრგვალება')
                            ->numeric(),

                        Toggle::make('site_button_shadow')
                            ->label('ღილაკის ჩრდილი'),

                    ])->columns(3),

                /*
                |--------------------------------------------------------------------------
                | ბარათების სტილი
                |--------------------------------------------------------------------------
                */

                Section::make('ბარათების სტილი')
                    ->schema([

                        TextInput::make('site_card_radius')
                            ->label('ბარათის მომრგვალება')
                            ->numeric(),

                        Toggle::make('site_card_shadow')
                            ->label('ბარათის ჩრდილი'),

                    ])->columns(2),

                /*
                |--------------------------------------------------------------------------
                | ლოგოს პარამეტრები
                |--------------------------------------------------------------------------
                */

                Section::make('ლოგოს პარამეტრები')
                    ->schema([

                        TextInput::make('site_logo_width')
                            ->label('ლოგოს სიგანე')
                            ->numeric(),

                        TextInput::make('site_logo_height')
                            ->label('ლოგოს სიმაღლე')
                            ->numeric(),

                        Select::make('site_logo_fit')
                            ->label('ლოგოს მორგება')
                            ->options([
                                'contain' => 'Contain',
                                'cover' => 'Cover',
                            ]),

                        TextInput::make('site_logo_radius')
                            ->label('ლოგოს მომრგვალება')
                            ->numeric(),

                    ])->columns(2),

                /*
                |--------------------------------------------------------------------------
                | Header
                |--------------------------------------------------------------------------
                */

                Section::make('ჰედერის პარამეტრები')
                    ->schema([

                        ColorPicker::make('site_header_text_color')
                            ->label('ჰედერის ტექსტის ფერი'),

                        TextInput::make('site_name_size')
                            ->label('საიტის სახელის ზომა')
                            ->numeric(),

                        TextInput::make('site_name_weight')
                            ->label('საიტის სახელის სისქე')
                            ->numeric(),

                    ])->columns(3),


                Section::make('არჩეული პროდუქტის სტილები')
                    ->schema([

                        Grid::make(2)->schema([

                            TextInput::make('single_image_radius')
                                ->label('პროდუქტის სურათის კუთხის რადიუსი')
                                ->numeric()
                                ->default(12),

                            TextInput::make('single_image_max_height')
                                ->label('პროდუქტის სურათის მაქსიმალური სიმაღლე')
                                ->numeric()
                                ->default(500),

                        ]),

                        Grid::make(2)->schema([

                            TextInput::make('single_gallery_thumb_width')
                                ->label('გალერიის სურათის სიგანე')
                                ->numeric()
                                ->default(80),

                            TextInput::make('single_gallery_thumb_height')
                                ->label('გალერიის სურათის სიმაღლე')
                                ->numeric()
                                ->default(80),

                            ColorPicker::make('single_gallery_border_color')
                                ->label('გალერიის საზღვრის ფერი')
                                ->default('#e5e7eb'),

                            ColorPicker::make('single_gallery_hover_border')
                                ->label('გალერიის Hover საზღვრის ფერი')
                                ->default('#ef4444'),

                        ]),

                        Grid::make(2)->schema([

                            TextInput::make('single_title_font_size')
                                ->label('პროდუქტის სათაურის ტექსტის ზომა')
                                ->numeric()
                                ->default(24),

                            ColorPicker::make('single_title_color')
                                ->label('პროდუქტის სათაურის ფერი')
                                ->default('#000000'),

                            TextInput::make('single_description_font_size')
                                ->label('აღწერის ტექსტის ზომა')
                                ->numeric()
                                ->default(16),

                            ColorPicker::make('single_description_color')
                                ->label('აღწერის ტექსტის ფერი')
                                ->default('#6b7280'),

                        ]),

                        Grid::make(2)->schema([

                            ColorPicker::make('single_feature_icon_color')
                                ->label('მახასიათებლების აიქონის ფერი')
                                ->default('#22c55e'),

                            TextInput::make('single_feature_font_size')
                                ->label('მახასიათებლების ტექსტის ზომა')
                                ->numeric()
                                ->default(15),

                        ]),

                        Grid::make(2)->schema([

                            TextInput::make('single_tabs_font_size')
                                ->label('ტაბების ტექსტის ზომა')
                                ->numeric()
                                ->default(16),

                            ColorPicker::make('single_tabs_border_color')
                                ->label('ტაბების ქვედა ხაზის ფერი')
                                ->default('#e5e7eb'),

                            ColorPicker::make('single_tabs_active_border')
                                ->label('აქტიური ტაბის ხაზის ფერი')
                                ->default('#000000'),

                        ]),

                        Grid::make(2)->schema([

                            ColorPicker::make('single_spec_table_border')
                                ->label('მახასიათებლების ცხრილის საზღვრის ფერი')
                                ->default('#e5e7eb'),

                            ColorPicker::make('single_spec_label_bg')
                                ->label('მახასიათებლის სახელის ფონის ფერი')
                                ->default('#f9fafb'),

                        ]),

                        Grid::make(2)->schema([

                            ColorPicker::make('single_download_btn_bg')
                                ->label('გადმოწერის ღილაკის ფონი')
                                ->default('#000000'),

                            ColorPicker::make('single_download_btn_hover')
                                ->label('გადმოწერის ღილაკის Hover ფონი')
                                ->default('#333333'),

                            ColorPicker::make('single_download_btn_text')
                                ->label('გადმოწერის ღილაკის ტექსტის ფერი')
                                ->default('#ffffff'),

                            TextInput::make('single_download_btn_radius')
                                ->label('გადმოწერის ღილაკის კუთხის რადიუსი')
                                ->numeric()
                                ->default(6),

                            TextInput::make('single_download_btn_size')
                                ->label('გადმოწერის ღილაკის ტექსტის ზომა')
                                ->numeric()
                                ->default(14),

                        ]),

                        Grid::make(2)->schema([

                            TextInput::make('single_download_card_radius')
                                ->label('გადმოწერის ბლოკის კუთხის რადიუსი')
                                ->numeric()
                                ->default(6),

                            ColorPicker::make('single_download_card_border')
                                ->label('გადმოწერის ბლოკის საზღვრის ფერი')
                                ->default('#e5e7eb'),

                            ColorPicker::make('single_download_card_hover')
                                ->label('გადმოწერის ბლოკის Hover ფონი')
                                ->default('#f9fafb'),

                        ]),

                    ])
                    ->collapsed()
                    ->columns(1)

            ]);
    }
}
