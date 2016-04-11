<?php //
/**
 * Created by PhpStorm.
 * User: Riyada
 * Date: 06/11/2015
 * Time: 13:43
 */ 
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$attribute  = array(
    'type'          => 'text',
    'backend_type'  => 'text',
    'frontend_input' => 'text',
    'is_user_defined' => true,
    'label'         => 'Delivery date',
    'visible'       => true,
    'required'      => false,
    'user_defined'  => false,
    'searchable'    => false,
    'filterable'    => false,
    'comparable'    => false,
    'default'       => ''
);

$installer->startSetup();


$table = new Varien_Db_Ddl_Table();
$table->setName($this->getTable('riyada_imei/riyada_provider'));

$table->addColumn(
    'provider_id',
    Varien_Db_Ddl_Table::TYPE_INTEGER,
    10,
    array(
        'auto_increment' => true,
        'unsigned' => true,
        'nullable'=> false,
        'primary' => true
    )
);
$table->addColumn(
    'created_at',
    Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
    null,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'updated_at',
    Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
    null,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'name',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'email',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => true,
    )
);
$table->addColumn(
    'website',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => true,
    )
);
$table->addColumn(
    'telephone',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    array(
        'nullable' => true,
    )
);
$table->addColumn(
    'description',
    Varien_Db_Ddl_Table::TYPE_TEXT,
    null,
    array(
        'nullable' => true,
    )
);


/**
 * These two important lines are often missed.
 */
$table->setOption('type', 'InnoDB');
$table->setOption('charset', 'utf8');

/**
 * Create the table!
 */
$this->getConnection()->createTable($table);


$installer->addAttribute('order', 'delivery_date', $attribute);





$installer->endSetup();