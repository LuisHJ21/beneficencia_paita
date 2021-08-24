<section class="section-30 section-md-40 section-lg-66 section-xl-bottom-90 bg-gray-dark page-title-wrap" style="background-image: url(images/bg-image-1.jpg);">
        <div class="container">
          <div class="page-title">
            <h2>Contacto</h2>
          </div>
        </div>
</section>

<section class="section-60 section-lg-100">
    <div class="container">
    
       <div class="card informacion-contacto">
           <div class="row">
               <div class="col-12 col-md-6">
                <div class="informacion px-4 py-5 h-100 w-100">
                    <h4 class="text-center">Informacion de Contacto</h4>

                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8 px-5 px-md-0">
                            <div class="info text-left">
                                <ul>
                                    <li> <i class="fas fa-map-marker-alt p-3 rounded-circle mr-1"></i> Direccion:</li>
                                    <p class="pl-5 ml-3"><?php echo $nosotros['direccion'] ?></p>
                                    <li> <i class="fas fa-envelope p-3 rounded-circle mr-1"></i> Correo:</li>
                                    <p class="pl-5 ml-3"><?php echo $nosotros['correo'] ?></p>
                                    <li> <i class="fas fa-phone p-3 rounded-circle mr-1"></i> Numero:</li>
                                    <p class="pl-5 ml-3"><?php echo $nosotros['telefono'] ?></p>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
               </div>
               <div class="col-12 col-md-6">
                <div class="formulario px-4 py-5">
                    <h4 class="text-center">Envianos un Mensaje</h4>
                    <form action="" name="form-mensaje" id="form-mensaje">
                       <div class="form-group">
                           <label for="nombre">Nombre:(*)</label>
                           <input type="text" class="form-control form-control-lg" required>
                       </div>

                       <div class="form-group">
                           <label for="correo">Correo:(*)</label>
                           <input type="email" class="form-control form-control-lg" required>
                       </div>

                       <div class="form-group">
                           <label for="asunto">Asunto:</label>
                           <input type="text" class="form-control form-control-lg" required>
                       </div>

                       <div class="form-group">
                           <label for="mensaje">Mensaje:(*)</label>
                           <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                       </div>
                       <span>(*) Campos Obligatorios</span>
                    </form>
                    <button type="submit" form="form-mensaje" class="btn btn-block btn-primary mt-3"><i class="fas fa-envelope pr-3"></i> Enviar Mensaje</button>
                </div>
                   
               </div>
           </div>
       </div>
    
    </div>
</section>
