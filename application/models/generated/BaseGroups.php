<?php

/**
 * BaseGroups
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $idGroup
 * @property string $name
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseGroups extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('groups');
        $this->hasColumn('idGroup', 'integer', 4, array(
             'primary' => true,
             'type' => 'integer',
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_general_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable(array(
             'created' => 
             array(
              'name' => 'created',
             ),
             'updated' => 
             array(
              'name' => 'updated',
             ),
             ));
        $this->actAs($timestampable0);
    }
}