<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.tooltip');

$field1 = $this->form->getField('contact_zgoda_przetwarzanie');
$label1 = strip_tags($field1->label);
$field2 = $this->form->getField('contact_zgoda_przesylanie');
$label2 = strip_tags($field2->label);
?>
<div class="contact-form">
	<form id="contact-form" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-validate form-vertical">
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('contact_name'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('contact_name'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('contact_email'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('contact_email'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('contact_message'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('contact_message'); ?></div>
			</div>
			<div class="control-group zgoda">
				<div class="controls"><label class="checkbox"><?php echo $this->form->getInput('contact_zgoda_przetwarzanie'); ?> <?php echo $label1; ?></label></div>
			</div>
			<div class="control-group zgoda">
				<div class="controls"><label class="checkbox"><?php echo $this->form->getInput('contact_zgoda_przesylanie'); ?> <?php echo $label2; ?></label></div>
			</div>
			<div class="form-actions"><button class="btn btn-primary validate" type="submit" onfocus="blur()"><?php echo JText::_('COM_CONTACT_CONTACT_SEND'); ?></button>
				<input type="hidden" name="option" value="com_contact" />
				<input type="hidden" name="task" value="contact.submit" />
				<input type="hidden" name="return" value="<?php echo $this->return_page;?>" />
				<input type="hidden" name="id" value="<?php echo $this->contact->slug; ?>" />
				<?php echo JHtml::_('form.token'); ?>
			</div>
	</form>
</div>
