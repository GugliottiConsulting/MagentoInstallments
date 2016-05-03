<?php

/**
 * Module to show installments on frontend
 * 
 * This is a simple module, to be used on trainings. You should not use this module as-is
 * 
 * @author Andre Gugliotti <andre@gugliotti.com.br>
 * @version 0.1.0
 * @package Training
 */

class Gugliotti_Installments_Block_Adminhtml_Method_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
    
    public function __construct()
    {
        $this->_objectId = 'method_id';
        $this->_blockGroup = 'gugliotti_installments';
        $this->_controller = 'adminhtml_method';

        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('gugliotti_installments')->__('Save Method'));
        $this->_updateButton('delete', 'label', Mage::helper('gugliotti_installments')->__('Delete Method'));
    }

    /**
     * Prepare edit page header
     */
    public function getHeaderText()
    {
        if (!Mage::registry('method')->getMethodId()) {
            return Mage::helper('gugliotti_installments')->__('New Method');
        }
        return Mage::helper('gugliotti_installments')->__("Edit Method '%s'", $this->escapeHtml(Mage::registry('method')->getMethodName()));
    }
}