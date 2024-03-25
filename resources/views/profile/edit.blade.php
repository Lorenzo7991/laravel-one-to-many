@extends('layouts.main')

@section('title', 'Profile Option')

@section('content')


<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Profile') }}
    </h2>
    <div class="card p-4 mb-4 bg-dark shadow rounded-lg" data-bs-theme="dark">

        @include('profile.partials.update-profile-information-form')

    </div>

    <div class="card p-4 mb-4 bg-dark shadow rounded-lg" data-bs-theme="dark">


        @include('profile.partials.update-password-form')

    </div>

    <div class="card p-4 mb-4 bg-dark shadow rounded-lg" data-bs-theme="dark">


        @include('profile.partials.delete-user-form')

    </div>
</div>

@endsection
