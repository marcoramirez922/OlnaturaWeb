<style>
#tblMenusInt a:link, #tblMenusInt a:visited, #tblMenusInt a:hover, #tblMenusInt a:active{
	color:#FFF;
	text-decoration:none;
	font-size:22px;
}
</style>
    <?Php
	//Despliega modulos
    echo $Concentrador;
	
	//Ver contenidos de lo smenus
	if(isset($contenidoHtml[0]->descripcion)){
		if($contenidoHtml[0]->imagen != ''){
			if($contenidoHtml[0]->plantilla != 0){
			?>
				<div align="center"><p>&nbsp;</p><img src="<?Php echo base_url(); ?>admin/assets/images/menus/<?Php echo $contenidoHtml[0]->imagen; ?>" /><p>&nbsp;</p></div>
			<?Php
			}
			else{
			?>
				<img src="<?Php echo base_url(); ?>admin/assets/images/menus/<?Php echo $contenidoHtml[0]->imagen; ?>" width="100%" />
            <?Php	
			}
		}
		echo $contenidoHtml[0]->descripcion;
	}
	?>
    <!-- /container -->
	<script type="text/javascript">
        $( document ).ready(function( $ ) {
			<?Php 
			if(in_array(1,$loadLibrary)){ ?>
			var slideFull = $("<?Php echo $arrjQuery; ?>").slippry({
				pager: false,
				// transition: 'fade',
				//useCSS: true,
				speed: 3000,
				pause: 7000
				// auto: true,
				// preload: 'visible',
				// autoHover: false
			});
			<?Php } ?>
			
			<?Php 
			if(in_array(2,$loadLibrary)){ 
			#print_r($arrSlideShort); echo "<---"; exit;
			?>
			var slideShort = $("<?Php echo implode(" , ",$arrSlideShort); ?>").slippry({
				pager: false,
				transition: 'horizontal',
				//useCSS: true,
				speed: 2500,
				pause: 6500
				// auto: true,
				// preload: 'visible',
				// autoHover: false
			});
			<?Php } ?>
        });
    </script>
