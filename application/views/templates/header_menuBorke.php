<!DOCTYPE html>
<html lang="es-mx"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="<?Php echo $MenusPropiedad[0]->metadescripcion; ?>">
    <meta name="description" content="<?Php echo $MenusPropiedad[0]->metakeywords; ?>">
    <meta name="author" content="Olnatura Mexico">
 
    <title><?Php echo (!isset($titulo) || empty($titulo))? "Bienvenido" : $titulo; ?> .:: Olnatura ::.</title>
 
 	<!-- Favicon -> inicia -->
    <link href="<?Php echo base_url(); ?>admin/assets/images/favicon.ico" rel="icon" />
    <link href="<?Php echo base_url(); ?>admin/assets/images/apple-touch-icon.png" rel="apple-touch-icon" />
    <link href="<?Php echo base_url(); ?>admin/assets/images/apple-touch-icon-76x76.png" rel="apple-touch-icon" sizes="76x76" />
    <link href="<?Php echo base_url(); ?>admin/assets/images/apple-touch-icon-120x120.png" rel="apple-touch-icon" sizes="120x120" />    
    <link href="<?Php echo base_url(); ?>admin/assets/images/apple-touch-icon-152x152.png" rel="apple-touch-icon" sizes="152x152" />
    <link href="<?Php echo base_url(); ?>admin/assets/images/apple-touch-icon-180x180.png" rel="apple-touch-icon" sizes="180x180" />
    <link href="<?Php echo base_url(); ?>admin/assets/images/favicon.png" type="image/png" rel="icon" sizes="192x192"  />
    <!-- Favicon -> termina -->
    
    <!-- Bootstrap -->
    <link href="<?Php echo base_url(); ?>admin/assets/libs/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?Php echo base_url(); ?>admin/assets/libs/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?Php echo base_url(); ?>admin/assets/libs/build/css/custom.min.css" rel="stylesheet">
        
    <!-- jQuery -->
    <script src="<?Php echo base_url(); ?>admin/assets/libs/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?Php echo base_url(); ?>admin/assets/libs/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!--  -----------------------------------------------------------------  -->
       
    <!-- Menu Armado -->
    <link href="<?Php echo base_url(); ?>admin/assets/libs/vendors/menusArm/estilos.css" rel="stylesheet">
    <!--<script  src="<?Php echo base_url(); ?>admin/assets/libs/vendors/menusArm/estilos.css" type="text/javascript">-->
	
 <!-- LoadLibrarys -> Inicia -->
        <?Php 
		#print_r($loadLibrary);
		if(in_array(1,$loadLibrary)){ ?>
        <!-- Sliderpro -->
        <script src="<?Php echo base_url(); ?>admin/assets/libs/vendors/sliderpro/js/slippry.min.js"></script>
        <link rel="stylesheet" href="<?Php echo base_url(); ?>admin/assets/libs/vendors/sliderpro/css/demo.css">
        <link rel="stylesheet" href="<?Php echo base_url(); ?>admin/assets/libs/vendors/sliderpro/css/slippry.css">
    
        <!--<link rel="stylesheet" type="text/css" href="<?Php echo base_url(); ?>admin/assets/libs/vendors/sliderpro/css/slider-pro.min.css" media="screen"/>
		<script type="text/javascript" src="<?Php echo base_url(); ?>admin/assets/libs/vendors/sliderpro/js/jquery.sliderPro.js"></script>-->
        <?Php } ?>
        
		<?Php if(in_array(4,$loadLibrary)){ ?>
        <link rel="stylesheet" type="text/css" href="<?Php echo base_url(); ?>admin/assets/libs/vendors/bloqueslide/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?Php echo base_url(); ?>admin/assets/libs/vendors/bloqueslide/demo.css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,600' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="<?Php echo base_url(); ?>admin/assets/libs/vendors/bloqueslide/custom.js"></script>
        <?Php } ?>

    <!-- LoadLibrarys -> Termina -->
    
	<style type="text/css">
	html, body{
		height:100%;
		background-color:rgba(255,255,255,1);
	}
	.container-fluid > .navbar-collapse, .container-fluid > .navbar-header, .container > .navbar-collapse, .container > .navbar-header{
		min-height:95px;
	}
	.navbar-inverse{
		background:rgba(<?Php echo substr($MenusPropiedad[0]->color,5,-3); ?>,0.5); /*Color de la barra transparente*/
		border:0px;
	}
	.navbar-nav{
		margin:7px;
	}
	.nav > li{
		margin-right: 0px;
	}
	.navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:focus, .navbar-inverse .navbar-nav > .active > a:hover{
		background:<?Php echo $MenusPropiedad[0]->color; ?>;
	}
	.navbar-inverse .navbar-brand, .navbar-inverse .navbar-nav > li > a{
		text-shadow:none;
		font-weight:bold;
		font-size:18px;
		text-transform:uppercase;
		font-family:"Myriad Pro";
	}
	.nav > li > A{
		color:#643200;
	}
	.navbar-inverse .navbar-nav > li > a{
		color:rgba(100,50,0,1);/*Cafe Letra*/
	}
	.navbar-inverse .navbar-nav>li>a:focus, .navbar-inverse .navbar-nav>li>a:hover {
		background-color:rgba(<?Php echo substr($MenusPropiedad[0]->color,5,-3); ?>,0.65); /*Color del boton*/
		border:<?Php echo $MenusPropiedad[0]->color; ?>;
	}
	.navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .open > a{
		background-image:none;
	}
	.navbar-brand{
		padding:0px;
	}
	.navbar-header{
		background-color:transparent;
	}
	@media (max-width: 767px) {
	  #logoTop {
		width: 200px;
	  }
	}
	@media (min-width: 768px) {
		#logoTop {
			width: 250px;
		}
		.navbar-brand{
			padding:0px 0px 62px 0px;
		}
	}
	@media (min-width: 992px) {
		#logoTop {
			width: 340px;
		}
		.navbar-brand{
			padding:0px 80px 0px 0px;
		}
	}
	.inEspacios{
		margin:50px 0px;
		/*border:1px solid rgba(0,0,102,1);*/
	}
	.sy-pager > li.sy-active a{
		background:<?Php echo $MenusPropiedad[0]->color; ?>;
	}
	body nav ul li:hover {
		background:<?Php echo $MenusPropiedad[0]->color; ?>;
	}
	<?Php 
	if(in_array(2,$loadLibrary)){
		echo $arrStyle; 
	}
	?>
	</style>
  </head>
 
  <body>
 
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="<?Php echo base_url(); ?>assets/img/logo_top.png" id="logoTop"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <!--
            <li class="active"><a href="#">Inicio</a></li>
            <li><a href="#contact">Negocio olnatura</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Nuestras Marcas <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action 1</a></li>
                <li><a href="#">Action 2</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Another action</a></li>
              </ul>
            </li>
            -->
            <?Php 
				echo $menuDesple;
			?>
          </ul>
        </div><!--/.nav-collapse -->
    </nav>