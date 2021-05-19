@extends('layouts.app')

@section('template_title')
    {{ $user->name }}'s Profile
@endsection

@section('template_fastload_css')
    #map-canvas{
        min-height: 300px;
        height: 100%;
        width: 100%;
    }
@endsection

@php
    $currentUser = Auth::user()
@endphp
<style type="text/css">
    .profData{
        padding: 10px;
        margin: 5px;
        background-color: lightgreen !important;
            }
</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <div class="card">
                    <div class="card-header">
                        {{' Your Profile' }}
                    </div>
                   <div class="card-body">
                    <h4>Your Profile</h4>

                    <div class="card profData">
                        <label>First Name</label>
                        <p>{{$user->first_name}}</p>
                    </div>
                    <div class="card profData">
                        <label>Last Name</label>
                        <p>{{$user->last_name}}</p>
                    </div>
                    <div class="card profData">
                        <label>Email</label>
                        <p>{{$user->email}}</p>
                    </div>
                    <div class="card profData">
                        <label>Role</label>
                        <p>{{$user->requestAs}}</p>
                    </div>


                   </div>
                   <div class="card-footer">
                        <div class="row">
                                                    <div class="col-md-12">
                                                <a class="btn btn-sm btn-success btn-block" href="{{ URL::to('player/profile/' .$user->id .'/edit') }}" data-toggle="tooltip" title="Show">
                                                    {!! trans('Update') !!}
                                                </a>
                                                    </div>
                                                </div>
                   </div>
                                   </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')

    @if(config('settings.googleMapsAPIStatus'))
        @include('scripts.google-maps-geocode-and-map')
    @endif

@endsection
