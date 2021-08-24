<?php

namespace App\Controllers;
use CodeIgniter\Controllers;

use App\Models\NichosModel;


class Nichos extends BaseController
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
		$titulo="Nichos";

		$data=
		[
			"nichosv"=>$nichosV,
			"nichosp"=>$nichosP,
			"nichosa"=>$nichosA
	
		];
		$dataheader=["titulo"=>$titulo];
		echo view('visitante/header',$dataheader);
		echo view('visitante/nichos',$data);
		echo view('visitante/footer');
	}
}
