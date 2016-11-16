<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald%7CLato:400italic,400,700">
<link rel="stylesheet" href="admin/assets/libs/vendors/galeria/style.css">
    <div class="page text-center">
      <main class="page-content">
        <!-- Masonry gallery-->
        <section class="section-98 section-sm-110">
          <div class="shell">
            <div class="isotope-wrap">
              <div class="row">
                <!-- Isotope Filters-->
                <div class="col-lg-12">
                  <div class="isotope-filters isotope-filters-horizontal">
                    <ul class="list-inline list-inline-sm">
                      <li class="veil-md">
                        <p>Escoge tu categoria:</p>
                      </li>
                      <li class="section-relative">
                        <button data-custom-toggle="isotope-1" data-custom-toggle-disable-on-blur="true" class="isotope-filters-toggle btn btn-sm btn-default">Filtro<span class="caret"></span></button>
                        <ul id="isotope-1" class="list-sm-inline isotope-filters-list">
                          	<li><a data-isotope-filter="*" data-isotope-group="gallery" href="#" class="active">Todo</a></li>
						  	<?Php
                          	//Leer carpetas para generar listado
							$directorio = 'admin/assets/images/galeria/';
							$gestor_dir = opendir($directorio);
							$datImages= array();
							$couImg= 0;
							while (false !== ($nombre_fichero = readdir($gestor_dir))) {
								if (!in_array($nombre_fichero,array(".",".."))) 
      							{
									echo '<li><a data-isotope-filter="'.strtolower($nombre_fichero).'" data-isotope-group="gallery" href="#">'.$nombre_fichero.'</a></li>';
									$rutaImages= $directorio.$nombre_fichero."/";
									$gestor_dir2 = opendir($rutaImages);
									while (false !== ($laImagen = readdir($gestor_dir2))) {
										if (!in_array($laImagen,array(".",".."))) 
										{
											$datImages[]= $nombre_fichero."|".$rutaImages.$laImagen;
										}
									}
								}
								$couImg++;
							}
							shuffle($datImages);
						  	?>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- Isotope Content-->
                <div class="col-lg-12 offset-top-34">
                  <div data-isotope-layout="masonry" data-isotope-group="gallery" class="isotope">
                    <div data-photo-swipe-gallery="gallery" class="row">
                      <?Php foreach($datImages as $datImage){ 
					  list($categoria, $laImg)= explode("|",$datImage);
					  $dimensiones= getimagesize($laImg);
					  $tamaño= $dimensiones[0]."x".$dimensiones[1];
					  ?>
                      <div data-filter="<?Php echo strtolower($categoria); ?>" class="col-xs-12 col-sm-6 col-md-4 isotope-item"><a class="thumbnail-custom" data-photo-swipe-item="" data-size="<?Php echo $tamaño; ?>" href="<?Php echo $laImg; ?>">
                          <figure><img src="<?Php echo $laImg; ?>" alt=""/>
                            <figcaption class="thumbnail-custom-caption text-center">
                              <h6 class="thumbnail-custom-title text-white"><?Php echo strtoupper($categoria); ?></h6>
                              <hr class="divider divider-xs bg-java"/>
                            </figcaption>
                          </figure></a>
                      </div>
                      <?Php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      <!-- Page Footer-->
    </div>
    <!-- Global Mailform Output-->
    <div id="form-output-global" class="snackbars"></div>
    <!-- PhotoSwipe Gallery-->
    <div tabindex="-1" role="dialog" aria-hidden="true" class="pswp">
      <div class="pswp__bg"></div>
      <div class="pswp__scroll-wrap">
        <div class="pswp__container">
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
          <div class="pswp__top-bar">
            <div class="pswp__counter"></div>
            <button title="Close (Esc)" class="pswp__button pswp__button--close"></button>
            <button title="Share" class="pswp__button pswp__button--share"></button>
            <button title="Toggle fullscreen" class="pswp__button pswp__button--fs"></button>
            <button title="Zoom in/out" class="pswp__button pswp__button--zoom"></button>
            <div class="pswp__preloader">
              <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                  <div class="pswp__preloader__donut"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
            <div class="pswp__share-tooltip"></div>
          </div>
          <button title="Previous (arrow left)" class="pswp__button pswp__button--arrow--left"></button>
          <button title="Next (arrow right)" class="pswp__button pswp__button--arrow--right"></button>
          <div class="pswp__caption">
            <div class="pswp__caption__center"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Java script-->
    <script src="admin/assets/libs/vendors/galeria/core.min.js"></script>
    <script src="admin/assets/libs/vendors/galeria/script.js"></script>