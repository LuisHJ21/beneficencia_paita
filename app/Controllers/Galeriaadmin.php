<?php

namespace App\Controllers;
use CodeIgniter\Controller;

use App\Models\MensajesModel;
use App\Models\GaleriaModel;

require_once __DIR__ . '/../../vendor/autoload.php';
use Cloudinary\ClassUtils;
use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;


class Galeriaadmin extends BaseController
{

	protected $mensajes;
	protected $cloudinary;
	protected $galeria;


	public function __construct()
	{
		$this->mensajes=new MensajesModel();

		$this->galeria=new GaleriaModel();
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

		$galeria=$this->galeria->findall();

		$noread=$this->mensajes->where('estado', 'no leido')->findall();

		$titulo="Galeria SERFIN";

		$data=["galeria"=>$galeria];


		$dataheader=["titulo"=>$titulo,"noread"=>$noread];
		echo view('administracion/header',$dataheader);
		echo view('administracion/galeria',$data);
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
				'folder'=>'beneficencia/galeriaserfin/',
				'public_id' =>$path,
				'lastestVersion'=>true
			
			]);

			unlink($imagensubir);

			$galeria=$this->galeria->save(
				[
					"imagen"=>$this->cloudinary->image('beneficencia/galeriaserfin/'.$path2),
					"public_id"=>'beneficencia/galeriaserfin/'.$path
					
				]
				); 


			return redirect()->to(base_url('admin/serfin/galeria'))->with('success','Nueva Imagen Agregada Correctamente.');
		} catch (Exception $e) {
			return redirect()->to(base_url('admin/serfin/galeria'))->with('error','Ha ocurrido un error al agregar la Imagen.');
		}

	}


	public function eliminarimagen()
	{
		try {

			$ideliminar=$this->request->getPost('ideliminar');
			$public_id=$this->request->getPost('public_id');

			$galeria=$this->galeria->delete($ideliminar);

			$this->cloudinary->uploadApi()->destroy($public_id);


			$galeria=$this->galeria->purgeDeleted();

			return redirect()->to(base_url('admin/serfin/galeria'))->with('success','La Imagen se ha Eliminado con Exito.');


			
		} catch (Exception $e) {
			return redirect()->to(base_url('admin/serfin/galeria'))->with('error','Error al Eliminar Imagen.');

		}

	}


	

}
