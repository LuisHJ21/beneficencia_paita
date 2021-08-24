<?php

namespace App\Controllers;
use CodeIgniter\Controller;

use App\Models\NoticiasModel;
use App\Models\ImagenesnoticiasModel;

require_once __DIR__ . '/../../vendor/autoload.php';
use Cloudinary\ClassUtils;
use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

class Noticiasadmin extends BaseController
{
	protected $noticias;
	protected $cloudinary;
	protected $imgnoticia;

	public function __construct()
	{
		$this->noticias=new NoticiasModel();
		$this->imgnoticia=new Imagenesnoticiasmodel();
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
		$noticias=$this->noticias->where('estado','Activo')->findall();
		$data=["noticias"=>$noticias];

		$titulo=['titulo'=>"Noticias"];
		echo view('administracion/header',$titulo);
		echo view('administracion/noticias/noticias',$data);
		echo view('administracion/footer');
	}

	public function eliminadas()
	{
		$noticias=$this->noticias->where('estado','Inactivo')->findall();
		$data=["noticias"=>$noticias];

		$titulo=['titulo'=>"Noticias Eliminadas"];
		echo view('administracion/header',$titulo);
		echo view('administracion/noticias/eliminadas',$data);
		echo view('administracion/footer');
	}

	public function eliminar()
	{
		try
		{

			$noticias=$this->noticias->update(
				$this->request->getPost('ideliminar'),
				[
					
					"estado"=>"Inactivo"
				]
				);

			return redirect()->to(base_url('admin/noticias'))->with('success','Noticia Eliminada con Exito');


		}catch(Excption $e)
		{
			return redirect()->to(base_url('admin/noticias'))->with('error','Error en la Eliminacion');

		}

	}

	public function restaurar()
	{
		try
		{

			$noticias=$this->noticias->update(
				$this->request->getPost('idrestaurar'),
				[
					
					"estado"=>"Activo"
				]
				);

			return redirect()->to(base_url('admin/noticias'))->with('success','Noticia Restaurada con Exito');


		}catch(Excption $e)
		{
			return redirect()->to(base_url('admin/noticias'))->with('error','Error restaurar Noticia');

		}

	}


	public function agregar()
	{
		$titulo=['titulo'=>"Agregar Noticia"];
		echo view('administracion/header',$titulo);
		echo view('administracion/noticias/nuevanoticia');
		echo view('administracion/footer');
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
				'folder'=>'beneficencia/noticias/',
				'public_id' =>$path,
				'lastestVersion'=>true
			
			]);

			unlink($imagensubir);


			$noticias=$this->noticias->save(
				[
					"imagen"=>$this->cloudinary->image('beneficencia/noticias/'.$path2),
					"titulo"=> $this->request->getPost('titulo'),
					"contenido"=>$this->request->getPost('contenido')
				]
				);

			return redirect()->back()->with('success','Registro Exitoso');


		}catch(Excption $e)
		{
			return redirect()->back()->with('error','Error en el Registro');

		}
	}


	public function anexar()
	{
		try {

			$id=$this->request->getPost('idsubir');
			$imagenes= $this->request->getFiles();

			foreach($imagenes['imagenessubir'] as $imagen)
			{
				$nombre= substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
				$extension=$imagen->guessExtension();
				$path= strtr($nombre," ", "_");
				$path2=$path.'.'.$extension;
				$imagen->move(WRITEPATH.'uploads',$path2);
			
				$imagensubir=WRITEPATH.'uploads/'.$path2;


				$this->cloudinary->uploadApi()->upload($imagensubir, 
				[
					'folder'=>'beneficencia/imagenesNoticias/',
					'public_id' =>$path,
					'lastestVersion'=>true
				
				]);

				unlink($imagensubir);
				

				$imgnoticia=$this->imgnoticia->save(
					[
						"imagen"=>$this->cloudinary->image('beneficencia/imagenesNoticias/'.$path2),
						"id_noticia"=> $id
						
					]
					);

				


			}


			return redirect()->back()->with('success','Imagenes Registradas con Exito');
	
		
		
		} catch (Excption $e) {
			return redirect()->back()->with('error','Error en el Registro');
		}
	}
}
