@extends('layouts.app')
@section('content')
    <div id="app">
        <app-component></app-component>
        <a style="margin-left: 150px;" class="btn btn-outline-secondary " href="{{route('csv')}}">Télécharge2</a>
    </div>
@endSection
