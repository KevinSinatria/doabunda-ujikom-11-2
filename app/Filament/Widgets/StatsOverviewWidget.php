<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Product;
use App\Models\Testimony;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Products', Product::count())
                ->description('Jumlah produk yang tersedia')
                ->descriptionIcon('heroicon-o-cube')
                ->color('primary'),
            Stat::make('Categories', Category::count())
                ->description('Jumlah kategori yang tersedia')
                ->descriptionIcon('heroicon-m-folder')
                ->color('primary'),
            Stat::make('Total Testimonies', Testimony::count())
                ->description('Jumlah testimoni yang ada')
                ->descriptionIcon('heroicon-m-chat-bubble-left-ellipsis')
                ->color('primary'),
            Stat::make('Total Customers', User::where('role', 'customer')->count())
                ->description('Jumlah customer yang ada')
                ->descriptionIcon('heroicon-o-users')
                ->color('primary'),
        ];
    }
}
