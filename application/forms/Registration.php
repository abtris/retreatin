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
    public function __construct($lang = 'en')
    {          
        parent::__construct();
    $labels = array('en' => array('name' =>'Name', 
                                             'surname'=>'Surname',
                                             'email' => 'E-mail',
                                            'country'=>'Country',
                                            'gar' => 'Gar',
                                            'membershipnumber' => 'Membership number',
                                            'membershiptype' => 'Membership type',
                                            '--- please select your membership type  ---' =>'--- please select your membership type  ---',
                                            'Non-members'=>'Non-members',
                                            'Ordinary members' =>'Ordinary members',
                                            'Sustaining members' => 'Sustaining members',
                                            'Sustaining members (non Merigar)' => 'Sustaining members (non Merigar)',
                                            'Reduced members' => 'Reduced members',
                                            'Meritorious members' => 'Meritorious members',
                                            'recording' => 'I order recording of the Teaching',
                                            'yes' => 'yes',
                                            'no' => 'no',
                                            'wholeretreat'=>'I will take a part in the whole retreat',
                                            'datefrom'=>'I will take a part in the retreat by days from:',
                                            'dateto' => 'to',
                                            'children'=>'I come with children',
                                            'childrencount'=>'How many?',
                                            'eat'=>'I will eat in the Gar',
                                            'save'=>'Register',
                                            'garselect' => '--- please select your gar ---',
                                            'gar1' => 'Tsegyalgar East',
                                            'gar2' => 'Tsegyalgar West',
                                            'gar3' => 'Tashigar Sur',
                                            'gar4' => 'Tashigar Norte',
                                            'gar5' => 'Namgyalgar',
                                            'gar6' => 'Merigar East',
                                            'gar7' => 'Merigar West',
                                            'gar8' => 'Kunsangar'
                                            ),
                             'ru' => array('name' =>'Имя', 
                                             'surname'=>'Фамилия',
                                             'email' => 'E-mail',
                                            'country'=>'Страна',
                                            'gar' => 'Гар',
                                            'membershipnumber' => 'Членский номер',
                                            'membershiptype' => 'Тип членства',
                                            '--- please select your membership type  ---' =>'--- please select your membership type  ---',
                                            'Non-members'=>'Не член ДО',
                                            'Ordinary members' =>'Обычный член',
                                            'Sustaining members' => 'Поддерживающий член (Меригара)',
                                            'Sustaining members (non Merigar)' => 'Поддерживающий  член (других Гаров)',
                                            'Reduced members' => 'Сокращенный член',
                                            'Meritorious members' => 'Спонсор',
                                            'recording' => 'Я заказываю запись ретрита',
                                            'yes' => 'да',
                                            'no' => 'нет',
                                            'wholeretreat'=>'Я приму участие во всем ретрите:',
                                            'datefrom'=>'Я приму участие в ретрите по дням с:',
                                            'dateto' => 'по',
                                            'children'=>'Я приеду с детьми',
                                            'childrencount'=>'В количестве',
                                            'eat'=>'Я буду заказывать обеды в гаре',
                                            'save'=>'Зарегистрироваться',
                                            'garselect' => '--- please select your gar ---',
                                            'gar1' => 'Западный Цегъялгар',
                                            'gar2' => 'Восточный Цегъялгар',
                                            'gar3' => 'Южный Ташигар',
                                            'gar4' => 'Северный Ташигар',
                                            'gar5' => 'Намгъялгар',
                                            'gar6' => 'Восточный Меригар',
                                            'gar7' => 'Западный Меригар',
                                            'gar8' => 'Кунсангар'
                             )
    );                             
    

        $this->addElement('text', 'name', array(
            'Label' => $labels[$lang]['name'],
            'required' => true
        ));

        $this->addElement('text', 'surname', array(
            'Label' => $labels[$lang]['surname'],
            'required' => true
        ));

        $this->addElement('text', 'email', array(
                'Label' => $labels[$lang]['email'],
                'validators' => array(
                    'EmailAddress'
                ),
                'required' => true
        ));

        $this->addElement('text', 'country', array(
            'Label' => $labels[$lang]['country'],
            'required' => true
        ));


        $this->addElement('select', 'gar', array(
            'Label' => $labels[$lang]['gar'],
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
                'Label'=>$labels[$lang]['membershipnumber']
        ));

        $this->addElement('select', 'membershiptype', array(
                'Label' => $labels[$lang]['membershiptype'],
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
                'Label' => $labels[$lang]['recording'],
                'multioptions' => array(1 => $labels[$lang]['yes'], 2 => $labels[$lang]['no']),
                'required'=> true
        ));


        $this->addElement('radio', 'wholeretreat', array(
            'Label' => $labels[$lang]['wholeretreat'],
            'multioptions' => array(1 => $labels[$lang]['yes'], 2 => $labels[$lang]['no']),
            'required'=> true
        ));


        $this->addElement('text', 'datefrom',array (
                'Label' => $labels[$lang]['datefrom']
        ));

        $this->addElement('text', 'dateto',array (
                'Label' => $labels[$lang]['dateto']
        ));

        $this->addElement('radio', 'children', array(
                'Label' => $labels[$lang]['children'],
                'multioptions' => array(1 => $labels[$lang]['yes'], 2 => $labels[$lang]['no']),
                'required'=> true
        ));

        $this->addElement('text', 'childrencount', array (
                'Label' => $labels[$lang]['childrencount']
        ));

        $this->addElement('radio', 'eat', array(
                'Label' => $labels[$lang]['eat'],
                'multioptions' => array(1 => $labels[$lang]['yes'], 2 => $labels[$lang]['no']),
                'required'=> true
        ));
        
        $this->addElement('submit', 'save', array(
            'label' => $labels[$lang]['save'],
            'ignore' => true
        ));
    }
}

