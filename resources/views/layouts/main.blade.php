<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- font -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../../css/main.css" />
        <link rel="stylesheet" href="../../css/style.css">
        <!-- google icons -->
        <link href="https://fonts.googleapis.com/icon?family=Ubuntu"rel="stylesheet">

        {{-- AJAX --}}
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


        <title>Static Routing</title>
    </head>
<body>

    <header>
        <div class="flex-row text-center d-flex justify-content-around">
            <div class="col-4">
                <span class="align-middle">Esquema de Direccionamiento</span>
            </div>
            <div class="col-4">
                <span class="align-middle">Ruteo Estático</span>
            </div>
            <div class="col-4">
                <span class="align-middle">OSPF</span>
            </div>
        </div>
    </header>

    <div class="row text-center h-100 ">
        @yield('content')
        <div class="col-3">
            <div class="row h-100" style="margin: 3rem 2rem 0rem 0rem">
                <div class="command-line col-12 h-75 "style="padding:0">
                    <div class="flex-row text-center">
                        <h2>Comandos</h2>
                        <form style="margin:0">
                            <div  class="command-line col-12 ">
                                <div class="command-line col-12 text-left" style="height: 30rem;border: 2px solid #FFFFFF;overflow-y: scroll;">
                                    @foreach ($routers as $routercommand)
                                        <x-commands hostname="{{$routercommand->hostname}}" commands="Algo">
                                            @foreach ($interfaces as $interface)
                                            @if ($routercommand->id == $interface->router_id)
                                                <div id="{{$interface->router_id}}-{{$interface->id}}">
                                                    <div>interface {{$interface->interface_description}}</div>
                                                    <div>ip address {{$interface->ipv4_address}} {{$interface->ipv4_mask}}</div>
                                                    <div>ipv6 address {{$interface->ipv6_address}} {{$interface->ipv6_prefix}}</div>
                                                </div>
                                            @endif
                                            <br>
                                            @endforeach
                                        </x-commands>
                                    @endforeach
                                </div>
                            </div>
                            <button class="add-button "> Subir Actividad</button>                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    function deleteInterface(router_id,interface_id){
        console.log("entra");

        var url = "{{  route('routers.destroyInterface', 0)}}";
        console.log(url);
        var dltUrl = url+interface_id;
        console.log(dltUrl);

        $.ajax({
            url: dltUrl,
            method: 'DELETE',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        }).done((res) => {
            var interfaceDiv = document.getElementById(router_id+"-"+interface_id);
            interfaceDiv.parentNode.removeChild(interfaceDiv);
            console.log(res);
        }).fail((jqXHR, res)=> {
            console.log('Fallido', res);
        })
    }</script>
