@extends('layouts.home')
@section('content')


@foreach ($activities as $activity)
    <a href="{{ route('activities.show', ['activity' => $activity]) }}">
        <div class="col-3 activity-card">
            <div class="flex-row text-center">
                <h2>{{$activity->titulo}}</h2>
            </div>
            <div class="row">
                <img src="/img/topology-1.png">
            </div>
            <div class="flex-row text-center">
                <span>Instrucciones: {{$activity->instrucciones}}</span>
            </div>
        </div>
    </a>
@endforeach
@endsection