<?php

namespace App\Http\Controllers;

use App\Models\Tovar;
use App\Services\GroupServices;
use App\Services\TovarSerivces;
use Illuminate\Http\Request;


/**
 * @SWG\Swagger(
 *   basePath="/api",
 *   @SWG\Info(
 *     title="Core API",
 *     version="1.0.0"
 *   )
 * )
 */
class TovarController extends Controller
{
    /**
     * @SWG\Get(
     *   path="/sample",
     *   summary="Sample",
     *   @SWG\Response(response=200, description="successful operation")
     * )
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TovarSerivces $services)
    {
        $datas=$services->select();
        return view('tovar',['datas'=>$datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(GroupServices $services)
    {
        $DataGrs=$services->select();
        return view('back.tovaradd',['DataGrs'=>$DataGrs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,TovarSerivces $serivces)
    {
        $serivces->create($request);
        return redirect('/tovar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tovar  $tovar
     * @return \Illuminate\Http\Response
     */
    public function show(Tovar $tovar,TovarSerivces $serivces,GroupServices $groupServices)
    {
        $data=$serivces->SelectId($tovar->id);
        $DataGrs=$groupServices->select();
        return view('tovarshow',['data'=>$data,'DataGrs'=>$DataGrs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tovar  $tovar
     * @return \Illuminate\Http\Response
     */
    public function edit(Tovar $tovar,TovarSerivces $tovarSerivces,GroupServices $groupServices)
    {
        $data=$tovarSerivces->SelectId($tovar->id);
        $DataGrs=$groupServices->select();
        return view('back.tovaredit',['data'=>$data,'DataGrs'=>$DataGrs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tovar  $tovar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tovar $tovar,TovarSerivces $tovarSerivces)
    {
        $tovarSerivces->update($request,$tovar);
        return redirect('/tovar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tovar  $tovar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tovar $tovar,TovarSerivces $tovarSerivces)
    {
        $tovarSerivces->delete($tovar->id);
        return redirect('/tovar');
    }
}
