<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use Illuminate\Support\Facades\Validator;

class ApinotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $o_all = Nota::all();
		$lista = [];
		foreach($o_all as $key => $row){
			$out = [];
			$iter = $key+1;
			array_push($out,$iter);
			array_push($out,$row->nombre);
			array_push($out,$row->parcial1);
			array_push($out,$row->parcial2);
			array_push($out,$row->parcial3);
			array_push($out,$row->final);
			$url_btn = url('api/notas/'.$row->id);
			//Method PUT
			array_push($out,'<a data-id="'.$row->id.'" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-href="'.$url_btn.'" href="javascript:void(0)">Editar</a>');
			//Method DELETE
			array_push($out,'<a data-id="'.$row->id.'" class="btn btn-danger btn-sm btn-delete-confirm" data-href="'.$url_btn.'" href="javascript:void(0)">Eliminar</a>');
			array_push($lista,$out);
		}
		return \response(['data' => $lista]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$final = ($request->parcial1 + $request->parcial2 + $request->parcial3)/3;
		$nota = Nota::create(['nombre' => $request->nombre,'parcial1' => $request->parcial1,'parcial2' => $request->parcial2,'parcial3' => $request->parcial3,'final' => $final]);
		return \response($nota);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(empty($id)){
			return \response('Debe pasar un ID');
		}
		$o = Nota::findOrFail($id);
		if(empty($o->id)){
			return \response('La nota no existe.');
		}
		return \response($o);
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
        if(empty($id)){
			return \response('Debe pasar un ID');
		}
		$o = Nota::findOrFail($id);
		if(empty($o->id)){
			return \response('La nota no existe.');
		}
		$final = ($request->parcial1 + $request->parcial2 + $request->parcial3)/3;
		$params = ['nombre' => $request->nombre,'parcial1' => $request->parcial1,'parcial2' => $request->parcial2,'parcial3' => $request->parcial3,'final' => $final];
		$o->update($params);
		return \response($o);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(empty($id)){
			return \response('Debe pasar un ID');
		}
		$o = Nota::findOrFail($id);
		if(empty($o->id)){
			return \response('La nota no existe.');
		}
		$nombre = $o->nombre;
		Nota::destroy($id);
		return \response('La nota de '.$nombre.' ha sido eliminada correctamente.');
    }
}
