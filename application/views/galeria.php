<style>
html,body{
	height:100%;
}
@media (max-width: 767px) {
	#elFrame{
		height:300px;
	}
	#espaciador{
		height:15px;
	}
}
@media (min-width: 768px) {
	#elFrame{
		height:500px;
	}
	#espaciador{
		height:20px;
	}
}
@media (min-width: 1285px) {
	#elFrame{
		height:900px;
	}
	#espaciador{
		height:20px;
	}
}
</style>
<div id="espaciador">&nbsp;</div>
<div align="center"><iframe src="<?Php echo base_url(); ?>extGaleria.php" frameborder="0" width="100%" id="elFrame"></iframe></div>