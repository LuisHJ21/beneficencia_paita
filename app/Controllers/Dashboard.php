<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		$titulo=['titulo'=>"DashBoard"];
        echo view('administracion/header',$titulo);
        echo view('administracion/dashboard');
		echo view('administracion/footer');
		
	}
}
