@extends('admin.layouts.master')
@section('section')
    <section class="section">

        <div class="section-header">
            <h1>{{ __('Profile') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">{{ __('Dashboard') }}</a></div>
                <div class="breadcrumb-item">{{ __('Profile') }}</div>
            </div>
        </div>
        <div class="section-body">

            <h2 class="section-title">{{ __('Hi,') }}{{ Auth::user()->name }}</h2>
            <p class="section-lead">
                {{ __('Change information about yourself on this page.') }}

            </p>

            <div class="row mt-sm-4">
                @include('admin.partial.update-information')
            </div>
        </div>
    </section>
@endsection
