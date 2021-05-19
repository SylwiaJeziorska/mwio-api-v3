@extends('layouts.app')
@section('content')
    <div id="app">
        @if(Auth::check())
            @if (Auth::user()->role == "Admin" || Auth::user()->role == "super-admin" )
                <app-component :authUser='@json(auth()->user()->id)' :admin="true" :user='@json(Auth::user())'></app-component>
            @else
                <app-component :authUser='@json(auth()->user()->id)' :admin="false" :user='@json(Auth::user())'></app-component>
            @endif
        @else
            <app-component :admin="false" :user="false"></app-component>
        @endif
    </div>
@endSection
