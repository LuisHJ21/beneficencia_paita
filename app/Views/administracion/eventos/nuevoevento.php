<?php $session=session(); ?>
<div class="container pt-5 pb-3" >

    <div class="titulo">
        <h1 class="text-center">Nuevo Evento</h1>
    </div>

    <?php if($session->success){ ?>
    <div class="alert alert-success" role="alert">
      <i class="fas fa-check"></i> Nuevo Evento Registrado Correctamente.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php } ?>

    <?php if($session->error){ ?>
    <div class="alert alert-danger" role="alert">
       <i class="fas fa-times"></i> Ha ocurrido un error en el Registro.
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php } ?>

    <div class="contenido">
        <form id="registrarEvento" enctype="multipart/form-data" action="<?php echo base_url() ?>/admin/eventos/agregar/registrar" method="post">
          <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input type="text" class="form-control" name="titulo" id="titulo" minlength="3" maxLength="100" required >
          </div>

          <div class="form-group">
            <label for="imagen">Imagen Principal:</label>
            <input type="file" class="form-control-file" name="imagensubir" id="imagensubir"> 
           
          </div>

          <div class="form-group">
            <label for="lugar">Lugar:</label>
            <input type="text" class="form-control" name="lugar" id="lugar" minlength="3" maxLength="200" required>
          </div>

        

          <div class="form-group">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <label for="fecha">Fecha:</label>
                <input  type="date" class="form-control" min="<?php 
                $fechaActual = date('Y-m-d');
                echo $fechaActual;
                ?>" name="fecha" id="fecha" value="<?php echo $fechaActual ?>" onkeydown="return false" required>
               
              </div>

              <div class="col-sm-12 col-md-6">
              <?php 
                $fechaActual = date('H:i');
               
                ?>
                <label for="fecha">Hora:</label>
                <input  type="time" class="form-control" name="hora" id="hora"  onkeydown="return false" required>
               
              </div>
            </div>
           
          </div>

          <div class="form-group">
            <label for="detalle">Detalles:</label>
            <textarea class="summernote" name="detalle" id="detalle" required maxlength=5000></textarea>  
          </div>

          <div class="row justify-content-end">
              <div class="col-md-4">
              <button id="registrar"  type="submit"  class="btn btn-success btn-block"><i class="fas fa-save"></i> Guardar</button>

              </div>
          </div>
        </form>
    
    </div>
</div>


<script>


  $('.summernote').summernote({
        placeholder: '....',
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']]
        ],
        tabsize: 2,
        height: 200,
        maxHeight: 200,
        lang: 'es-ES'
      });




</script>