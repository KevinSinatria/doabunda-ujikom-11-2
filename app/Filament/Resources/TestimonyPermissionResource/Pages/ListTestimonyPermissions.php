<?php

namespace App\Filament\Resources\TestimonyPermissionResource\Pages;

use App\Filament\Resources\TestimonyPermissionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTestimonyPermissions extends ListRecords
{
    protected static string $resource = TestimonyPermissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
