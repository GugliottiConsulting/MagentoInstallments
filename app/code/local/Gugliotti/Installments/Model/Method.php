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

class Gugliotti_Installments_Model_Method extends Mage_Core_Model_Abstract {
    
    public function _construct()
    {
        $this->_init('gugliotti_installments/method');
    }
}