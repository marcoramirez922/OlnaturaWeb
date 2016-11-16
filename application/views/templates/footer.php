<style>
html, body{
	margin:0px;
	padding:0px;
}
	#footer{
		background:rgba(58,63,61,1);
		border-top:2px solid rgba(0,0,0,0.7);
		padding:0px 0px 0px 7%;
		color:rgba(255,255,255,1);
		margin-bottom:15px;
		margin-top:40px;
		font-size:14px;
	}
	#footer h2{
		text-transform:uppercase;
		font-size:18px;
		padding-top:35px;
		padding-bottom:10px;
	}
	#footer h3{
		text-transform:uppercase;
		font-size:16px;
	}
	#copyright{
		margin:78px 0px 20px;
		padding-left:0px;
	}
	.span{
		margin:15px;
		display:block;
	}
	.ulFooter{
		list-style-image:url(<?Php echo base_url(); ?>assets/img/FLECHA-02.png);
		list-style:none;
		margin-left:-20px;
	}
	.ulFooter li{
		list-style-image:url(<?Php echo base_url(); ?>assets/img/FLECHA-02.png);
		text-transform:uppercase;
		border-bottom:2px solid #999;
		padding-left:17px;
		padding-bottom:5px;
		margin-bottom:5px;
		width:60%;
	}
	.ulFooter li:last-child{
		border:none;
	}
	.ulFooter li a:link, .ulFooter li a:active, .ulFooter li a:visited{
		color:#FFF;
	}
	#footer h2, #footer h3{
		font-weight:bold;
	}
	.direccion{
		background:url(<?Php echo base_url(); ?>assets/img/ubicacion.png) no-repeat top left;
		padding-left:18px;
		margin:0px;
	}
	.telefono{
		background:url(<?Php echo base_url(); ?>assets/img/telefono.png) no-repeat top left;
		padding-left:18px;
		margin:0px;
	}
	.email{
		background:url(<?Php echo base_url(); ?>assets/img/email.png) no-repeat top left;
		padding-left:18px;
		margin:0px;
	}
	.plantas p{
		padding:0px;
		margin:0px;
	}
</style>
<div id="footer" class="container theme-showcase" role="main">
	<div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12 brdDR">
            <h2>Categorías</h2>
            <ul class="ulFooter">
            	<?php foreach($catFooter as $listCategoria){ ?>
            	<li><a href="<?Php echo base_url().$listCategoria->link; ?>"><?Php echo $listCategoria->menu; ?></a></li>
                <?Php } ?>
                <li><a href="<?Php echo base_url(); ?>galeria">GALERIA DE IMÁGENES</li>
            </ul>
        </div>
        
        <div class="col-md-3 col-sm-3 col-xs-12">
            <h2>&nbsp;</h2>
            <ul class="ulFooter">
            	<li><a href="<?Php echo base_url(); ?>inicio/content/farmacovigilancia.html" target="_self">FARMACOVIGILANCIA</A></li>
            	<li><a href="<?Php echo base_url(); ?>inicio/content/aviso_de_privacidad.html" target="_self">Aviso de privacidad</a></li>
                <li><a href="<?Php echo base_url(); ?>inicio/content/terminos_y_condiciones_de_uso.html" target="_self">Términos y Condiciones de uso</a></li>
            	<li><a href="<?Php echo base_url(); ?>inicio/content/politicas_de_devolucion.html" target="_self">POLÍTICAS DE DEVOLUCIÓN</a></li>
            	<li><a href="<?Php echo base_url(); ?>inicio/content/politicas_de_cancelacion.html" target="_self">POLÍTICAS DE CANCELACIÓN</a></li>
            </ul>
        </div>
        
        <div class="col-md-3 col-sm-3 col-xs-12" class="plantas">
            <h2>Contáctanos</h2>
            
            <h3>Corporativo</h3>
            <p class="direccion">
            	Calle 40 Sur y 9 Este, CIVAC, Jiutepec,<br />
				Morelos, México. C.P. 62500.
            </p>
            <p class="telefono">
            	+52 (777) 320 2342 y (777) 319 6181
            </p>
            <p class="email">
            	enrique.cuellar@olnatura.com
            </p>
            <br />
            <h3>Desarrollo</h3>
            <p class="direccion">
            	Calle 9 Este Lote 19, CIVAC, Jiutepec,<br />
				Morelos, México. C.P. 62500.
            </p>
            <p class="telefono">
            	+52 (777) 172 3036 y (777) 320 1993
            </p>
            <p class="email">
            	vparra@olnatura.com
            </p>
        </div>
        
        <div class="col-md-3 col-sm-3 col-xs-12">
            <h2>Síguenos</h2>
            <span class="btnRedes"><a href="https://www.linkedin.com/company/olnatura?trk=ppro_cprof" target="_blank"><img src="<?Php echo base_url(); ?>assets/img/in-02.png" height="35" /></a></span>&nbsp; &nbsp; &nbsp;
            <!--<span class="btnRedes"><img src="<?Php echo base_url(); ?>assets/img/YouTube-02.png" height="35" /></span>&nbsp; &nbsp; &nbsp; -->
            
            <span class="btnRedes"><a href="https://www.facebook.com/Olnatura.Laboratorios/" target="_blank"><img src="<?Php echo base_url(); ?>assets/img/Facebook-02.png" height="35" /></a></span>&nbsp; &nbsp; &nbsp;
            <p>&nbsp;</p>
            <span class="btnRedes"><a href="https://twitter.com/OlnaturaSAdeCV" target="_blank"><img src="<?Php echo base_url(); ?>assets/img/Twitter-02.png" height="35" /></a></span>&nbsp; &nbsp; &nbsp;
            <span class="btnRedes"><a href="https://www.instagram.com/olnatura/" target="_blank"><img src="<?Php echo base_url(); ?>assets/img/Instagram-02.png" height="35" /></a></span>
            <p>&nbsp;</p>
            <div id="copyright" class="col-md-7 col-sm-3 col-xs-3">
                &copy; Laboratorios Olnatura 2016.<br />Todos los derechos reservados.
            </div>
        </div>
        
	</div>
</div>
<!-- Google Analytics -> Inicia -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-79245357-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- Google Analytics -> Termina -->
  </body>
</html>
