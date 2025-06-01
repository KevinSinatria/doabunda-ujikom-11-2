<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->before(function ($record) {
                    $images = $record->images;
                    foreach ($images as $image) {
                        $is_default = $image->image_path == 'assets/images/products/400-400-placeholder.svg';
                        if (!$is_default) {
                            Storage::disk('public')->delete($image->image_path);
                        }
                    }
                }),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
