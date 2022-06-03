<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use DataTables;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
   
        if ($request->ajax()) {
            $data = Compra::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()->make(true);
        }
      
        return view('compras');
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Compra::updateOrCreate(['id' => $request->compra_id],
                ['fecha' => $request->fecha, 'id_proveedor' => $request->id_proveedor,
                'id_producto' => $request->id_producto, 'cantidad' => $request->cantidad,
                'monto' => $request->monto
                ]);        
   
        return response()->json(['success'=>'Compra guardado existosamente.']);
    }
}
