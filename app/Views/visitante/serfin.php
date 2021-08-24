<section class="section-30 section-md-40 section-lg-66 section-xl-bottom-90 bg-gray-dark page-title-wrap" style="background-image: url(<?php echo base_url() ?>/images/ataud.jpg);">
        <div class="container">
          <div class="page-title">
            <h2>SERFIN</h2>
          </div>
        </div>
</section>


<section class="section-66 section-md-90 section-xl-bottom-120">


  <div class="container serfin">

    <div class="card">
      <div class="row">
        <div class="col-12 col-md-6">

          <?php if(!$servicio['imagen']){ ?>
            <img src="https://plantillasdememes.com/img/plantillas/imagen-no-disponible01601774755.jpg" alt="" class="img-fluid h-100">
            <?php } ?>

            <img src="<?php echo $servicio['imagen'] ?>" alt="" class="img-fluid h-100">
        </div>

        <div class="col-12 col-md-6">

          <div class="row">
            <div class="col-12 py-5">
              <h4 class="text-center text-capitalize color-principal">servicio funerario integral</h4>
              <hr class="hr-color">
            </div>
            
            <div class="col-12 detalle-serfin">

                <div class="brindar pb-5">
                  <h5 class=" color-principal">Servicios a brindar</h5>
                  
                  <div class="servicio-contenido">
                      <?php echo $serfin['brinda'] ?>
                  </div>
                </div>
                <hr class="hr-color">

                <div class="brindar pb-5">
                  <h5 class=" color-principal">Mensualidad</h5>
                  
                  <div class="servicio-contenido">
                    <?php echo $serfin['mensualidad'] ?>
                  </div>
                </div>

                <hr class="hr-color">

                <div class="requisitos mb-5">
                  <h5 class=" font-weight-bold color-principal">Requisitos:</h5>
                  <div class="servicio-contenido">
                    <?php echo $serfin['requisitos'] ?>

                  </div>
                </div>

            </div>
          </div>

        </div>



      </div>

      <!-- <div class="px-5 card-footer">

      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-md-6">
          <p class=" text-dark font-weight-bold">Requisitos:</p>
            <div class="servicio-contenido">
              <ul>
                <li>Copias de DNI del titular y Beneficiarios</li>
                <li>Inscripcion de S/25.00</li>
              </ul>
            </div>
          </div>

          <div class="col-md-6">
            <div class="servicio">
              <h5 class="text-center"></h5>
              <div class="servicio-contenido mt-0 py-4">
                <ul>
                  <li class="text-dark font-weight-bold" style="font-size:18px;">Seguros para 5 Personas</li>
                  
                </ul>
              </div>
            </div>
          </div>




        </div>
      </div> -->
       
         
      
      </div>


    </div>

  </div>

    


</section>