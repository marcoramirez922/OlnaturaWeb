<style>
	#footer{
		background:rgba(58,63,61,1);
		border-top:2px solid rgba(0,0,0,0.7);
		padding:0px 20px;
		color:rgba(255,255,255,1);
	}
	#footer h2{
		text-transform:uppercase;
		font-size:20px;
		padding-top:35px;
		padding-bottom:10px;
	}
	#footer h3{
		text-transform:uppercase;
		font-size:16px;
	}
	#copyright{
		margin:35px 0px 20px;
	}
	.span{
		margin:15px;
		display:block;
	}
	.ulFooter{
		list-style-image:url(<?Php echo base_url(); ?>assets/img/FLECHA-02.png);
		list-style:none;
		
	}
	.ulFooter li{
		list-style-image:url(<?Php echo base_url(); ?>assets/img/FLECHA-02.png);
		text-transform:uppercase;
		border-bottom:2px solid #999;
		padding-left:17px;
		padding-bottom:5px;
		margin-bottom:5px;
		width:90%;
	}
	.ulFooter li:last-child{
		border:none;
	}
</style>
<div id="footer" class="container theme-showcase" role="main">
	<div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12 brdDR">
            <h2>Categorías</h2>
            <ul class="ulFooter">
            	<?php #foreach($listCategorias as $listCategoria){ ?>
            	<li>Inicio</li>
                <li>Nosotros</li>
                <li>Negocios</li>
                <li>Productos</li>
                <li>Contacto</li>
                <?Php #} ?>
            </ul>
        </div>
        
        <div class="col-md-3 col-sm-3 col-xs-12">
            <h2>&nbsp;</h2>
            <ul class="ulFooter">
            	<li>Aviso de privacidad</li>
                <li>Terminos de uso</li>
            </ul>
        </div>
        
        <div class="col-md-3 col-sm-3 col-xs-12">
            <h2>Contáctanos</h2>
            
            <h3>Corporativo</h3>
            <p id="direccion">
            	Calle 40 Sur y 9 Este, CIVAC, Jiutepec,<br />
				Morelos, México. C.P. 62500.
            </p>
            <p id="telefono">
            	+52 (777) 320 2342 y (777) 319 6181
            </p>
            <p id="email">
            	contact@olnatura.com
            </p>
            <br />
            <h3>Desarrollo</h3>
            <p id="direccion">
            	Calle 9 Este Lote 19, CIVAC, Jiutepec,<br />
				Morelos, México. C.P. 62500.
            </p>
            <p id="telefono">
            	+52 (777) 172 3036 y (777) 320 1993
            </p>
            <p id="email">
            	contact@olnatura.com
            </p>
        </div>
        
        <div class="col-md-3 col-sm-3 col-xs-12">
            <h2>Síguenos</h2>
            <span class="btnRedes"><img src="<?Php echo base_url(); ?>assets/img/in-02.png" height="35" /></span>&nbsp; &nbsp; &nbsp;
            <span class="btnRedes"><img src="<?Php echo base_url(); ?>assets/img/YouTube-02.png" height="35" /></span>&nbsp; &nbsp; &nbsp;
            <span class="btnRedes"><img src="<?Php echo base_url(); ?>assets/img/Facebook-02.png" height="35" /></span>&nbsp; &nbsp; &nbsp;
            <p>&nbsp;</p>
            <span class="btnRedes"><img src="<?Php echo base_url(); ?>assets/img/Twitter-02.png" height="35" /></span>&nbsp; &nbsp; &nbsp;
            <span class="btnRedes"><img src="<?Php echo base_url(); ?>assets/img/Instagram-02.png" height="35" /></span>
        </div>
        
	</div>
    <div class="row">
    	<div id="copyright" class="col-md-12 col-sm-12 col-xs-12" align="right">
        	&copy; Laboratorios <img src="<?Php echo base_url(); ?>admin/assets/images/favicon.png" align="bottom" height="22" />lnatura 2016.<br />Todos los derechos reservados.
        </div>
    </div>
</div>
  </body>
</html>
