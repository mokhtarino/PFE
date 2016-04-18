<?php

$this->startSetup();
$this->run("
        
        CREATE TABLE IF NOT EXISTS `riyada_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `id_provider` int(11) NOT NULL,
  `price` double NOT NULL,
  `variety` varchar(150) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_product` (`id_product`,`id_provider`,`variety`,`availability`),
  UNIQUE KEY `id_product_2` (`id_product`,`id_provider`,`price`,`variety`),
  UNIQUE KEY `id_product_3` (`id_product`,`id_provider`,`price`,`variety`),
  UNIQUE KEY `id_product_4` (`id_product`,`id_provider`,`variety`),
  UNIQUE KEY `id_product_5` (`id_product`,`id_provider`,`price`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;"
        
        
        
        );
$this->endSetup();