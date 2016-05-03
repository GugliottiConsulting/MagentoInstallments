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

class Gugliotti_Installments_Helper_Data extends Mage_Core_Helper_Abstract {
    
    /**
     * Method to get core_config_data values
     * 
     * @param $key string
     * @return string
     */
    public function getConfigData($key)
    {
        return Mage::getStoreConfig('gugliotti_installments/' . $key);
    }
}