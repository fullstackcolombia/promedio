<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use Illuminate\Support\Facades\Validator;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Lista de notas';
        $data['lista'] = Nota::orderBy('id', 'asc')->get();
		return view('lista',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Lista de notas';
        $data['lista'] = Nota::get();
		return view('create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'nombre' => 'required|string',
			'parcial1' => 'required|numeric|between:1,5',
			'parcial2' => 'required|numeric|between:1,5',
			'parcial3' => 'required|numeric|between:1,5',
		],[
			'nombre.required' => 'El nombre es requerido',
			'parcial1.required' => 'El parcial 1 es requerido',
			'parcial1.numeric' => 'El parcial 1 debe ser un número',
			'parcial1.between' => 'El parcial 1 debe ser un número entre 1 y 5',
			'parcial2.required' => 'El parcial 2 es requerido',
			'parcial2.numeric' => 'El parcial 2 debe ser un número',
			'parcial2.between' => 'El parcial 2 debe ser un número entre 1 y 5',
			'parcial3.required' => 'El parcial 3 es requerido',
			'parcial3.numeric' => 'El parcial 3 debe ser un número',
			'parcial3.between' => 'El parcial 3 debe ser un número entre 1 y 5',
		]);
		$final = ($request->parcial1 + $request->parcial2 + $request->parcial3)/3;
		//Opcion 1
		/*$nota = new Nota;
		$nota->nombre = $request->nombre;
		$nota->parcial1 = $request->parcial1;
		$nota->parcial2 = $request->parcial2;
		$nota->parcial3 = $request->parcial3;
		$nota->final = $final;
		$nota->save();*/
		//Opcion 2
		$nota = Nota::create(['nombre' => $request->nombre,'parcial1' => $request->parcial1,'parcial2' => $request->parcial2,'parcial3' => $request->parcial3,'final' => $final]);
		$request->session()->flash('msj_success', 'La nota de '.$request->nombre.' ha sido registrada correctamente.');
		return redirect('/');
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
			return redirect('/');
		}
		$o = Nota::findOrFail($id);
		if(empty($o->id)){
			return redirect('/');
		}
		Nota::destroy($id);
		$request->session()->flash('msj_success', 'La nota de '.$o->nombre.' ha sido eliminada correctamente.');
		return redirect('/');
    }
}
