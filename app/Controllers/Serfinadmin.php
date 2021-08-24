<?php

namespace App\Controllers;
use CodeIgniter\Controllers;



class Serfinadmin extends BaseController
{


	public function __construct()
	{

	}

	public function index()
	{
		
		
		$titulo="SERFIN";
		$dataheader=["titulo"=>$titulo];
		echo view('administracion/header',$dataheader);
		echo view('administracion/serfin');
		echo view('administracion/footer');
	}
}
