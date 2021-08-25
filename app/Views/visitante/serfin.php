<section class="section-30 section-md-40 section-lg-66 section-xl-bottom-90 bg-gray-dark page-title-wrap" style="background-image: url(<?php echo base_url() ?>/images/ataud.jpg);">
        <div class="container">
          <div class="page-title">
            <h2>SERFIN</h2>
          </div>
        </div>
</section>


<section class="section-60 section-lg-100">


  <div class="container ">

    <div class="serfin card">
      <div class="row">

        <div class="col-12 col-md-6">

         

            <img src="<?php if(!$servicio['imagen']){echo base_url('/images/no-imagen.jpg');}else{echo $servicio['imagen'];} ?>" alt="" class="img-fluid h-100">
        </div>

        <div class="col-12 col-md-6">
            <div class="py-5">
              <h4 class="text-center text-capitalize color-principal">servicio funerario integral</h4>
              <hr class="hr-color">
            </div>
            
            <div class="detalle-serfin">

                <div class="brindar pb-5">
                  <h5 class=" color-principal">Servicios a brindar</h5>
                  
                  <div class="servicio-contenido">
                      <?php echo $serfin['brinda'] ?>
                  </div>
                </div>

                <hr class="hr-color">

                <div class=" pb-5">
                  <h5 class=" color-principal">Mensualidad</h5>
                  
                  <div class="servicio-contenido">
                    <?php echo $serfin['mensualidad'] ?>
                  </div>
                </div>

                <hr class="hr-color">

                <div class=" mb-5">
                  <h5 class=" font-weight-bold color-principal">Requisitos:</h5>
                  <div class="servicio-contenido">
                    <?php echo $serfin['requisitos'] ?>

                  </div>
                </div>

            </div> 

        </div>

      </div>


    </div>


  </div>

 
    


</section>