<!DOCTYPE html>
<html><head>
<?php 
$currenturl = current_url();
$currenturl = explode('/',str_replace(site_url(),'',$currenturl));
$path = $currenturl[0];
if(empty($currenturl[1])) $currenturl[1]='';
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width">
<title>CMS ERP Admin - </title>
<link href="<?php echo site_url();?>assets/admin/css/reset.css" rel="stylesheet" type="text/css">
<link href="<?php echo site_url();?>assets/admin/css/layout.css" rel="stylesheet" type="text/css">
<link href="<?php echo site_url();?>assets/admin/css/themes.css" rel="stylesheet" type="text/css">
<link href="<?php echo site_url();?>assets/admin/css/typography.css" rel="stylesheet" type="text/css">
<link href="<?php echo site_url();?>assets/admin/css/styles.css" rel="stylesheet" type="text/css">
<link href="<?php echo site_url();?>assets/admin/css/shCore.css" rel="stylesheet" type="text/css">
<link href="<?php echo site_url();?>assets/admin/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo site_url();?>assets/admin/css/jquery.jqplot.css" rel="stylesheet" type="text/css">
<link href="<?php echo site_url();?>assets/admin/css/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css">
<link href="<?php echo site_url();?>assets/admin/css/data-table.css" rel="stylesheet" type="text/css">
<link href="<?php echo site_url();?>assets/admin/css/form.css" rel="stylesheet" type="text/css">
<link href="<?php echo site_url();?>assets/admin/css/ui-elements.css" rel="stylesheet" type="text/css">
<link href="<?php echo site_url();?>assets/admin/css/wizard.css" rel="stylesheet" type="text/css">
<link href="<?php echo site_url();?>assets/admin/css/sprite.css" rel="stylesheet" type="text/css">
<link href="<?php echo site_url();?>assets/admin/css/gradient.css" rel="stylesheet" type="text/css">
<link href="<?php echo site_url();?>assets/admin/css/custom.css" rel="stylesheet" type="text/css">
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="<?php echo site_url();?>assets/admin/css/ie/ie7.css" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="<?php echo site_url();?>assets/admin/css/ie/ie8.css" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="<?php echo site_url();?>assets/admin/css/ie/ie9.css" />
<![endif]-->
<!-- Jquery -->
<script src="<?php echo site_url();?>assets/admin/js/jquery-1.7.1.min.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jquery.ui.touch-punch.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/chosen.jquery.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/uniform.jquery.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/bootstrap-dropdown.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/bootstrap-colorpicker.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/sticky.full.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jquery.noty.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/selectToUISlider.jQuery.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/fg.menu.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jquery.tagsinput.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jquery.cleditor.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jquery.tipsy.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jquery.peity.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jquery.simplemodal.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jquery.jBreadCrumb.1.1.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jquery.colorbox-min.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jquery.idTabs.min.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jquery.multiFieldExtender.min.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jquery.confirm.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/elfinder.min.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/accordion.jquery.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/autogrow.jquery.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/check-all.jquery.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/data-table.jquery.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/ZeroClipboard.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/TableTools.min.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jeditable.jquery.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/duallist.jquery.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/easing.jquery.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/full-calendar.jquery.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/input-limiter.jquery.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/inputmask.jquery.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/iphone-style-checkbox.jquery.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/meta-data.jquery.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/quicksand.jquery.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/raty.jquery.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/smart-wizard.jquery.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/stepy.jquery.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/treeview.jquery.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/ui-accordion.jquery.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/vaidation.jquery.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/mosaic.1.0.1.min.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jquery.collapse.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jquery.cookie.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jquery.autocomplete.min.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/localdata.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/excanvas.min.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jquery.jqplot.min.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jqplot.dateAxisRenderer.min.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jqplot.cursor.min.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jqplot.logAxisRenderer.min.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jqplot.canvasTextRenderer.min.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jqplot.canvasAxisTickRenderer.min.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jqplot.highlighter.min.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jqplot.pieRenderer.min.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jqplot.barRenderer.min.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jqplot.categoryAxisRenderer.min.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jqplot.pointLabels.min.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/jqplot.meterGaugeRenderer.min.js"></script>
<script src="<?php echo site_url();?>assets/admin/js/custom-scripts.js"></script>
</head>
<body id="theme-default" class="full_block">
	<div id="container" class="mgleft70">
    	<div id="header" class="blue_lin">
    		<div class="header_left">
    			<div class="logo">
    				<img src="<?php echo site_url();?>assets/admin/images/logo.png" alt="Ekra" width="160" height="60">
    			</div>
     		</div>
    		<div class="header_right">
   		</div>
    	</div>
        <div class="switch_bar">
 		</div>
        <div id="content">
    		<div class="grid_container">
    			<?= $this->renderSection('main') ?>
    		</div>
    	</div>
	</div>
  </body>
</html>