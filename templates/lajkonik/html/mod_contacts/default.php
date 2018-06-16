<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_users_latest
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
// no direct access
defined('_JEXEC') or die;
include_once('components/com_contact/helpers/route.php');
?>

<?php if (!empty($names)) : 
	//shuffle($names);
	$cont = 0;
	$max= $params->get('shownumber');
	?>
	<?php foreach($names as $name) :
			if($cont>$max) break;
			//$url = "index.php?option=com_contact&view=contact&id=".$name->id.'&Itemid=102';
			$url = JRoute::_(ContactHelperRoute::getContactRoute($name->id.'-'.$name->alias, $name->catid));
			if (empty($name->image2)) $name->image2 = 'images/zaslepka.png';
		?>
		<a href="<?php echo $url;?>" class="standard-contact">
			<span class="top-title-4"><?php echo $name->name; ?></span>
			<span class="top-title-2"><?php echo $name->address; ?></span>
			<span class="top-title-3">tel. <?php echo $name->telephone; ?></span>
			<span class="top-img-sklepy"><img src="<?php echo $name->image2;?>" alt="<?php echo $name->name; ?>" /></span>
		</a>
	<?php $cont++; endforeach;  ?>
<?php endif; ?>
