<?php

namespace App\Filament\Resources\TestimonyPermissionResource\Pages;

use App\Filament\Resources\TestimonyPermissionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTestimonyPermission extends EditRecord
{
    protected static string $resource = TestimonyPermissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
