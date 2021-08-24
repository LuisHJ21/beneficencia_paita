

      <!-- seccion de slide -->
      <section>
        <div class="swiper-container swiper-slider swiper-variant-1 bg-black" data-loop="false" data-autoplay="5500" data-simulate-touch="true">
          <div class="swiper-wrapper text-center">

          <?php foreach($slides as $slide): ?>

            <div class="swiper-slide" data-slide-bg="<?php echo $slide['imagen'] ?>">
              <div class="swiper-slide-caption text-center">
                <div class="container">
                  <div class="row justify-content-md-center">
                    <div class="col-md-11 col-lg-10 col-xl-9">
                      <!-- <div class="header-decorated" data-caption-animate="fadeInUp" data-caption-delay="0s">
                        <h3 class="medium text-primary">With Us</h3>
                      </div> -->
                      <!-- <h2 class="slider-header" data-caption-animate="fadeInUp" data-caption-delay="150">You Are Always One Step Ahead</h2>
                      <p class="text-bigger slider-text" data-caption-animate="fadeInUp" data-caption-delay="250">Strategies of our attorneys will help you solve very complex legal issues.</p>
                      <div class="button-block" data-caption-animate="fadeInUp" data-caption-delay="400"><a class="button button-lg button-primary-outline-v2" href="#">Request a Free Consultation</a></div>
                     -->
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php endforeach; ?>

            
          
          </div>
          <div class="swiper-scrollbar d-lg-none"></div>
          <div class="swiper-nav-wrap">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
        </div>
      </section>

    

     
      <!-- seccion de noticias -->
      <section class="section-50 section-md-75 section-xl-100 noticias-section">
        <div class="container">
          <h3 class="text-center titulo-principal">Ultimas Noticias</h3>
          <div class="row row-40 row-offset-1 justify-content-sm-end">

          <?php $i=0; foreach($noticias as $noti):?>
            <div class="col-sm-6 col-md-3  ">
              <article class="post-boxed" style="background-color:<?php if($i%2==0){echo '#D64045';}else{echo '#5DA271';} ?>">
                <div class="post-boxed-image"><img style="height:150px" src="<?php echo $noti['imagen'] ?>" alt="" width="268" />
                </div>
                <div class="post-boxed-body">
                <div class="post-boxed-header">
                    <ul class="post-boxed-meta">
                      <li>
                        <time datetime="2019-06-20" style="color:#fff;"><?php $fecha=$noti['creado']; $con=date('M d, Y',strtotime($fecha)); echo $con; ?></time>
                      </li>
                    </ul>
                  </div>
                  <div class="post-boxed-title"><a href="#" style="color:#fff;font-size: 14px;"><?php echo $noti['titulo'] ?></a></div>
                  <div class="post-boxed-footer">
                      <div class="contenido-noticia">
                      <?php echo $noti['contenido'] ?>
                        
                      </div>
                      <div class="mt-3">
                      <div class="row justify-content-center">
                          <div class="sm-12 col-md-6"> 
                             <a style="cursor:pointer" href="<?php echo base_url() ?>/noticias/detallenoticia/<?php echo $noti['id_noticia'] ?>" class="btn btn-block btn-outline-danger">Leer mas <i class="fas fa-chevron-right
                          "></i> </a>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </article>
            </div>
            <?php if(++$i==12) break; ?>
            <?php endforeach; ?>

          </div>
        </div>
      </section>



       <!-- seccion de eventos -->
       <section class="section-50 section-md-75 section-xl-100">
        <div class="container">
          <h3  class="text-center titulo-principal">Proximos eventos</h3>
          <div class="row row-40 row-offset-1 justify-content-sm-center">
          <?php $i=0; foreach($eventos as $eve): ?>
             
              <?php $fecha=$eve['fecha']; ?>
              <?php $hora=$eve['hora']; ?>
            <div class="col-sm-9 col-md-6 col-lg-4 col-xl-4">
              <div class="event-item" <?php echo "onclick='mdldetalles(\"".$con=date('d-m-Y',strtotime($fecha))."\",\"".$con=date('h:i A',strtotime($hora))."\",\"".$eve['lugar']."\")'" ;?> style="cursor: pointer">
                <div class="event-image">
                  <img style="height:196px" src="<?php echo $eve['imagen'] ?>" alt="">
                </div>
                <div class="event-info" >
                  <div class="date">
                    <span>
                      <span class="day"><?php $con=date('d',strtotime($fecha)); echo $con; ?></span>
                      <span class="month"><?php $con=date('M',strtotime($fecha)); echo $con; ?></span>
                    </span>
                  </div>
                  <div class="event-content ">
                    <h6><a href="#"><?php echo $eve['nombre'] ?></a></h6>
                    <ul class="event-meta">
                      <li><i class="icons icon-clock"></i> <?php $con=date('h:i A',strtotime($hora)); echo $con ; ?></li>
                      <li><i class="icons icon-location"></i> <?php echo $eve['lugar'] ?></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <?php if(++$i==3) break; ?>
            <?php endforeach; ?>
           
          
          </div>
        </div>
      </section>



      <!-- seccion delPersonal -->

      <section class="section-60 section-lg-100">
        <div class="container">
       
          <div class="row row-40 align-items-sm-end">

          <?php $i=0; foreach($directorio as $dir): ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="thumbnail-variant-2-wrap">
                <div class="thumbnail thumbnail-variant-2">
                  <figure class="thumbnail-image"><img src="<?php echo $dir['imagen'] ?>" alt="" style="width: 100%;!important" width="246" height="300"/>
                  </figure>
                  <!-- <div class="thumbnail-inner">
                    
                  </div> -->
                  <div class="thumbnail-caption">
                    <p class="text-header"><a href="#"><?php $nombrecompleto=$dir['nombres'].' '.$dir['apellidos']; $conv=strtoupper($nombrecompleto); echo $conv; ?></a></p>
                    <div class="divider divider-md bg-teak"></div>
                    <p class="text-caption"><?php $cargo=strtoupper($dir['cargo'] ); echo $cargo; ?></p>
                  </div>
                </div>
              </div>
            </div>
            <?php if(++$i==3) break; ?>
            <?php endforeach; ?>
            
            <div class="col-sm-6 col-md-12 col-lg-3 text-center">
              <div class="block-wrap-1">
                <div class="block-number"><i class="fas fa-user-tie"></i></div>
                <h3 class="text-normal titulo-principal">Miembros</h3>
                <p class="h5 h5-smaller text-style-4 titulo-principal">del directorio</p>
                <p>Vestibulum pretium porta neque at faucibus. Suspendisse blandit tincidunt tortor. </p><a class="link link-group link-group-animated link-bold link-secondary" href="<?php echo base_url() ?>/directorio"><span>Ver más.</span><span class="novi-icon icon icon-xxs icon-primary fa fa-angle-right"></span></a>
              </div>
            </div>

          </div>
        </div>
      </section>


     

    

      

    
