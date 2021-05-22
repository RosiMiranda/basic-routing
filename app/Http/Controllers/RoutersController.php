<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Router;
use App\Activity;
use App\RouterInterface;

class RoutersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function createInterface(Router $router)
    {
        $routers = Router::all();
        $id = $router->id;
        $interfaces = Router::find($id)->interfaces;
        return view('routers.create',['router'=>$router,'id'=>$id,'routers'=>$routers, 'interfaces'=>$interfaces]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arr = $request->input();
        $routerInterface = new routerInterface();
        $routerInterface->router_id = $arr['router_id'];
        $routerInterface->interface_description = $arr['iname'];
        $routerInterface->ipv4_address = $arr['ipv4add'];
        $routerInterface->ipv4_mask = $arr['ipv4mask'];
        $routerInterface->ipv6_address = $arr['ipv6add'];
        $routerInterface->ipv6_prefix = $arr['ipv6pref'];

        $routerInterface->save();
        return redirect()-> route('routers.show',[$arr['router_id']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $routers = Router::all();
        $router = Router::find($id);
        $activity = Activity::find($router->activity_id);
        $routerInterfaces = Router::find($router->id)->interfaces;
        return view('routers.show',['activity' => $activity,'router' => $router, 'routerInterfaces'=>$routerInterfaces,'interfaces'=>$routerInterfaces, 'routers'=> $routers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function destroyInterface(RouterInterface $routerInterface, $router)
    {
        
        RouterInterface::find($id)->delete();
        return response()->json([
    
            'success' => 'Record deleted successfully!'
    
        ]);
        
    }
}
