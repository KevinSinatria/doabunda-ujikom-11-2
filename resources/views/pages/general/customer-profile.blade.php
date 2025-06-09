@extends('layouts.general.app')

@section('title', 'My Profile')
@section('content')
    @include('components.general.profile.profile-customer-section', [
        'user' => $user,
    ])
    @if ($user->role == 'customer')
        @include('components.general.profile.stats-section', [
            'wishlistsCount' => $wishlistsCount,
            'testimoniesCount' => $testimoniesCount,
            'accountAge' => $accountAge,
        ])
    @endif
@endsection
