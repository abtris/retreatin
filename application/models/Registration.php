<?php

/**
 * Registration
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class Registration extends BaseRegistration
{

    public static function saveRegistration($array)
    {
        $r  = new Registration();
        /*
        foreach ($array as $key => $value) {
            echo $key."<br>";
            $field = (string) $key;
            //$r->$field = $value;
            
        }
         
         */
        $r->name = $array['name'];
        $r->surname = $array['surname'];
        $r->email = $array['email'];
        $r->country =  $array['country'];
        $r->gar = $array['gar'];
        $r->membershipnumber = $array['membershipnumber'];
        $r->membershiptype =  $array['membershiptype'];
        $r->recording = $array['recording'];
        $r->wholeretreat = $array['wholeretreat'];
        $r->datefrom = $array['datefrom'];
        $r->dateto = $array['dateto'];
        $r->children = $array['children'];
        $r->childrencount = $array['childrencount'];
        $r->eat = $array['eat'];

        ZFCore_Utils::log('Add registration: '.var_export($array, true));
        $r->save();        
    }

}