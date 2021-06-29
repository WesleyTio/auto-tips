<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TipController extends Controller
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


    public function lastTips(){
        $tips = Tip::all()->sortByDesc('id');
        $reverseTip = $tips->values()->take(10);
        $reverseArrayTip = array();
        foreach($reverseTip as $tip){
            $item = array('vehicle' => $tip->vehicle->type, 'brand' => $tip->brand, 'model' =>$tip->model);
            array_push($reverseArrayTip, $item);
        }
        return response()->json($reverseArrayTip);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $tip = new Tip([
            'fk_user' =>Auth::user()->id,
            'fk_vehicle' => $request->vehicle,
            'tip' => $request->tip,
            'brand' => $request->brand,
            'model' => $request->model,
            'version' => $request->version,
        ]);
        $tip->save();

        return response()->json("Dica adcionada com sucesso");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tip = Tip::find($id);
        $response =[
            'selectevehicle'   => $tip->vehicle->id,
            'brand'     => $tip->brand,
            'model'     => $tip->model,
            'version'   => $tip->version,
            'tipText'   => $tip->tip,
        ];
        return response()->json($response);

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
        $tip = Tip::find($id);
        /*$tip->vehicle = $request->vehicle;
        $tip->brand = $request->brand;
        $tip->model = $request->model;
        $tip->version = $request->version;
        $tip->tip = $request->tip;*/
        if($tip->update($request->all())){
            $response =[
                'success'   => true,
                'message'   => 'Dica alterada com sucesso'
            ];
        }else{
            $response =[
                'success'   => true,
                'message'   => 'Erro ao salvar alteração'
            ];

        }

        return response()->json($response);

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
        $tip = Tip::find($id);
       
        if($tip->delete()){
            $response =[
                'success'   => true,
                'message'   => 'Dica removida com sucesso'
            ];

        }else{
            $response =[
                'success'   => false,
                'message'   => 'Ops!! Falha na remoção da dica!'
            ];

        }
        return response()->json($response);

    }
}
