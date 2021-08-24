<?php

namespace App\Controllers;
use CodeIgniter\Controllers;


use App\Models\EventosModel;

use Cloudinary\ClassUtils;
use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

class Eventosadmin extends BaseController
{

	protected $eventos;
	protected $cloudinary;

	public function __construct()
	{
		$this->eventos=new EventosModel();
		$this->cloudinary=new Cloudinary([
			'cloud' => [
			  'cloud_name' => 'luishj',
			  'api_key'  => '571997451785682',
			  'api_secret' => 'uG1jBE2toxvmYZEgx1x6j2HeOfU',
			'url' => [
			  'secure' => true]]]);
	}

	public function index()
	{

		$eventos=$this->eventos->where('estado','Activo')->findall();
		$data=["eventos"=>$eventos];

		$titulo=['titulo'=>"Eventos"];
		echo view('administracion/header',$titulo);
		echo view('administracion/eventos/eventos',$data);
		echo view('administracion/footer');
	}

	public function eliminados()
	{

		$eventos=$this->eventos->where('estado','Inactivo')->findall();
		$data=["eventos"=>$eventos];

		$titulo=['titulo'=>"Eventos"];
		echo view('administracion/header',$titulo);
		echo view('administracion/eventos/eliminados',$data);
		echo view('administracion/footer');
	}


	public function agregar()
	{
		$titulo=['titulo'=>"Agregar Evento"];
		echo view('administracion/header',$titulo);
		echo view('administracion/eventos/nuevoevento');
		echo view('administracion/footer');
	}

	public function eliminar()
	{
		try {

			$eventos=$this->eventos->update(
				$this->request->getPost('ideliminar'),
				[
					"estado"=>"Inactivo"
				]
				);

			return redirect()->to(base_url('admin/eventos'))->with('success','El Evento se ha eliminado Correctamente.');
			
		} catch (Exception $e) {
			return redirect()->to(base_url('admin/eventos'))->with('error','Error en la Eliminacion.');

		}

	}

	public function restaurar()
	{
		try {

			$eventos=$this->eventos->update(
				$this->request->getPost('ideliminar'),
				[
					"estado"=>"Activo"
				]
				);

			return redirect()->to(base_url('admin/eventos'))->with('success','El Evento se ha Restaurado Correctamente.');
			
		} catch (Exception $e) {
			return redirect()->to(base_url('admin/eventos'))->with('error','Error en la Restauracion.');

		}

	}

	public function registrar()
	{
		try
		{
			
			$nombre= substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);

			$img= $this->request->getFile('imagensubir');
			
			$extension=$img->guessExtension();
			$path= strtr($nombre," ", "_");
			$path2=$path.'.'.$extension;
			$img->move(WRITEPATH.'uploads',$path2);
		
			$imagensubir=WRITEPATH.'uploads/'.$path2;

			
			
			$this->cloudinary->uploadApi()->upload($imagensubir, 
			[
				'folder'=>'beneficencia/eventos/',
				'public_id' =>$path,
				'lastestVersion'=>true
			
			]);

			unlink($imagensubir);


			$eventos=$this->eventos->save(
				[
					"imagen"=>$this->cloudinary->image('beneficencia/eventos/'.$path2),
					"nombre"=> $this->request->getPost('titulo'),
					"fecha"=> $this->request->getPost('fecha'),
					"hora"=> $this->request->getPost('hora'),
					"lugar"=>$this->request->getPost('lugar'),
					"detalle"=>$this->request->getPost('detalle')
				]
				);

			return redirect()->back()->with('success','Registro Exitoso');


		}catch(Excption $e)
		{
			return redirect()->back()->with('error','Error en el Registro');

		}
	}
}
