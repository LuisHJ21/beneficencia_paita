<section class="section-30 section-md-40 section-lg-66 section-xl-bottom-90 bg-gray-dark page-title-wrap" style="background-image: url(images/bg-image-1.jpg);">
        <div class="container">
          <div class="page-title">
            <h2>Historia</h2>
          </div>
        </div>
</section>

      <section class="section-66 section-md-90 section-xl-bottom-120">
        <div class="container">
          <div class="row">
          <div class="col-md-8">
          <h3>Nuestra Historia</h3>

          <div class="historia" style="text-align:justify;">
          <?php echo $nosotros['historia'] ?>
          </div>

          </div>
          <div class="col-md-4" style="margin-top:8rem !important;">
          <?php if($nosotros['imagen_historia']==null){ ?>
                    <img style="height:450px;" src="https://plantillasdememes.com/img/plantillas/imagen-no-disponible01601774755.jpg" alt="">
                <?php } else { ?>
            <img style="height:450px;" src="<?php echo $nosotros['imagen_historia'] ?>" alt="">
            <?php } ?>
          </div>
        </div>
          </div>
      </section>
