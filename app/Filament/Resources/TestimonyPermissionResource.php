<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonyPermissionResource\Pages;
use App\Filament\Resources\TestimonyPermissionResource\RelationManagers;
use App\Models\TestimonyPermission;
use Filament\Forms;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestimonyPermissionResource extends Resource
{
    protected static ?string $model = TestimonyPermission::class;

    protected static ?string $navigationIcon = 'heroicon-o-lock-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')->label('Username')->required()->relationship('user', 'username')->searchable()->preload(),
                Select::make('product_id')->label('Product (slug)')->required()->relationship('product', 'slug')->searchable()->preload(),
                Radio::make('is_used')->label('Is Used?')->boolean()->required()->visibleOn('edit'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no')->label('#')->rowIndex()->sortable(),
                TextColumn::make('id')->searchable()->sortable(),
                TextColumn::make('user.username')->label('Username')->searchable()->toggleable(),
                TextColumn::make('user.email')->label('Email')->searchable()->toggleable(),
                TextColumn::make('product.name')->label('Product Name')->searchable()->toggleable(),
                IconColumn::make('is_used')->label('Is Used?')->boolean()->toggleable(),
                TextColumn::make('created_at')->dateTime('d-m-Y H:i', 'Asia/Jakarta')->sortable()->toggleable(),
                TextColumn::make('updated_at')->dateTime('d-m-Y H:i', 'Asia/Jakarta')->sortable()->toggleable(),
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
            'index' => Pages\ListTestimonyPermissions::route('/'),
            'create' => Pages\CreateTestimonyPermission::route('/create'),
            'edit' => Pages\EditTestimonyPermission::route('/{record}/edit'),
        ];
    }
}
