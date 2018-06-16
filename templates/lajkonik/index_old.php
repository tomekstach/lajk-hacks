<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  Templates.lajkonik
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
$doc->addStyleSheet('templates/'.$this->template.'/css/template10.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/template_responsive4.css');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);
$doc->addScript('templates/' .$this->template. '/js/functions.js');

// Add current user information
$user = JFactory::getUser();

// Adjusting content width
if ($this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "span6";
}
elseif ($this->countModules('position-7') && !$this->countModules('position-8'))
{
	$span = "span9";
}
elseif (!$this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "span9";
}
else
{
	$span = "span12";
}
if ($this->language == 'pl-pl') {
	$szukamy_lokali = '/szukamy-lokali';
	$top_menu = array('114','132','113','115','116');
	$mapa = 1;
	$mapa2 = 3;
}
else {
	$szukamy_lokali = '/en/we-are-looking-for-premises';
	$top_menu = array('152','153','151','154','155');
	$mapa = 2;
	$mapa2 = 4;
}

// Logo file or site title param
//if ($itemid == '101') $logo = '<img src="templates/'.$this->template.'/images/logo.png" alt="'. $sitename .'" class="logo" />';
//else $logo = '<img src="templates/'.$this->template.'/images/logo_top.png" alt="'. $sitename .'" class="logo_top" />';
$logo = '<img src="templates/'.$this->template.'/images/logo_top.png" alt="'. $sitename .'" class="logo_top" />';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<script src="https://www.google.com/jsapi" type="text/javascript"></script>
	<jdoc:include type="head" />
	<?php
	// Use of Google Font
	if ($this->params->get('googleFont'))
	{
	?>
		<link href='http://fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName');?>' rel='stylesheet' type='text/css' />
		<style type="text/css">
			h1,h2,h3,h4,h5,h6,.site-title{
				font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName'));?>', sans-serif;
			}
		</style>
	<?php
	}
	?>
	<?php
	// Template color
	if ($this->params->get('templateColor'))
	{
	?>
	<style type="text/css">
		a
		{
			color: <?php echo $this->params->get('templateColor');?>;
		}
		.navbar-inner, .nav-list > .active > a, .nav-list > .active > a:hover, .dropdown-menu li > a:hover, .dropdown-menu .active > a, .dropdown-menu .active > a:hover, .nav-pills > .active > a, .nav-pills > .active > a:hover,
		.btn-primary
		{
			background: <?php echo $this->params->get('templateColor');?>;
		}
		.navbar-inner
		{
			-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
			-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
			box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
		}
	</style>
	<?php
	}
	?>
	<script type="text/javascript">
	  jQuery(document).ready(function($) {
		  $('#top-1').hide();
		  $('.item<?php echo $top_menu[0];?>').click(function(){
			  $('#top-1').show('slow');
			  $('#top-2').hide('slow');
			  $('#top-3').hide('slow');
		  });
		  if (jQuery(window).width() >= 768) {
			  $('.menu-top').mouseleave(function(){
				  $('#top-1').hide('slow');
			  });
		  }

		  $('#top-3').hide();
		  $('#top-2').hide();
		  $('.item<?php echo $top_menu[1];?>').click(function(){
			  $('#top-2').show('slow');
			  $('#top-1').hide('slow');
			  $('#top-3').hide('slow');
		  });

		  if (jQuery(window).width() >= 768) {
			  $('.menu-top').mouseleave(function(){
				  $('#top-2').hide('slow');
			  });
		  }

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

		  $('#produkty').click(function(){
			  $('#top-1').show('slow');
			  $('#top-2').hide('slow');
			  $('#top-3').hide('slow');
		  });
		  $('#produkty').click(function(){
			  $('#top-1').show('slow');
			  $('#top-2').hide('slow');
			  $('#top-3').hide('slow');
		  });
		  $('#sklepy').click(function(){
			  $('#top-2').show('slow');
			  $('#top-1').hide('slow');
			  $('#top-3').hide('slow');
		  });
		  $('.menu-center').click(function(){
			  $('#top-3').show('slow');
			  $('#top-2').hide('slow');
			  $('#top-1').hide('slow');
		  });
		  var ieVersion = (function() { if (new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})").exec(navigator.userAgent) != null) { return parseFloat( RegExp.$1 ); } else { return false; } })();
		  if (ieVersion >= 9) {
			  $('.btn').css('padding-top', '20px');
			  $('.btn').css('padding-bottom', '10px');
		  }

		  if (jQuery(window).width() < 768) {
			$('#top-2 a.standard-contact').removeAttr('href');
		  }
		  if (jQuery(window).width() >= 768) {
			  $('#top-3').hide();
		  }
	  });
   </script>
	<!--[if lt IE 9]>
		<script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script>
	<![endif]-->
	<style type="text/css">
	.box_skitter .label_skitter {
		bottom: 100px;
	}
	</style>
</head>

<body class="site">
	<div class="head" style="z-index: 1001;">
		<div class="head-inner">
			<a class="brand pull-left" href="<?php echo $this->baseurl; ?>" style="float: left;">
				<?php echo $logo;?> <?php if ($this->params->get('sitedescription')) { echo '<div class="site-description">'. htmlspecialchars($this->params->get('sitedescription')) .'</div>'; } ?>
			</a>
			<?php if ($this->countModules('position-1')) : ?>
			<div class="navigation top-navigation">
				<jdoc:include type="modules" name="position-1" style="none" />
			</div>
			<a href="https://www.facebook.com/LajkonikPiekarniaiKawiarnia" rel="nofollow" target="_blank" class="facebook"></a>
			<a href="https://www.instagram.com/lajkonikpiekarniaikawiarnia/" rel="nofollow" target="_blank" class="instagram"></a>
			<a href="https://pl.tripadvisor.com/Restaurant_Review-g274786-d8872587-Reviews-Lajkonik_Cafe_Bakery-Sosnowiec_Silesia_Province_Southern_Poland.html" rel="nofollow" target="_blank" class="tripadvisor"><img src="https://pl.tripadvisor.com/img/cdsi/img2/branding/socialWidget/32x32_white-21690-2.png"/></a><script src="https://www.jscache.com/wejs?wtype=socialButtonIcon&amp;uniq=179&amp;locationId=8872587&amp;color=white&amp;size=med&amp;lang=pl&amp;display_version=2"></script>
			<?php endif; ?>
			<div class="navigation top-lang">
				<jdoc:include type="modules" name="position-0" style="none" />
			</div>
		</div>
	</div>
	<div id="top-1" class="menu-top" style="z-index: 999;">
		<div class="menu-top-inner"><div class="wybor"></div>
			<div class="clearfix"></div>
			<jdoc:include type="modules" name="menu-top" style="none" />
		</div>
		<div class="headsep" style="z-index: 1000;position: absolute;"></div>
	</div>
	<div id="top-2" class="menu-top" style="z-index: 999;">
		<div class="mapa-lokali">
			<div class="mapa-lokali-in">
        <?php echo JHtml::_('content.prepare', "<div class=\"mapa-lokali-1\">{phocamaps view=map|id=".$mapa."}</div><div class=\"mapa-lokali-2\">{phocamaps view=map|id=".$mapa2."}</div>"); ?>
			</div>
		</div>
		<div class="menu-top-inner"><div class="wybor-2"></div>
			<div class="clearfix"></div>
			<jdoc:include type="modules" name="position-2" style="none" />
			<!--<a href="<?php echo $szukamy_lokali;?>" class="menu-local">
				<span class="top-title-4"><?php echo JText::_('SZUKAMY_1');?></span>
				<span class="top-title-2"><?php echo JText::_('SZUKAMY_2');?></span>
				<span class="top-title-3"><?php echo JText::_('SZUKAMY_3');?></span>
				<span class="top-img-sklepy"><img src="/images/lokale_szukamy_lokali_mini.png" alt="Szukamy lokali" /></span>
			</a>-->
		</div>
		<div class="headsep" style="z-index: 1000;position: absolute;"></div>
	</div>
	<div id="top-3" class="menu-top" style="z-index: 999;">
		<div class="menu-top-inner">
			<div class="clearfix"></div>
			<jdoc:include type="modules" name="position-1" style="none" />
		</div>
		<div class="headsep" style="z-index: 1000;position: absolute;"></div>
	</div>
	<div class="headsep" style="z-index: 998;position: absolute;"></div>
	<!-- Body -->
	<div class="body" style="z-index: 999;margin-bottom: -7px;">
	<?php if ($itemid == '137' || $itemid == '144'):?>
		<div class="rotator">
			<div id="promo_button">
				<a href="http://www.lajkonik-pik.pl/pl/promocje" rel="nofollow" target="_self"><img src="images/promocje_new.png" alt="Promocje" /></a>
			</div>
            <div id="nowosci_button">
				<img src="images/nowosci.png" alt="Promocje" />
			</div>
            <div id="grupy_button">
				<img src="images/grupy.png" alt="Promocje" />
			</div>
			<!--<a href="http://www.kartanaplus.pl" onfocus="blur()" class="metka3"></a>-->
			<div id="preload_images_container" style="display: none;"></div>
			<div id="loading_images">
				<img src="templates/<?php echo $this->template;?>/images/loader2.gif" alt="loading ind" />
			</div>

			<div class="rotator_backgrounds"></div>
			<div class="frame_top">
				<div class="lajkonik_logo"></div>
				<jdoc:include type="modules" name="banner-front" style="none" />
				<div class="navigation top-lang-mobile">
					<jdoc:include type="modules" name="position-0" style="none" />
				</div>
			</div>
		</div>
		<script type="text/javascript">

			var animate_duration = 2000;
			var rotator_min_height = 680;
			var rotator_max_height = 1022;
			var images_to_load;
			var images_loaded = 0;

			var play_animation;

			if (jQuery(window).width() >= 768) {
				var url_images_ = new Array(
					'/templates/<?php echo $this->template;?>/images/1.jpg',
					'/templates/<?php echo $this->template;?>/images/3.jpg',
					'/templates/<?php echo $this->template;?>/images/4.jpg',
					'/templates/<?php echo $this->template;?>/images/5.jpg',
					'/templates/<?php echo $this->template;?>/images/6.jpg',
					'/templates/<?php echo $this->template;?>/images/7.jpg'
				);
			}
			else {
				var url_images_ = new Array(
					'/templates/<?php echo $this->template;?>/images/1.jpg'
				);
				rotator_min_height = 580;
			}


			jQuery(document).ready(function($){
				images_to_load = url_images_.length;

				$(url_images_).each(function(index, value){
					$('#preload_images_container').append('<img src="'+value+'" alt="preload"/>');
				});

				if (jQuery(window).width() >= 768) {
					$("#preload_images_container img").load(function(){

						if(parseInt((images_to_load-1)) == parseInt((images_loaded))){

							$(url_images_).each(function(index, value){
								$('.rotator_backgrounds').append("<div style=\"display: none; background: url("+value+") no-repeat center top\">&nbsp;</div>");
								$('.rounded_buttons').append('<td><div id="button_id_'+parseInt(index+1)+'" class="rotator_button" image_number = "'+parseInt(index+1)+'">&nbsp;</div></td>');
								$('<img/>')[0].src = this;
							});
							move_image_to(1);

							play_animation = self.setInterval(function(){
								var current_img_ = parseInt($('.selected_button').attr('image_number'));
								if(current_img_ < url_images_.length){
									move_image_to(parseInt((current_img_+1)));
								}else{
									move_image_to(1);
								}
							},6000);

							$('#preload_images_container, #loading_images').remove();

						}else{
							images_loaded++;
						}

					});
				}
				else {
					$("#preload_images_container img").load(function(){
						$('.rotator_backgrounds').append("<div style=\"display: none; background: url("+url_images_[0]+") no-repeat center top\">&nbsp;</div>");
						$('<img/>')[0].src = this;
						move_image_to(1);
						$('#preload_images_container, #loading_images').remove();
					});
				}

					resize_rotator_content();
					$(window).resize(function() {
						resize_rotator_content();
					});
			});


			function move_image_to(index_){


				jQuery('.rotator_button').unbind('click');

				jQuery('.rotator_button').removeClass('selected_button');
				jQuery('#button_id_'+index_).addClass('selected_button');

				jQuery(".rotator_backgrounds div:visible").fadeOut(animate_duration);
				jQuery(".rotator_backgrounds div:nth-child("+index_+")").fadeIn(animate_duration, function(){
					jQuery('.rotator_button').click(function(){
						move_image_to(jQuery(this).attr('image_number'));
					});
				});

			}


			function resize_rotator_content(){
				var window_height_ = jQuery(window).height();
				var diff_ = 70;

				if(window_height_ > rotator_min_height && rotator_max_height > window_height_){
					jQuery('.rotator').height(parseInt(window_height_-(diff_*2)));
				}else if(window_height_ > rotator_max_height){
					jQuery('.rotator').height(parseInt(rotator_max_height));
				}else if(rotator_min_height > window_height_){
					jQuery('.rotator').height(parseInt(rotator_min_height-diff_));
				}
			}

		</script>
	<?php else:?>
		<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : '');?>">
			<!-- Header -->

			<jdoc:include type="modules" name="banner" style="xhtml" />
			<div class="row-fluid">
				<?php if ($this->countModules('position-8')) : ?>
				<!-- Begin Sidebar -->
				<div id="sidebar" class="span3">
					<div class="sidebar-nav">
						<jdoc:include type="modules" name="position-8" style="xhtml" />
					</div>
				</div>
				<!-- End Sidebar -->
				<?php endif; ?>
				<div id="content">
					<!-- Begin Content -->
					<jdoc:include type="message" />
					<jdoc:include type="component" />
					<div class="clear_20"></div>
					<jdoc:include type="modules" name="position-3" style="none" />
					<!-- End Content -->
				</div>
				<?php if ($this->countModules('position-7')) : ?>
				<div id="aside" class="span3">
					<!-- Begin Right Sidebar -->
					<jdoc:include type="modules" name="position-7" style="well" />
					<!-- End Right Sidebar -->
				</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endif;?>
	</div>
	<!-- Footer -->
	<div class="footersep" style="z-index: 98;position: absolute;"></div>
	<div class="footer">
		<div class="footer-inner">
			<a href="<?php echo $this->baseurl; ?>" onfocus="blur()" class="logo-bottom" style="z-index: 9999;<?php if ($itemid == '137' || $itemid == '144'):?>display: none;<?php endif;?>" rel="nofollow"></a>
			<a href="<?php echo $this->baseurl; ?>" onfocus="blur()" class="footer-logo"></a><p>&copy; <?php echo date('Y');?>, <?php echo $sitename; ?> All rights reserved.</p>
			<p class="power">powered by <a href="http://astosoft.pl" onfocus="blur()" rel="nofollow" target="_blank">AstoSoft</a> & <a href="http://gs77.com" onfocus="blur()" rel="nofollow" target="_blank">gs77</a></p>
			<jdoc:include type="modules" name="footer" style="none" />
			<div class="clearfix"></div>
		</div>
	</div>
	<jdoc:include type="modules" name="debug" style="none" />

	<jdoc:include type="modules" name="menu-bottom" style="none" />

	<?php if ($itemid == '137' || $itemid == '144'):?>
	<style type="text/css">
	.logo-bottom {
		display: none;
	}
	</style>
  <div class="background_first_0">
		<div class="inside_content_0">
			<jdoc:include type="modules" name="banner-pop" style="none" />
			<img class="close_button_img_0" alt="Close" src="templates/<?php echo $this->template;?>/images/close.png"/>
		</div>
	</div>
	<div class="background_first_ex">
		<div class="inside_content_ex">
			<jdoc:include type="modules" name="banner-pop-ex" style="none" />
			<img class="close_button_img_ex" alt="Close" src="templates/<?php echo $this->template;?>/images/close.png"/>
		</div>
	</div>
	<div class="background_first_1">
		<div class="inside_content_1">
			<jdoc:include type="modules" name="banner-pop1" style="none" />
			<img class="close_button_img_1" alt="Close" src="templates/<?php echo $this->template;?>/images/close.png"/>
		</div>
	</div>
	<div class="background_first_2">
		<div class="inside_content_2">
			<jdoc:include type="modules" name="banner-pop2" style="none" />
			<img class="close_button_img_2" alt="Close" src="templates/<?php echo $this->template;?>/images/close.png"/>
		</div>
	</div>
	<div class="background_first_3">
		<div class="inside_content_3">
			<jdoc:include type="modules" name="banner-pop3" style="none" />
			<img class="close_button_img_3" alt="Close" src="templates/<?php echo $this->template;?>/images/close.png"/>
		</div>
	</div>

	<script type="text/javascript">

	jQuery(document).ready(function($){
		$('.close_button_img_3').click(function(){
			show_frame_box('hide', '3');
		});

		$('.close_button_img_2').click(function(){
			show_frame_box('hide', '2');
		});

		$('.close_button_img_1').click(function(){
			show_frame_box('hide', '1');
		});

    $('.close_button_img_0').click(function(){
			show_frame_box('hide', '0');
		});

		$('.close_button_img_ex').click(function(){
			show_frame_box('hide', 'ex');
		});

    if (jQuery('.inside_content_0 .pop-banner').length) {
      $(window).resize(function() {
        if($('.background_first_0').is(':visible')){
          show_frame_box('show', '0');
        }
      });
    }
		else if (jQuery('.inside_content_ex .pop-banner').length) {
      $(window).resize(function() {
        if($('.background_first_ex').is(':visible')){
          show_frame_box('show', 'ex');
        }
      });
    }
    else if (jQuery('.inside_content_2 .pop-banner').length) {
      $(window).resize(function() {
        if($('.background_first_2').is(':visible')){
          show_frame_box('show', '2');
        }
      });
    }

		$('#grupy_button').click(function(){
			show_frame_box('show', '2');
		});

		$('#nowosci_button').click(function(){
			show_frame_box('show', '1');
		});

		$('#banner-pop-new3').click(function(){
			show_frame_box('hide', '2', 0);
			show_frame_box('show', '3', 0);
		});

	});

	function show_frame_box(operation_, content, button){
		if(operation_ == 'show'){
			jQuery('.background_first_' + content).css({
				'width': jQuery(window).width(),
				'height': jQuery(window).height(),
				'left': jQuery(window).width()+'px'
			});
			jQuery('.background_first_' + content).show();
			if(jQuery(window).height() > jQuery('.inside_content_' + content).height()){
				jQuery('.inside_content_' + content).css('margin-top', parseInt( ((jQuery(window).height() - 650)/2) ) );
			}

			if (button != 0) {
				jQuery('#grupy_button').hide('fast');
				jQuery('#nowosci_button').hide('fast');
				jQuery('#promo_button').hide('fast');
			}

			jQuery('.background_first_' + content).animate({
				left: '0px',
			}, 500, function() {

			});

		}else{
			jQuery('.background_first_' + content).animate({
				left: jQuery(window).width()+'px',
			}, 500, function() {
				jQuery('.background_first_' + content).hide();

				if (button != 0 && jQuery('.background_first_3').css('display') == 'none') {
					jQuery('#grupy_button').show('fast');
					jQuery('#nowosci_button').show('fast');
					jQuery('#promo_button').show('fast');
				}
			});


		}
	}

	if (jQuery('.inside_content_0 .pop-banner').length && jQuery(window).width() >= 768) {
		show_frame_box('show', '0');

		setTimeout(function(){
			show_frame_box('hide', '0');
		}, 6000);
	}
	else if (jQuery('.inside_content_ex .pop-banner').length && jQuery(window).width() >= 768) {
		show_frame_box('show', 'ex');
	}
  else if (jQuery('.inside_content_2 .pop-banner').length && jQuery(window).width() >= 768) {
		show_frame_box('show', '2');

		setTimeout(function(){
			show_frame_box('hide', '2');
		}, 6000);
	}
	else {
		jQuery('#grupy_button').hide('fast');
		jQuery('#nowosci_button').hide('fast');
		jQuery('#promo_button').hide('fast');
	}
	</script>

	<?php endif;?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-41727262-1', 'lajkonik-pik.pl');
  ga('send', 'pageview');
</script>
</body>
</html>
