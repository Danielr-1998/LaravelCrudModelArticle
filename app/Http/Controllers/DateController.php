<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Date;
use Illuminate\Support\Facades\Validator;
class DateController extends Controller
{
    //
	public function index()
	{	
		$dates=Date::all();
		return response()->json($dates,200);
		
	}
/**
 * Store
 * Almacenamiento y requerimientos funcionales
 *
 * @author Daniel
 * @version 1.0
 * @since 
 */
	public function store(Request $request){

		$validator=validator::make($request->all(),[
			'name'=>'required',
                	'email'=>'required',
                	'phone'=>'required'
		]);
		if($validator->fails()){
			$data=[
				'message'=>'Error de Validacion',
				'errors'=>$validator->errors(),
				'status'=>400
			];
		return response()->json($data,400);
		}	

		$date=Date::create([
		 	'name'=>$request->name,
                        'email'=>$request->email,
                        'phone'=>$request->phone
		]);

		if(!$date){
			 $data=[
                                'message'=>'Error al crear el estudiante',
                                'status'=>500
			 ];
		return response()->json($data,500);
		}
		$data=[
			'dates'=>$date,
			'status'=>201
		];
	}	
}
