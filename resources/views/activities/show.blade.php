@extends('layouts.main')
@section('content')

    {{-- Devices --}}
    <div class="col-3">
        <h2>Devices</h2>
        @foreach ($routers as $router)
            <x-device-card hostname="{{$router->hostname}}" id="{{$router->id}}"></x-device-card>    
        @endforeach
    </div>
    {{-- Activity info --}}
    <div class="col-6">
        <div class="flex-row text-center">
            <h1>{{$activity->titulo}}</h1>
        </div>
        <div class="flex-row text-center">
            <span> Instrucciones: {{$activity->instrucciones}}</span>
        </div>
        <div class="row">
            <img src="/img/topology-1.png" style="max-width: 40rem; max-height: 35rem;">
        </div>
    </div>

@endsection