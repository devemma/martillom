<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use DataTables;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Proveedor::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Editar</a>';

                    //$btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Eliminar</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('proveedores');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Proveedor::updateOrCreate(
            ['id' => $request->proveedor_id],
            [
                'nombre' => $request->nombre, 'rfc' => $request->rfc, 'domicilio' => $request->domicilio,
                'ciudad' => $request->ciudad, 'telefono' => $request->telefono
            ]
        );

        return response()->json(['success' => 'Proveedor guardado existosamente.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = Proveedor::find($id);
        return response()->json($proveedor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proveedor  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proveedor::find($id)->delete();

        return response()->json(['success' => 'Proveedor eliminado existosamente.']);
    }
}
