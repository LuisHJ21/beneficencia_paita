<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\NosotrosModel;



class Contactoadmin extends BaseController
{
	protected $nosotros;


	public function __construct()
	{
		$this->nosotros=new NosotrosModel();

	}

	public function index()
	{
		$nosotros=$this->nosotros->first();
		$data=["nosotros"=>$nosotros];
		
		$titulo="Contacto";
		$dataheader=["titulo"=>$titulo];
		echo view('administracion/header',$dataheader);
		echo view('administracion/contacto',$data);
		echo view('administracion/footer');
	}
}
