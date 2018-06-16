<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  Templates.<?php echo $this->template; ?>
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add Stylesheets
$doc->addStyleSheet('templates/'.$this->template.'/css/template5.css');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Add current user information
$user = JFactory::getUser();

$position7 = JModuleHelper::getModules('position-7');
$position8 = JModuleHelper::getModules('position-8');
$position9 = JModuleHelper::getModules('position-9');

// Adjusting content width
if (count($position7) && count($position8))
{
	$span = "span6";
}
elseif (count($position7) && !count($position8))
{
	$span = "span9";
}
elseif (!count($position7) && count($position8))
{
	$span = "span9";
}
else
{
	$span = "span12";
}
if ($this->language == 'pl-pl') {
	$top_menu = array('114','132','113','115','116');
	$powrot = 'Powrót';
	$blad = 'Błąd';
}
else {
	$top_menu = array('152','153','151','154','155');
	$powrot = 'Back';
	$blad = 'Error';
}

// Logo file or site title param
//if ($itemid == '101') $logo = '<img src="templates/'.$this->template.'/images/logo.png" alt="'. $sitename .'" class="logo" />';
//else $logo = '<img src="templates/'.$this->template.'/images/logo_top.png" alt="'. $sitename .'" class="logo_top" />';
$logo = '<img src="templates/'.$this->template.'/images/logo_top.png" alt="'. $sitename .'" class="logo_top" />';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<base href="<?php echo $this->baseurl ?>/" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="generator" content="Joomla! - Open Source Content Management" />
  <title><?php echo $this->title; ?> <?php echo $this->error->getMessage();?></title>
  <link href="<?php echo $this->baseurl ?>/en/" rel="canonical" />
  <link href="/en/?format=feed&amp;type=rss" rel="alternate" type="application/rss+xml" title="RSS 2.0" />
  <link href="/en/?format=feed&amp;type=atom" rel="alternate" type="application/atom+xml" title="Atom 1.0" />
  <link href="/templates/<?php echo $this->template; ?>/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
  <link rel="stylesheet" href="/components/com_imageshow/assets/css/style.css" type="text/css" />
  <link rel="stylesheet" href="/templates/<?php echo $this->template; ?>/css/template5.css" type="text/css" />
  <link rel="stylesheet" href="/media/mod_languages/css/template.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/modules/mod_maximenuck/themes/default/css/moo_maximenuhck.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/modules/mod_maximenuck/themes/default/css/maximenuhck.php?monid=maximenuck" type="text/css" />
  <link rel="stylesheet" href="/modules/mod_maximenuck/templatelayers/gantry-navigation.css" type="text/css" />
  <script src="/media/system/js/mootools-core.js" type="text/javascript"></script>
  <script src="/media/system/js/core.js" type="text/javascript"></script>
  <script src="/media/system/js/caption.js" type="text/javascript"></script>
  <script src="/media/jui/js/jquery.min.js" type="text/javascript"></script>
  <script src="/media/jui/js/jquery-noconflict.js" type="text/javascript"></script>
  <script src="/media/jui/js/bootstrap.min.js" type="text/javascript"></script>
  <script type="text/javascript">
window.addEvent('load', function() {
				new JCaption('img.caption');
			});
jQuery(document).ready(function($){
			$('#maximenuck').DropdownMaxiMenu({fxtransition : 'linear',dureeIn : 0,dureeOut : 100,menuID : 'maximenuck',testoverflow : '1',orientation : 'horizontal',behavior : 'mouseover',opentype : 'slide',fxdirection : 'normal',directionoffset1 : '0',directionoffset2 : '0',showactivesubitems : '0',ismobile : 0,menuposition : '0',fxduration : 100});});
  </script>

			<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
		<style type="text/css">
			h1,h2,h3,h4,h5,h6,.site-title{
				font-family: 'Open Sans', sans-serif;
			}
		</style>
	<script type="text/javascript">
	  jQuery(document).ready(function($) {
		  $('#top-1').hide();	
		  $('.item<?php echo $top_menu[0];?>').click(function(){
			  $('#top-1').show('slow');
			  $('#top-2').hide('slow');
		  });
		  $('.menu-top').mouseleave(function(){
			  $('#top-1').hide('slow');
		  });
		  
		  $('#top-2').hide();	
		  $('.item<?php echo $top_menu[1];?>').click(function(){
			  $('#top-2').show('slow');
			  $('#top-1').hide('slow');
		  });
		  $('.menu-top').mouseleave(function(){
			  $('#top-2').hide('slow');
		  });
		  
		  $('.item<?php echo $top_menu[2];?>').hover(function(){
			  $('#top-2').hide('slow');
			  $('#top-1').hide('slow');
		  });
		  
		  $('.item<?php echo $top_menu[3];?>').hover(function(){
			  $('#top-2').hide('slow');
			  $('#top-1').hide('slow');
		  });
		  
		  $('.item<?php echo $top_menu[4];?>').hover(function(){
			  $('#top-2').hide('slow');
			  $('#top-1').hide('slow');
		  });
	  });
   </script>
	<!--[if lt IE 9]>
		<script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script>
	<![endif]-->
	</script>
</head>

<body class="site">
	<div class="head" style="z-index: 1001;">
		<div class="head-inner">
			<a class="brand pull-left" href="<?php echo $this->baseurl; ?>" style="float: left;">
				<?php echo $logo;?>
			</a>	
			<div class="navigation top-navigation">
			<?php
				$position1 = JModuleHelper::getModules('position-1');
						foreach ($position1 as $searchmodule)
						{
							$output = JModuleHelper::renderModule($searchmodule, array('style' => 'none'));
							$params = new JRegistry;
							$params->loadString($searchmodule->params);
							echo $output;
						}
				?>
			</div>
			<div class="navigation top-lang">
				<?php
				$position0 = JModuleHelper::getModules('position-0');
						foreach ($position0 as $searchmodule)
						{
							$output = JModuleHelper::renderModule($searchmodule, array('style' => 'none'));
							$params = new JRegistry;
							$params->loadString($searchmodule->params);
							echo $output;
						}
				?>
			</div>
		</div>
	</div>
	<div id="top-1" class="menu-top" style="z-index: 999;">
		<div class="menu-top-inner"><div class="wybor"></div>
			<div class="clearfix"></div>
			<?php
				$menutop = JModuleHelper::getModules('menu-top');
						foreach ($menutop as $searchmodule)
						{
							$output = JModuleHelper::renderModule($searchmodule, array('style' => 'none'));
							$params = new JRegistry;
							$params->loadString($searchmodule->params);
							echo $output;
						}
				?>
		</div>
		<div class="headsep" style="z-index: 1000;position: absolute;"></div>
	</div>
	<div id="top-2" class="menu-top" style="z-index: 999;">
		<div class="menu-top-inner"><div class="wybor-2"></div>
			<div class="clearfix"></div>
			<?php
				$position2 = JModuleHelper::getModules('position-2');
						foreach ($position2 as $searchmodule)
						{
							$output = JModuleHelper::renderModule($searchmodule, array('style' => 'none'));
							$params = new JRegistry;
							$params->loadString($searchmodule->params);
							echo $output;
						}
				?>
		</div>
		<div class="headsep" style="z-index: 1000;position: absolute;"></div>
	</div>
	<div class="headsep" style="z-index: 998;position: absolute;"></div>
	<!-- Body -->
	<div class="body" style="z-index: 999;margin-bottom: -7px;">
		<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : '');?>">
			<!-- Header -->
			
			<?php
				$banner = JModuleHelper::getModules('banner');
						foreach ($banner as $searchmodule)
						{
							$output = JModuleHelper::renderModule($searchmodule, array('style' => 'xhtml'));
							$params = new JRegistry;
							$params->loadString($searchmodule->params);
							echo $output;
						}
				?>
			<div class="row-fluid">
				<div id="content">	
					<div class="item-page">
						<div class="error-page">
							<div class="error-header">
								<span class="error-text"><?php echo $blad;?></span>
								<span class="error-code"><?php echo $this->error->getCode(); ?></span>
							</div>
							<div class="error-message"><?php echo JText::_('JERROR_LAYOUT_PAGE_NOT_FOUND'); ?></div>
							<div class="form-vertical">
								<div class="form-actions">
									<button class="btn btn-primary btn-wroc" type="button" onfocus="blur()" onclick="javascript:window.history.go(-1)"><?php echo $powrot;?></button>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>				
	</div>
	<!-- Footer -->
	<div class="footersep" style="z-index: 98;position: absolute;"></div>
	<div class="footer">
		<div class="footer-inner">
			<a href="<?php echo $this->baseurl; ?>" onfocus="blur()" class="logo-bottom" style="z-index: 9999;"></a>
			<a href="<?php echo $this->baseurl; ?>" onfocus="blur()" class="footer-logo"></a><p>&copy; <?php echo date('Y');?>, <?php echo $sitename; ?> All rights reserved.</p>
			<p class="power">powered by <a href="http://astosoft.pl" onfocus="blur()" target="_blank">AstoSoft</a> & <a href="http://gs77.com" onfocus="blur()" target="_blank">gs77</a></p>
			<?php
				$footer = JModuleHelper::getModules('footer');
						foreach ($footer as $searchmodule)
						{
							$output = JModuleHelper::renderModule($searchmodule, array('style' => 'none'));
							$params = new JRegistry;
							$params->loadString($searchmodule->params);
							echo $output;
						}
				?>
			<div class="clearfix"></div>
		</div>
	</div>
	<?php
				$debug = JModuleHelper::getModules('debug');
						foreach ($debug as $searchmodule)
						{
							$output = JModuleHelper::renderModule($searchmodule, array('style' => 'none'));
							$params = new JRegistry;
							$params->loadString($searchmodule->params);
							echo $output;
						}
				?>
</body>
</html>
