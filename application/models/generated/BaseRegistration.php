<?php

/**
 * BaseRegistration
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $country
 * @property integer $gar
 * @property string $membershipnumber
 * @property integer $membershiptype
 * @property boolean $recording
 * @property boolean $wholeretreat
 * @property date $datefrom
 * @property date $dateto
 * @property boolean $children
 * @property integer $childrencount
 * @property boolean $eat
 * @property string $rem
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseRegistration extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('registration');
        $this->hasColumn('id', 'integer', 4, array(
             'primary' => true,
             'type' => 'integer',
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('surname', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('country', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('gar', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('membershipnumber', 'string', 20, array(
             'type' => 'string',
             'length' => '20',
             ));
        $this->hasColumn('membershiptype', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('recording', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('wholeretreat', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('datefrom', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('dateto', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('children', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('childrencount', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('eat', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('rem', 'string', null, array(
             'type' => 'string',
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