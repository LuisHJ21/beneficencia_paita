<?php

namespace App\Controllers;
use CodeIgniter\Controllers;

use App\Models\SlidesModel;
use App\Models\MensajesModel;


require_once __DIR__ . '/../../vendor/autoload.php';
use Cloudinary\ClassUtils;
use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

class Slidesadmin extends BaseController
{

	protected $slides;
	protected $cloudinary;
	protected $mensajes;


	public function __construct()
	{
		$this->slides=new SlidesModel();
		$this->cloudinary=new Cloudinary([
			'cloud' => [
			  'cloud_name' => 'luishj',
			  'api_key'  => '571997451785682',
			  'api_secret' => 'uG1jBE2toxvmYZEgx1x6j2HeOfU',
			'url' => [
			  'secure' => true]]]);

		$this->mensajes=new MensajesModel();

	}

	public function index()
	{
		$slides=$this->slides->findall();
		$noread=$this->mensajes->where('estado', 'no leido')->findall();


		$data=["slides"=>$slides];

		$titulo=['titulo'=>"Slides","noread"=>$noread];
        echo view('administracion/header',$titulo);
        echo view('administracion/slides',$data);
		echo view('administracion/footer');
		
	}

	public function subirimagen()
	{
		try {
			$nombre= substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);

			$img= $this->request->getFile('imagensubir');

			
		
			$extension=$img->guessExtension();
			
			$path= strtr($nombre," ", "_");
			$path2=$path.'.'.$extension;
			$img->move(WRITEPATH.'uploads',$path2);
		
			$imagensubir=WRITEPATH.'uploads/'.$path2;

			
			
			$this->cloudinary->uploadApi()->upload($imagensubir, 
			[
				'folder'=>'beneficencia/slides/',
				'public_id' =>$path,
				'lastestVersion'=>true
			
			]);

			unlink($imagensubir);

			$slides=$this->slides->save(
				[
					"imagen"=>$this->cloudinary->image('beneficencia/slides/'.$path2),
					"public_id"=>'beneficencia/slides/'.$path,
					"titulo"=> $this->request->getPost('titulo'),
					"contenido"=>$this->request->getPost('contenido')
				]
				); 


			return redirect()->to(base_url('admin/slides'))->with('success','Nueva Imagen Agregada Correctamente.');
		} catch (Exception $e) {
			return redirect()->to(base_url('admin/slides'))->with('error','Ha ocurrido un error al agregar la Imagen.');
		}

	}


	public function actualizarcontenido()
	{


		try {
			
			$slides=$this->slides->update(
				$this->request->getPost('idedit'),
				[
					
					"titulo"=> $this->request->getPost('tituloedit'),
					"contenido"=>$this->request->getPost('contenidoedit')
				]
				); 

				return redirect()->to(base_url('admin/slides'))->with('successactualizar','Contenido Actualizado Correctamente.');

		
		} catch (Exception $e) {
			return redirect()->to(base_url('admin/slides'))->with('erroractualizar','Error en la Actualizacion.');

		}

	}

	public function eliminarimagen()
	{
		try {

			$ideliminar=$this->request->getPost('ideliminar');
			$public_id=$this->request->getPost('public_id');

			$slides=$this->slides->delete($ideliminar);

			$this->cloudinary->uploadApi()->destroy($public_id);


			$slides=$this->slides->purgeDeleted();

			return redirect()->to(base_url('admin/slides'))->with('success','La Imagen se ha Eliminado con Exito.');


			
		} catch (Exception $e) {
			return redirect()->to(base_url('admin/slides'))->with('error','Error al Eliminar Imagen.');

		}

	}
}
