<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Name')->required()->helperText(new HtmlString('<strong>Name</strong> minimal 8 karakter')),
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
                TextInput::make('price')->label('Price')->required()->numeric()->minLength(0),
                TextInput::make('stock')->label('Stock')->required()->numeric()->minLength(0),
                Select::make('category_id')->label('Category')->required()->relationship('category', 'name')->searchable()->preload(),
                Radio::make('is_featured')->label('Is Featured?')->boolean()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->toggleable(),
                TextColumn::make('slug')->searchable()->toggleable(),
                TextColumn::make('description')->searchable()->toggleable(),
                TextColumn::make('price')->searchable()->toggleable()->sortable()->money('IDR'),
                TextColumn::make('stock')->searchable()->toggleable()->sortable(),
                TextColumn::make('category.name')->label('Category')->searchable()->toggleable(),
                IconColumn::make('is_featured')->label('Featured')->boolean()->searchable()->toggleable(),
                ImageColumn::make('images.images_path')->label('Images')->toggleable()->defaultImageUrl(url("https://placehold.co/400x400?text=Product+Image")),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
