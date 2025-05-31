<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Filament\Resources\ProductResource\RelationManagers\ImagesRelationManager;
use App\Models\Product;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

use function Laravel\Prompts\search;
use function Laravel\Prompts\text;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Name')->required()->helperText(new HtmlString('<strong>Name</strong> minimal 8 karakter'))->minLength(8)->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')->label('Slug')->disabled(true)->dehydrated(true),
                RichEditor::make('description')->label('Description')->required()->toolbarButtons([
                    'bold',
                    'italic',
                    'underline',
                    'h1',
                    'h2',
                    'h3',
                    'orderedList',
                    'undo',
                    'redo'
                ]),
                TextInput::make('price')->label('Price')->required()->numeric()->prefix('Rp.'),
                TextInput::make('stock')->label('Stock')->required()->numeric()->minLength(0),
                Select::make('category_id')->label('Category')->required()->relationship('category', 'name')->searchable()->preload(),
                Radio::make('is_featured')->label('Is Featured?')->boolean()->required(),
                FileUpload::make('images.image_path')->label('Images')->visibleOn('create')->multiple()->maxFiles(3)->required()->maxParallelUploads(1)->imageEditor()->imageEditorAspectRatios([
                    '1:1',
                    '4:3',
                    '16:9',
                ])->maxSize(1024)->disk('public')->directory('assets/images/products')->visibility('public'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no')->label('#')->sortable()->toggleable(),
                TextColumn::make('id')->searchable()->sortable(),
                TextColumn::make('name')->searchable()->toggleable(),
                TextColumn::make('slug')->searchable()->toggleable(),
                TextColumn::make('price')->searchable()->toggleable()->sortable()->money('IDR'),
                TextColumn::make('stock')->searchable()->toggleable()->sortable(),
                TextColumn::make('category.name')->label('Category')->searchable()->toggleable(),
                IconColumn::make('is_featured')->label('Featured')->boolean()->searchable()->toggleable(),
                ImageColumn::make('images.image_path')->label('Images')->stacked()->square()->toggleable()->defaultImageUrl(url("https://placehold.co/400x400?text=Product+Image")),
                TextColumn::make('created_at')->dateTime('d-m-Y H:i', 'Asia/Jakarta')->sortable()->toggleable(),
                TextColumn::make('updated_at')->dateTime('d-m-Y H:i', 'Asia/Jakarta')->sortable()->toggleable(),
            ])
            ->groups([
                'category.name'
            ])
            ->paginated([
                5,
                10,
                15,
                20,
                25,
                30,
                50,
                100
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ImagesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
