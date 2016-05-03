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

class Gugliotti_Installments_Block_Adminhtml_Method_Grid extends Mage_Adminhtml_Block_Widget_Grid {
    
    public function __construct()
    {
        parent::__construct();
        $this->setId('methodGrid');
        $this->setDefaultSort('method_id');
        $this->setDefaultDir('ASC');
    }
    
    /**
     * Prepare data to fill in the table
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('gugliotti_installments/method')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
    
    /**
     * Prepare columns, defining each one
     */
    protected function _prepareColumns()
    {
        $this->addColumn('method_id', array(
            'header'    => Mage::helper('gugliotti_installments')->__('ID'),
            'align'     => 'left',
            'index'     => 'method_id',
            'type'      => 'number'
        ));

        $this->addColumn('method_name', array(
            'header'    => Mage::helper('gugliotti_installments')->__('Method Name'),
            'align'     => 'left',
            'index'     => 'method_name',
        ));

        $this->addColumn('max_installments', array(
            'header'    => Mage::helper('gugliotti_installments')->__('Max Installments'),
            'align'     => 'center',
            'index'     => 'max_installments',
        ));

        $this->addColumn('min_installment_value', array(
            'header'    => Mage::helper('gugliotti_installments')->__('Min Installment Value'),
            'align'     => 'center',
            'index'     => 'min_installment_value',
        ));

        $this->addColumn('interests', array(
            'header'    => Mage::helper('gugliotti_installments')->__('Interests'),
            'align'     => 'center',
            'index'     => 'interests',
        ));

        return parent::_prepareColumns();
    }
    
    /**
     * Prepare row URL, to link to edit action
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('method_id' => $row->getId()));
    }
}