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

class Gugliotti_Installments_Block_Adminhtml_Method extends Mage_Adminhtml_Block_Widget_Grid_Container {
    
    public function __construct()
    {
        $this->_blockGroup = 'gugliotti_installments';
        $this->_controller = 'adminhtml_method';
        $this->_headerText = Mage::helper('gugliotti_installments')->__('Manage Methods');
        $this->_addButtonLabel = Mage::helper('gugliotti_installments')->__('Add New Method');
        parent::__construct();
    }
}