<?php

namespace App\Filament\Resources\TestimonyPermissionResource\Pages;

use App\Filament\Resources\TestimonyPermissionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTestimonyPermission extends CreateRecord
{
    protected static string $resource = TestimonyPermissionResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
