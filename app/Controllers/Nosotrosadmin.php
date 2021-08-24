<?php

namespace App\Controllers;
use CodeIgniter\Controllers;

use App\Models\NosotrosModel;

require_once __DIR__ . '/../../vendor/autoload.php';
use Cloudinary\ClassUtils;
use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

class Nosotrosadmin extends BaseController
{

	protected $nosotros;
	protected $cloudinary;

	public function __construct()
	{
		$this->nosotros=new NosotrosModel();
		$this->cloudinary=new Cloudinary([
			'cloud' => [
			  'cloud_name' => 'luishj',
			  'api_key'  => '571997451785682',
			  'api_secret' => 'uG1jBE2toxvmYZEgx1x6j2HeOfU',
			'url' => [
			  'secure' => true]]]);
	}

	public function historia()
	{
		$nosotros=$this->nosotros->first();
		$data=["nosotros"=>$nosotros];
		$titulo=['titulo'=>"Historia"];
		echo view('administracion/header',$titulo);
		echo view('administracion/nosotros/historia',$data);
		echo view('administracion/footer');
	}

	public function mision()
	{
		$nosotros=$this->nosotros->first();
		$data=["nosotros"=>$nosotros];
		$titulo=['titulo'=>"Mision"];
		echo view('administracion/header',$titulo);
		echo view('administracion/nosotros/mision',$data);
		echo view('administracion/footer');
	}

	public function vision()
	{
		$nosotros=$this->nosotros->first();
		$data=["nosotros"=>$nosotros];
		$titulo=['titulo'=>"Vision"];
		echo view('administracion/header',$titulo);
		echo view('administracion/nosotros/vision',$data);
		echo view('administracion/footer');
	}


	public function guardarhistoria()
	{
		try {

			$nosotros=$this->nosotros->first();
			$id=$nosotros['id'];

			$historia=$this->nosotros->update($id,
			[
				"historia"=>$this->request->getPost('histora')
			]);

			return redirect()->to(base_url('admin/nosotros/historia'))->with('success','Exito');

		} catch (Exception $th) {
			return redirect()->to(base_url('admin/nosotros/historia'))->with('error','Error');

		}
		


	}

	public function guardarmision()
	{

		try {

			$nosotros=$this->nosotros->first();
			$id=$nosotros['id'];

			$mision=$this->nosotros->update($id,
			[
				"mision"=>$this->request->getPost('mision')
			]);
			return redirect()->to(base_url('admin/nosotros/mision'))->with('success','Exito');


		} catch (Exception $th) {
			return redirect()->to(base_url('admin/nosotros/mision'))->with('error','Error');

		}
		
		
	}

	public function guardarvision()
	{
		try {

			$nosotros=$this->nosotros->first();
			$id=$nosotros['id'];

			$vision=$this->nosotros->update($id,
			[
				"vision"=>$this->request->getPost('vision')
			]);

			return redirect()->to(base_url('admin/nosotros/vision'))->with('success','Exito');

			
		} catch (Eception $th) {
			return redirect()->to(base_url('admin/nosotros/vision'))->with('error','Error');

		}
		
		
	}


	public function guardarcontacto()
	{

		try {

			$nosotros=$this->nosotros->first();
			$id=$nosotros['id'];

			$contacto=$this->nosotros->update($id,
			[
				"telefono"=>$this->request->getPost('numero'),
				"direccion"=>$this->request->getPost('direccion'),
				"correo"=>$this->request->getPost('correo')


			]);

			return redirect()->to(base_url('admin/contacto'))->with('success','Datos Actualizados');

			
		} catch (Eception $th) {
			return redirect()->to(base_url('admin/contacto'))->with('error','Error en la Actualizacion');

		}

	}

	


	



	public function subirimagenhistoria()
	{
		try {
			$nosotros=$this->nosotros->first();
			$id=$nosotros['id'];

			$nombre= "imagenhistoria";

			$img= $this->request->getFile('imagensubir');
		
			$extension=$img->guessExtension();
			$path= strtr($nombre," ", "_");
			$path2=$path.'.'.$extension;
			$img->move(WRITEPATH.'uploads',$path2);
		
			$imagensubir=WRITEPATH.'uploads/'.$path2;

			
			
			$this->cloudinary->uploadApi()->upload($imagensubir, 
			[
				'folder'=>'beneficencia/nosotros/',
				'public_id' =>$path,
				'lastestVersion'=>true
			
			]);

			unlink($imagensubir);

			$nosotros2=$this->nosotros->update($id,
				[
					"imagen_historia"=>$this->cloudinary->image('beneficencia/nosotros/'.$path2)
				]
				); 

			return redirect()->to(base_url('admin/nosotros/historia'))->with('successimg','Exito');
		} catch (Exception $e) {
			return redirect()->to(base_url('admin/nosotros/historia'))->with('errorimg','Error '.$e->getMessage());
		}

	}
}
