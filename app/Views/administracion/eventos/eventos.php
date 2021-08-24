<?php $session=session(); ?>
        <div class="row mb-2">
          <div class="col-sm-6 pt-4 pb-4">
            <h1>Listado de Eventos</h1>
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content ">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           

            <div class="card">
              <div class="card-header">
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
                  <i class="fas fa-times"></i> <?php echo $session->error; ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?php } ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped text-center ">
                  <thead>
                  <tr>
                    <th>Imagen</th>
                    <th>Titulo</th>
                    <th>Fecha</th>
                    <th>Lugar</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($eventos as $eve): ?>
                  <tr>
                    <td><img style="width:100px" src="<?php echo $eve['imagen'] ?>" alt=""></td>
                    <td><?php echo $eve['nombre'] ?></td>
                    <td><?php 
                     $fecha=$eve['fecha'];
                     $nuevafecha=date('d-m-Y',strtotime($fecha));
                    echo $nuevafecha ?></td>
                    <td><?php echo $eve['lugar'] ?></td>
                    <td><i  class="fas fa-edit text-success"></i></td>
                    <td style="cursor: pointer;"
                    <?php 
                        echo "onclick='mdleliminar(\"".$eve['id_evento']."\")'";
                    ?>><i  class="fas fa-trash text-danger"></i></td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Imagen</th>
                    <th>Titulo</th>
                    <th>Fecha</th>
                    <th>Lugar</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


<div class="modal fade" id="eliminarEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Eliminar Evento</h5>
              </div>
              <div class="modal-body">¿Estas seguro de Eliminar este Evento? 
                <form id="eliminarevento" action="<?php echo base_url() ?>/admin/eventos/eliminar" method="post">
                  <input hidden id="ideliminar" name="ideliminar" type="text">
                </form>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                  <button form="eliminarevento" type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</button>
              </div>
          </div>
      </div>
</div>





<script>

function mdleliminar(id)
{
  $('#eliminarEvento').modal('show');
  $('#ideliminar').val(id);

}


</script>






     