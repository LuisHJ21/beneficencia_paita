<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\NichosModel;


class Nichosadmin extends BaseController
{
	protected $nichos;



	public function __construct()
	{

		$this->nichos=new NichosModel();


	}
	public function index()
	{

		$nichosV=$this->nichos->where('tipo','v') ->orderBy('nivel', 'desc')->findall();
		$nichosP=$this->nichos->where('tipo','p') ->orderBy('nivel', 'desc')->findall();
		$nichosA=$this->nichos->where('tipo','a') ->orderBy('nivel', 'desc')->findall();
		
		$titulo=['titulo'=>"Nichos"];

		$data=
		[
			"nichosv"=>$nichosV,
			"nichosp"=>$nichosP,
			"nichosa"=>$nichosA
	
		];

		echo view('administracion/header',$titulo);
		echo view('administracion/nichos/nichos',$data);
		echo view('administracion/footer');
	}


	public function agregar()
	{
		try {

			$nivel=$this->request->getPost('nivel');
			$precio=$this->request->getPost('precio');
			$tipo=$this->request->getPost('tipo');


			$nichos=$this->nichos->save(
				[
					"nivel"=>$nivel,
					"precio"=>$precio,
					"tipo"=>$tipo
				]
			);

			return redirect()->back()->with('success','Agregado con Exito')->with('tipo',$tipo);
		
		} 
		catch (Exception $e) {
			return redirect()->back()->with('error','Hubo un Error')->with('tipo',$tipo);
		}

		
	}

	public function editarprecio()
	{
		try {

		
			$tipo=$this->request->getPost('tipoeditar');
			$precio=$this->request->getPost('precioeditar');
			

			$nichos=$this->nichos->update(
				$this->request->getPost('idnicho'),
				[
					"precio"=>$precio
					
				]
			);

			return redirect()->back()->with('success','Actualizado con Exito')->with('tipo',$tipo);
		
		} 
		catch (Exception $e) {
			return redirect()->back()->with('error','Hubo un Error')->with('tipo',$tipo);
		}

		
	}
}