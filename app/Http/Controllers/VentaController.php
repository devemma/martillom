<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use DataTables;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
   
        if ($request->ajax()) {
            $data = Venta::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()->make(true);
        }
      
        return view('ventas');
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Venta::updateOrCreate(['id' => $request->venta_id],
                ['fecha' => $request->fecha,
                'id_producto' => $request->id_producto, 'cantidad' => $request->cantidad,
                'monto' => $request->monto
                ]);        
   
        return response()->json(['success'=>'Venta guardado existosamente.']);
    }
}
