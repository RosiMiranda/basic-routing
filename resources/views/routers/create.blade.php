@extends('layouts.main')
@section('content')


<div class="row text-center h-100 ">
    <div class="col-9">
        <div class="row text-center" style="margin:1rem">
            <div class="col-3">
                <a href="{{ route('routers.show', [$id]) }}"><img src="/img/back-arrow.png" style="max-width: 2rem; max-height: 2rem;"></a>
            </div>
            <div class="col-9">
                <h1>{{$router->hostname}}</h1>
            </div>
        </div>
        
        <div class="row justify-content-around">
            <div class="col-9 form">
                <form action="{{ route('routers.store') }}" method="POST">
                    @csrf
                    <label for="iname">Nombre de la interfaz</label>
                    <input type="text" id="iname" name="iname">

                    <h3 style="color: #17a748">Ipv4</h3>
                    <div class="row">
                        <div class="col-6">
                            <label for="ipv4add">Direccion IP</label>
                            <input type="text" id="ipv4add" name="ipv4add">
                        </div>
                        <div class="col-6">
                            <label for="ipv4mask">Mascara</label>
                            <input type="text" id="ipv4mask" name="ipv4mask">
                        </div>
                    </div>
                    
                    <h3 style="color: #02a9f7">Ipv6</h3>
                    <div class="row">
                        <div class="col-6">
                            <label for="ipv6add">Direccion IP</label>
                            <input type="text" id="ipv6add" name="ipv6add">
                        </div>
                        <div class="col-6">
                            <label for="ipv6pref">Prefijo</label>
                            <input type="text" id="ipv6pref" name="ipv6pref">
                            <input type="hidden" id="router_id" name="router_id" value={{$router->id}}>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-around">
                        <input class="btn save-button" type="submit" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
        
    </div>
    <div class="col-3">
        <x-commands></x-commands>
    </div>
</div>

@endsection