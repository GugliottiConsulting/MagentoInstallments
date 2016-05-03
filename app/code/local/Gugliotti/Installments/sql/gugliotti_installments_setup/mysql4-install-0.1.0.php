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

$installer = $this;
$installer->startSetup();
$installer->run("
CREATE TABLE IF NOT EXISTS {$this->getTable('gugliotti_installments_method')} (
    `method_id` int(11) NOT NULL AUTO_INCREMENT,
    `method_name` VARCHAR(24) NOT NULL,
    `max_installments`INT(11) NOT NULL,
    `min_installment_value` VARCHAR(24) NOT NULL,
    `interests` VARCHAR(24) NOT NULL,
    PRIMARY KEY(`method_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;"
);
$installer->endSetup();