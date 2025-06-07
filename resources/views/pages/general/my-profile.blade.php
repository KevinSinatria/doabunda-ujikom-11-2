@extends('layouts.general.app')

@section('title', 'My Profile')
@section('content')
    @include('components.general.my-profile.my-profile-section', [
        'user' => $user,
    ])
@endsection
