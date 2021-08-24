<?php

namespace App\Controllers;
use CodeIgniter\Controllers;


class Mensajesadmin extends BaseController
{
	

	public function __construct()
	{
		
	}

	public function index()
	{
		
		$titulo="Mensajes";
		$dataheader=["titulo"=>$titulo];
		echo view('administracion/header',$dataheader);
		echo view('administracion/mensajes/mensajes');
		echo view('administracion/footer');
	}
}
