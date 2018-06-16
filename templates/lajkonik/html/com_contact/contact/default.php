<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$cparams = JComponentHelper::getParams('com_media');
JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.tooltip');
jimport('joomla.html.html.bootstrap');
jimport( 'joomla.event.dispatcher' );
jimport( 'joomla.plugin.helper' );

if ($this->contact->sortname3):
	if ($this->params->get('show_email_form') && ($this->contact->email_to || $this->contact->user_id)) $cont_img = '';
	else $cont_img = '2';

?>
<script type='text/javascript'>
jQuery(document).ready(function(){
	console.log('load!');
		if (jQuery(window).width() < 999) {
			jQuery('#map').css('width', '653px');
			jQuery('#map').find('iframe').css('width', '653px');
		}
		else {
			jQuery('#map').css('width', '300px');
			jQuery('#map').find('iframe').css('width', '300px');
		}
		if (jQuery(window).width() < 999) {
			jQuery('#map').css('height', '410px');
			jQuery('#map').find('iframe').css('height', '410px');
		}
		else {
			jQuery('#map').css('height', '474px');
			jQuery('#map').find('iframe').css('height', '474px');
		}
		document.getElementById("map").style.margin = "0 0 0 0";
		document.getElementById("map").style.border = "6px solid #f8f7f5";

	<?php if ($this->contact->fax):?>
		document.getElementById("streetview").style.margin = "0 0 0 0";
		document.getElementById("streetview").style.border = "6px solid #f8f7f5";

		jQuery('#streetview').css('height', '474px');
		jQuery('#streetview').find('iframe').css('height', '474px');
		jQuery('#streetview').css('width', '300px');
		jQuery('#streetview').find('iframe').css('width', '300px');
	<?php endif;?>

		if (jQuery(window).width() < 999) {
			var src_val = jQuery('.column_2_cont<?php echo $cont_img;?> img').attr('src');
			var wzor = '\.';
			jQuery('.column_2_cont<?php echo $cont_img;?> img').attr('src', src_val.replace(wzor,"_2."));
		}
	});
</script>
<?php endif;?>
<div class="item-page">
	<div class="column_1_cont">
		<h2><?php echo $this->contact->name; ?></h2>
		<h3><?php echo $this->contact->address; ?></h3>
		<p><?php echo $this->contact->misc; ?></p>
		<?php if ($this->contact->telephone):?>
		<h3 class="h3_cont">tel. <?php echo nl2br($this->contact->telephone); ?></h3>
		<?php endif;?>
		<?php if ($this->contact->sortname1 == '1'):?>
		<p><a id="modal_film" href="film.html" rel="filmbox" onfocus="blur()"><?php echo JText::_('COM_CONTACT_FILM');?></a></p>
		<?php endif;?>
		<?php if ($this->contact->sortname2 == '1'):?>
		<p><a id="galleryLocal" href="javascript:;" onfocus="blur()"><?php echo JText::_('COM_CONTACT_GALLERY');?></a></p>
		<?php endif;?>
	</div>
	<?php if ($this->params->get('show_email_form') && ($this->contact->email_to || $this->contact->user_id)) : ?>
		<?php  echo $this->loadTemplate('form');  ?>
	<div class="column_2_cont">
		<?php echo JHtml::_('image', $this->contact->image, JText::_('COM_CONTACT_IMAGE_DETAILS'), array('align' => 'middle', 'style' => 'border: 6px solid #f8f7f5;')); ?>
	</div>
	<?php else:?>
	<div class="column_2_cont2">
	<?php if ($this->contact->fax):?>
		<div id="streetview">
			<iframe src="https://www.google.com/maps/embed?pb=<?php echo $this->contact->fax;?>" style="border:0" allowfullscreen></iframe>
		</div>
	<?php else:?>
		<?php echo JHtml::_('image', $this->contact->image, JText::_('COM_CONTACT_IMAGE_DETAILS'), array('align' => 'middle', 'style' => 'border: 6px solid #f8f7f5;')); ?>
	<?php endif;?>
	</div>
	<?php endif;?>
	<?php if ($this->contact->sortname3):?>
	<div class="column_3_cont">
		<div id="map">
			<iframe src="https://www.google.com/maps/embed?pb=<?php echo $this->contact->sortname3;?>" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
	<?php endif;?>
</div>
