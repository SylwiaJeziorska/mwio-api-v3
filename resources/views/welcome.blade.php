@extends('layouts.app')
@section('content')
    <div id="app">
        @if(Auth::check())
            @if (Auth::user()->role == "Admin" || Auth::user()->role == "super-admin" )
                <example-component :authUser='@json(auth()->user()->id)' :admin="true"></example-component>
            @else
                <example-component :authUser='@json(auth()->user()->id)' :admin="false"></example-component>
            @endif
        @else
            <example-component :admin="false"></example-component>
        @endif
    </div>
@endSection

