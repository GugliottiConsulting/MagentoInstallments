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

class Gugliotti_Installments_Block_Adminhtml_Method_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {
    
    /**
     * Prepare form to edit an entry
     */
    protected function _prepareForm()
    {
        $model = Mage::registry('method');
        $form = new Varien_Data_Form(
            array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save', array('method_id' => $this->getRequest()->getParam('method_id'))),
                'method' => 'post',
                'enctype' => 'multipart/form-data'
            )
        );
        $form->setHtmlIdPrefix('method_');

        $fieldset = $form->addFieldset('base_fieldset', array('legend'=>Mage::helper('gugliotti_installments')->__('Method Information')));

        $fieldset->addField('method_name', 'text', array(
            'name'      => 'method_name',
            'label'     => Mage::helper('gugliotti_installments')->__('Method Name'),
            'title'     => Mage::helper('gugliotti_installments')->__('Method Name'),
            'required'  => true
        ));

        $fieldset->addField('max_installments', 'text', array(
            'name'      => 'max_installments',
            'label'     => Mage::helper('gugliotti_installments')->__('Max Installments'),
            'title'     => Mage::helper('gugliotti_installments')->__('Max Installments'),
            'required'  => true
        ));

        $fieldset->addField('min_installment_value', 'text', array(
            'name'      => 'min_installment_value',
            'label'     => Mage::helper('gugliotti_installments')->__('Min Installment Value'),
            'title'     => Mage::helper('gugliotti_installments')->__('Min Installment Value'),
            'required'  => true
        ));
        
        $fieldset->addField('interests', 'text', array(
            'name'      => 'interests',
            'label'     => Mage::helper('gugliotti_installments')->__('Interests'),
            'title'     => Mage::helper('gugliotti_installments')->__('Interests'),
            'required'  => true
        ));

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}