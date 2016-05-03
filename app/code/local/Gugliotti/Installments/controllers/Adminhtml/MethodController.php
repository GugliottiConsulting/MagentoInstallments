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

class Gugliotti_Installments_Adminhtml_MethodController extends Mage_Adminhtml_Controller_Action {
    
    /**
     * Corresponds to storeURL/module/method/index
     */
    public function indexAction()
    {
        $this->_title($this->__('Gugliotti'))
            ->_title($this->__('Methods'));
        $this->loadLayout()
            ->_setActiveMenu('gugliotti_installments/methods');            
        $this->renderLayout();
    }
    
    /**
     * Just forwarding to editAction
     */
    public function newAction()
    {
        $this->_forward('edit');
    }
    
    /**
     * Corresponds to storeURL/module/method/edit
     */
    public function editAction()
    {
        $this->_title($this->__('Gugliotti'))
            ->_title($this->__('Methods'))
            ->_title($this->__('Manage method'));
        
        $id = $this->getRequest()->getParam('method_id');
        $model = Mage::getModel('gugliotti_installments/method');
        
        if ($id) {
            $model->load($id);
            if (! $model->getMethodId()) {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('gugliotti_installments')->__('This method could not be found.'));
                $this->_redirect('*/*/');
                return;
            }
        }

        $this->_title($model->getId() ? $model->getTitle() : $this->__('New Method'));
        $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
        
        if (! empty($data))
            $model->setData($data);

        Mage::register('method', $model);
        $this->loadLayout()
            ->_addBreadcrumb($id ? Mage::helper('gugliotti_installments')->__('Edit Method') : Mage::helper('gugliotti_installments')->__('New Method'), $id ? Mage::helper('gugliotti_installments')->__('Edit Method') : Mage::helper('gugliotti_installments')->__('New Method'))
            ->renderLayout();
    }

    /**
     * Corresponds to storeURL/module/method/save
     */
    public function saveAction()
    {
        $data = $this->getRequest()->getPost();
        if (!$data) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('gugliotti_installments')->__('No data has been received'));
            $this->_redirect('*/*/');
            return;
        }

        $id = (int) $this->getRequest()->getParam('method_id');
        $model = Mage::getModel('gugliotti_installments/method');

        if($id) {
            $model->load($id);
            if (!$model->getMethodId()) {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('gugliotti_installments')->__('This method could not be found.'));
                $this->_redirect('*/*/');
                return;
            }
        }

        foreach ($data as $key => $value) {
            $model->setData($key, $value);
        }

        try {
            $model->save();
            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('gugliotti_installments')->__('The method has been saved.'));
            Mage::getSingleton('adminhtml/session')->setFormData(false);
            $this->_redirect('*/*/');
            return;
        } catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            Mage::getSingleton('adminhtml/session')->setFormData($data);
            $this->_redirect('*/*/edit', array('method_id' => $this->getRequest()->getParam('method_id')));
            return;
        }
        $this->_redirect('*/*/');
    }

    /**
     * Corresponds to storeURL/module/method/delete
     */
    public function deleteAction()
    {
        $id = $this->getRequest()->getParam('method_id');
        if (!$id) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('gugliotti_installments')->__('No method was found'));
            $this->_redirect('*/*/');
            return;
        }

        $model = Mage::getModel('gugliotti_installments/method')->load($id);

        try {
            $model->delete();
            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('gugliotti_installments')->__('The method has been deleted.'));
            $this->_redirect('*/*/');
            return;
        } catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            $this->_redirect('*/*/edit', array('method_id' => $id));
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('gugliotti_installments')->__('Unable to find a method to delete.'));
        $this->_redirect('*/*/');
    }
    
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('gugliotti_installments');
    }
}