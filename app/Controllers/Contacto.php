<?php

namespace App\Controllers;
use CodeIgniter\Controllers;

use App\Models\NosotrosModel;

class Contacto extends BaseController
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
		echo view('visitante/header',$dataheader);
		echo view('visitante/contacto',$data);
		echo view('visitante/footer');
	}
}
