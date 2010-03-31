<?php
/** 
 *  @package ##PACKAGE##
 *  @version ##VERSION##
 */

/**
 * Description of Registration
 * @package ##PACKAGE##
 * @author prskavecl
 */
class Application_Form_Registration extends Zend_Form
{
    public function init()
    {
        $this->addElement('text', 'name', array(
            'Label' => 'Name',
            'required' => true
        ));

        $this->addElement('text', 'surname', array(
            'Label' => 'Surname',
            'required' => true
        ));

        $this->addElement('text', 'email', array(
                'Label' => 'E-mail',
                'validators' => array(
                    'EmailAddress'
                ),
                'required' => true
        ));

        $this->addElement('text', 'country', array(
            'Label' => 'Country',
            'required' => true
        ));


        $this->addElement('select', 'gar', array(
            'Label' => 'Gar',
            'multioptions' => array(
                0 => '--- please select your gar ---',
                1 => 'Tsegyalgar East',
                2 => 'Tsegyalgar West',
                3 => 'Tashigar Sur',
                4 => 'Tashigar Norte',
                5 => 'Namgyalgar',
                6 => 'Merigar East',
                7 => 'Merigar West',
                8 => 'Kunsangar'
            )
        ));

        $this->addElement('text', 'membershipnumber', array(
                'Label'=>'Membership number'
        ));

        $this->addElement('select', 'membershiptype', array(
                'Label' => 'Membership type',
                'multioptions' => array(
                    0 => '--- please select your membership type  ---',
                    1 => 'Non-members',
                    2 => 'Ordinary members',
                    3 => 'Sustaining members',
                    4 => 'Sustaining members (non Merigar)',
                    5 => 'Reduced members',
                    6 => 'Meritorious members')
        ));

        $this->addElement('radio', 'recording', array(
                'Label' => 'I order recording of the Teaching',
                'multioptions' => array(1 => 'yes', 2 => 'no'),
                'required'=> true
        ));


        $this->addElement('radio', 'wholeretreat', array(
            'Label' => 'I will take a part in the whole retreat',
            'multioptions' => array(1 => 'yes', 2 => 'no'),
            'required'=> true
        ));


        $this->addElement('text', 'datefrom',array (
                'Label' => 'I will take a part in the retreat by days from:'
        ));

        $this->addElement('text', 'dateto',array (
                'Label' => 'to:'
        ));

        $this->addElement('radio', 'children', array(
                'Label' => 'I come with children',
                'multioptions' => array(1 => 'yes', 2 => 'no'),
                'required'=> true
        ));

        $this->addElement('text', 'childrencount', array (
                'Label' => 'How many?'
        ));

        $this->addElement('radio', 'eat', array(
                'Label' => 'I will eat in the Gar',
                'multioptions' => array(1 => 'yes', 2 => 'no'),
                'required'=> true
        ));
        
        $this->addElement('submit', 'save', array(
            'label' => 'Register',
            'ignore' => true
        ));
    }
}

