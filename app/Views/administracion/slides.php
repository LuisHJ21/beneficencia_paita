<?php $session=session(); ?>
<div class="container">

<div class="titulo py-4">
    <h1 class="text-center">Lista de Imagenes del Slide</h1>
</div>

<?php if($session->success){ ?>
    <div class="alert alert-success" role="alert">
      <i class="fas fa-check"></i> <?php echo $session->success; ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php } ?>

    <?php if($session->error){ ?>
    <div class="alert alert-danger" role="alert">
    <i class="fas fa-times"></i> <?php echo $session->success; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php } ?>

<div class="row">

    <?php foreach($slides as $slide): ?>

    <div class="col-sm-12 col-md-3">
        <div class="card" style="padding: 0.5rem;">
            <img style="width:100%; height:200px;" src="<?php echo $slide['imagen'] ?>" alt="">
            <div class="card-img-overlay"style="padding: 0.25rem !important;">
                <div class="row justify-content-end" style="padding: 0.75rem;">
                    <div class="col-sm-4 ">
                        <a <?php echo "onclick='mdlEliminarImagen(\"".$slide['id_slide']."\",\"".$slide['public_id']."\")'" ?>  type="button" class="btn btn-outline-danger btn-block"><i class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php endforeach ?>
   

  

    <div class="col-sm-12">
        <div class="row justify-content-center">
            <div class="col-sm-6">
             <button <?php if(count($slides) >=8){echo "disabled";} ?> onclick="mdlModificarImagen()" type="button" class="btn btn-outline-success btn-block"><i class="fas fa-plus"></i> Agregar Imagen <small>(Máximo 8)</small></button>
            </div>
        </div>
    </div>

</div>


</div>



  <!-- Modal Agregar Imagen-->
<div class="modal fade" id="agregarImagen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Imagen</h5>
        
      </div>
      <div class="modal-body">
        <form id="subirimagen" method="POST" enctype="multipart/form-data"  action="<?php echo base_url() ?>/admin/slides/agregar">
          <div class="form-group">
            <input type="file" class="form-control-file" name="imagensubir" id="imagensubir" required>
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-4">
                    <div hidden class="animacion" id="animacion">
                    <i class="fas fa-spin fa-sync"></i> Subiendo Imagen...
                    </div>
                  </div>
                  <div class="col-md-4"></div>
                  <div class="col-md-2">
                    <button id="cancelar" type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cerrar</button>

                  </div>
                  <div class="col-md-2">
                     <button id="enviar" onclick="animacion()"  class="btn btn-success btn-block"><i class="fas fa-save"></i> Guardar</button>
                     <button id="original" hidden form="subirimagen" type="submit" class="btn btn-success btn-block"><i class="fas fa-save"></i> Guardar</button>

                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="eliminarimagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ELIMINAR IMAGEN</h5>
                    
                </div>
                <div class="modal-body">¿Estas seguro de eliminar esta imagen?
                   <form id="formeliminar" action="<?php echo base_url() ?>/admin/slides/eliminar" method="post">
                     <input hidden class="form-control" type="text" name="ideliminar" id="ideliminar">
                     <input hidden class="form-control" type="text" name="public_id" id="public_id">
                   </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button form="formeliminar" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar imagen</button>
                </div>
            </div>
        </div>
</div>





<script>

function mdlModificarImagen()
  {
    $('#agregarImagen').modal('show');
    
  }

  function animacion()
  {
      animacion=document.getElementById("animacion");
      btn=document.getElementById("enviar");
      btn2=document.getElementById("cancelar");
      img=document.getElementById("imagensubir");
      
      $('#original').click();
      animacion.removeAttribute("hidden");
      btn.setAttribute("disabled","");
      btn2.setAttribute("disabled","");
      img.setAttribute("disabled","");
    
  }

  function mdlEliminarImagen(id,publicid)
  {
    $('#eliminarimagen').modal('show');
    $('#ideliminar').val(id);
    $('#public_id').val(publicid);
  }





</script>
