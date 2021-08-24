<?php

namespace App\Controllers;
use CodeIgniter\Controllers;

use App\Models\SerfinModel;

use App\Models\ServiciosModel;



class Serfin extends BaseController
{

	protected $serfin;
	protected $servicio;



	public function __construct()
	{
		$this->serfin=new SerfinModel();
		$this->servicio=new ServiciosModel();

		
	}

	public function index()
	{

		$servicio=$this->servicio->where('id','2')->first();


		$serfin=$this->serfin->first();

		$data=["serfin"=>$serfin,"servicio"=>$servicio];
		
		
		$titulo="SERFIN";
		$dataheader=["titulo"=>$titulo];
		echo view('visitante/header',$dataheader);
		echo view('visitante/serfin',$data);
		echo view('visitante/footer');
	}
}
