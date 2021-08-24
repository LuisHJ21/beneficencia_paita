<?php

namespace App\Controllers;
use CodeIgniter\Controllers;


class Serfin extends BaseController
{


	public function __construct()
	{

	}

	public function index()
	{
		
		
		$titulo="SERFIN";
		$dataheader=["titulo"=>$titulo];
		echo view('visitante/header',$dataheader);
		echo view('visitante/serfin');
		echo view('visitante/footer');
	}
}
