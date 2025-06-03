@extends('layouts.general.app')

@section('title', 'Homepage')
@section('content')
    @include('components.customer.wishlist-section', [
        'wishlists' => $wishlists,
    ])
    @if (!$wishlists->isEmpty())
        @include('components.general.products.products-section', [
            'products' => $other_products,
            'title' => 'Other Products',
        ])
    @endif
@endsection
