<?php

namespace App\Controllers;
use CodeIgniter\Controllers;

use App\Models\EventosModel;

class Eventos extends BaseController
{
	protected $eventos;

	public function __construct()
	{
		$this->eventos=new EventosModel();
		
	}

	public function index()
	{
		$eventos=$this->eventos->where('estado','Activo') ->orderBy('fecha', 'desc')->findall();
		$titulo="Eventos";

		$data=["eventos"=>$eventos];
		$dataheader=["titulo"=>$titulo];
		echo view('visitante/header',$dataheader);
		echo view('visitante/eventos',$data);
		echo view('visitante/footer');
	}
}
