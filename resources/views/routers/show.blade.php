@extends('layouts.main')
@section('content')


    <div class="col-9">
        <div class="row text-center" style="margin:1rem">
            <div class="col-3">
                <a href="{{ route('activities.show', ['activity' => $activity]) }}"><img src="/img/back-arrow.png" style="max-width: 2rem; max-height: 2rem;"></a>
            </div>
            <div class="col-3">
                <h1>{{$router->hostname}}</h1>
            </div>
            <div class="col-3">
                <button class="edit-button">Editar nombre</button>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12">
                <a href="{{ route('routers.createInterface', ['router' => $router]) }}" class="btn add-button">Agregar Interfaz</a>
            </div>
        </div>
        <div class="row text-center">
            @foreach ($routerInterfaces as $routerinterface)
                <div class="col-3 interface-card" style="padding-left: 0px;">
                    <h3>Interfaz: {{$routerinterface->id}}</h3>
                    <h3>{{$routerinterface->interface_description}}</h3>
                    
                    <h2>Ipv4</h2>
                    <div class="row">
                        <span>Direccion: {{$routerinterface->ipv4_address}}</span>
                    </div>
                    <div class="row">
                        <span>Máscara: {{$routerinterface->ipv4_mask}}</span>
                    </div>
                    <br>
                    <h2>Ipv6</h2>
                    <div class="row">
                        <span>Direccion: {{$routerinterface->ipv6_address}}</span>
                    </div>
                    <div class="row">
                        <span>Prefijo: {{$routerinterface->ipv6_prefix}}</span>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <button class="edit-button">Editar</button>
                        </div>
                        <div class="col-6">

                                <input  type="button" class="delete-button" value="Borrar" onclick="deleteInterface({{ $routerinterface->id }});" >
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
@push('layout_end_body')
<script>
    function deleteInterface(id){

        var url = "{{  route('routers.destroyInterface', 0)}}";
        var dltUrl = url+id;

        $.ajax({
            url: dltUrl,
            method: 'DELETE',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        }).done((res) => {
            var row = document.getElementById(id);
            row.parentNode.removeChild(row);
            console.log(res);
        }).fail((jqXHR, res)=> {
            console.log('Fallido', response);
        })
    }</script>
@endpush