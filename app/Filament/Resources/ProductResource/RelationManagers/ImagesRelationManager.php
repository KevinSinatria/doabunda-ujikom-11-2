<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use App\Models\ProductImage;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class ImagesRelationManager extends RelationManager
{
    protected static string $relationship = 'images';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image_path')
                    ->label('Images')->multiple()->maxFiles(3)->visibleOn('create')->required()->maxParallelUploads(1)->maxSize(1024)->disk('public')->directory('assets/images/products')->visibility('public'),
                FileUpload::make('image_path')
                    ->label('Images')->multiple()->maxFiles(1)->visibleOn('edit')->required()->maxParallelUploads(1)->maxSize(1024)->disk('public')->directory('assets/images/products')->visibility('public'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('image_path')
            ->columns([
                ImageColumn::make('image_path')->label('Images of Product')->size(200)->defaultImageURL(asset('storage/assets/images/products/400-400-placeholder.svg')),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['product_id'] = $this->getOwnerRecord()->id;
                        return $data;
                    })
                    ->using(function (array $data) {
                        $product_id = $data['product_id'];
                        $recordCreated = null;
                        foreach ($data['image_path'] as $image_path) {
                            $recordCreated = ProductImage::create([
                                'product_id' => $product_id,
                                'image_path' => $image_path
                            ]);
                        }
                        return $recordCreated;
                    })
                    ->successNotificationTitle('Images uploaded successfully')
            ])
            ->actions([
                EditAction::make()
                    ->using(function ($record, $data) {
                        // image_path from data form
                        $images = $data['image_path'];

                        foreach ($images as $image) {
                            if ($image != $record->image_path) {
                                Storage::disk('public')->delete($record->image_path);
                                $record->update([
                                    'image_path' => $image
                                ]);
                            } else {
                                return $record;
                            }
                        }

                        return $record;
                    }),
                DeleteAction::make()
                    ->before(function ($record) {
                        $image = $record->image_path;
                        $is_default = $image == 'assets/images/products/400-400-placeholder.svg';
                        if (!$is_default) {
                            Storage::disk('public')->delete($image);
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->before(function (Collection $records) {
                            foreach ($records as $record) {
                                $image = $record->image_path;
                                $is_default = $image == 'assets/images/products/400-400-placeholder.svg';
                                if (!$is_default) {
                                    Storage::disk('public')->delete($image);
                                }
                            }
                        }),
                ]),
            ]);
    }
}
