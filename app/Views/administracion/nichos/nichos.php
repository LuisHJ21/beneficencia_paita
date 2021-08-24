<?php $session=session();?>
        <div class="row mb-2">
          <div class="col-12 pt-4 pb-4">
            <h1 class="">Nichos</h1>
          </div>
          <div class="col">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content ">
      <div class="container-fluid">
        <div class="row">

        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Nichos en Vida</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                            <th scope="col">Nivel</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Editar Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($nichosv as $n): ?>
                            <tr>
                            <th scope="row"><?php echo $n['nivel'] ?></th>
                            <td><?php echo $n['precio'] ?></td>
                            <td style="cursor:pointer;"

                            
                            <?php 
                                $tipo='v';
                                echo "onClick='mdlEditarprecio(\"".$tipo."\",\"".$n['id']."\",\"".$n['precio']."\")'";
                            
                            ?>
                            
                            
                            
                            ><i class="fas fa-pencil-alt text-success"></i> </td>
                            </tr>
                            <?php endforeach; ?>  
                        </tbody>
                    </table>
                </div>

                <div class="card-footer container">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-4">
                            <button class="btn btn-block btn-success"

                            <?php 
                                $tipo='v';
                                echo "onClick='mdlAgregar(\"".$tipo."\")'";
                            
                            ?>
                            
                            
                            ><i class="fas fa-plus"></i> </button>
                        </div>
                        <?php if($session->success && $session->tipo=='v'){ ?>
                        <div class="col-12 col-md-8">
                            <div class="alert alert-success mb-0" role="alert" >
                                <i class="fas fa-check mr-1"></i> <?php echo $session->success; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <?php } ?>

                        <?php if($session->error && $session->tipo=='v'){ ?>
                        <div class="col-12 col-md-8">
                            <div class="alert alert-danger mb-0" role="alert" >
                                <i class="fas fa-check mr-1"></i> <?php echo $session->error; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                </div>
                

            </div>
        </div>
        
        <div class="col-12 col-md-6 ">
            <div class="card">
               <div class="card-header">
                   <h4 class="text-center">Imagen</h4>
               </div>
               <div class="card-body">
                    <img  class="img-fluid" src="https://plantillasdememes.com/img/plantillas/imagen-no-disponible01601774755.jpg" alt="">
               </div>
               <div class="card-footer container">
                   <div class="row">
                       <div class="col-12">
                           <button class="btn btn-block btn-success"><i class="fas fa-upload mr-1"></i>Subir Imagen</button>
                        </div>
                   </div>

               </div>
            </div>
        </div>



        <div class="col-12 col-md-6 ">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Nichos Parvulos</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                            <th scope="col">Nivel</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Editar Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($nichosp as $n): ?>
                            <tr>
                            <th scope="row"><?php echo $n['nivel'] ?></th>
                            <td><?php echo $n['precio'] ?></td>
                            <td style="cursor:pointer;"

                            
                            <?php 
                                $tipo='p';
                                echo "onClick='mdlEditarprecio(\"".$tipo."\",\"".$n['id']."\",\"".$n['precio']."\")'";

                            ?>><i class="fas fa-pencil-alt text-success"></i> </td>
                            </tr>
                            <?php endforeach; ?>  
                        </tbody>
                    </table>
                </div>

                <div class="card-footer container">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-4">
                        <button class="btn btn-block btn-success"

                        <?php 
                            $tipo='p';
                            echo "onClick='mdlAgregar(\"".$tipo."\")'";

                        ?>


                        ><i class="fas fa-plus"></i> </button>
                        </div>
                        <?php if($session->success && $session->tipo=='p'){ ?>
                        <div class="col-12 col-md-8">
                            <div class="alert alert-success mb-0" role="alert" >
                                <i class="fas fa-check mr-1"></i> <?php echo $session->success; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <?php } ?>

                        <?php if($session->error && $session->tipo=='p'){ ?>
                        <div class="col-12 col-md-8">
                            <div class="alert alert-danger mb-0" role="alert" >
                                <i class="fas fa-check mr-1"></i> <?php echo $session->error; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                

            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Nichos Adultos</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                            <th scope="col">Nivel</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Editar Precio</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach($nichosa as $n): ?>
                            <tr>
                            <th scope="row"><?php echo $n['nivel'] ?></th>
                            <td><?php echo $n['precio'] ?></td>
                            <td style="cursor:pointer;"

                            
                            <?php 
                                $tipo='a';
                                echo "onClick='mdlEditarprecio(\"".$tipo."\",\"".$n['id']."\",\"".$n['precio']."\")'";

                            ?>><i class="fas fa-pencil-alt text-success"></i> </td>
                            </tr>
                            <?php endforeach; ?>  
                        </tbody>
                    </table>
                </div>

                <div class="card-footer container">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-4">
                        <button class="btn btn-block btn-success"

                        <?php 
                            $tipo='a';
                            echo "onClick='mdlAgregar(\"".$tipo."\")'";

                        ?>


                        ><i class="fas fa-plus"></i> </button>
                        </div>
                        <?php if($session->success && $session->tipo=='a'){ ?>
                        <div class="col-12 col-md-8">
                            <div class="alert alert-success mb-0" role="alert" >
                                <i class="fas fa-check mr-1"></i> <?php echo $session->success; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <?php } ?>

                        <?php if($session->error && $session->tipo=='a'){ ?>
                        <div class="col-12 col-md-8">
                            <div class="alert alert-danger mb-0" role="alert" >
                                <i class="fas fa-check mr-1"></i> <?php echo $session->error; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                

            </div>
        </div>

    </div>



<!-- Modal agregar -->
<div class="modal fade" id="agregarNicho" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="agregarnicho" action="<?php echo base_url() ?>/admin/nichos/agregar" method="post" autocomplete="off">

                <input class="form-control" hidden type="text" name="tipo" id="tipo" required maxlength=1>

                <div class="form-group">
                    <label for="nivel">Nivel</label>
                    <input class="form-control" type="text" name="nivel" id="nivel" required maxlength=1 pattern="[1-9]+">
                    <span>*(Ingrese solo el numero del nivel)</span>
                </div>
                
                <div class="form-group">
                    <label for="nivel">Precio</label>
                    <input class="form-control" type="number" step="any" name="precio" id="precio" required min=1 max=9999>
                </div>

            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times mr-1"></i> Cancelar</button>
        <button form="agregarnicho" type="submit" class="btn btn-success"><i class="fas fa-save mr-1"></i> Guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Editar Precio -->
<div class="modal fade" id="precioNicho" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="precionicho" action="<?php echo base_url() ?>/admin/nichos/editarprecio" method="post" autocomplete="off">

                <input class="form-control" hidden type="text" name="tipoeditar" id="tipoeditar" required maxlength=1>
                <input class="form-control" hidden type="text" name="idnicho" id="idnicho" required maxlength=1>
                
                <div class="form-group">
                    <label for="nivel">Precio</label>
                    <input class="form-control" type="number" step="any" name="precioeditar" id="precioeditar" required min=1 max=9999>
                </div>

            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times mr-1"></i> Cancelar</button>
        <button form="precionicho" type="submit" class="btn btn-success"><i class="fas fa-save mr-1"></i> Guardar</button>
      </div>
    </div>
  </div>
</div>



<script>

function mdlAgregar(tipo)
  {
    $('#agregarNicho').modal('show');
    $('#tipo').val(tipo);
   
  }


  function mdlEditarprecio(tipo,id,precio)
  {
    $('#precioNicho').modal('show');
    $('#tipoeditar').val(tipo);
    $('#idnicho').val(id);
    $('#precioeditar').val(precio);

   
  }
</script>