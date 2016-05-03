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

class Gugliotti_Installments_Block_Installments extends Mage_Catalog_Block_Product_View{
    
    /**
     * Verify if Is Active and Show on Product are set as yes
     */
    public function showOnProductPage()
    {
        if (Mage::helper('gugliotti_installments')->getConfigData('configuration/active') && Mage::helper('gugliotti_installments')->getConfigData('configuration/show_on_product'))
            return true;
    }
    
    /**
     * Calculate installments based on each method
     */
    public function getInstallments($price)
    {
        $collection = Mage::getModel('gugliotti_installments/method')->getCollection();
        $installmentsFinal = array();
        
        foreach ($collection as $method)
        {
            // verify the number of installments, facing min installment value
            $minInstallments = $price / $method->getMinInstallmentValue();
            $minInstallments = floor($minInstallments);
            
            $installments = ($minInstallments < $method->getMaxInstallments() ? $minInstallments : $method->getMaxInstallments());
            
            // calculate installment value without interests
            for ($i = 1; $i < ($installments + 1); $i++)
            {
                $installmentsFinal[$method->getMethodName()][$i] = $price / $i;
            }
        }
        return $installmentsFinal;
    }
}