<?php
/**
 * Created by PhpStorm.
 * User: Tq
 * Date: 11.10.2016
 * Time: 23:07
 */

namespace App\Services;


class DeclarationFactory
{


    public static function create($group){
        $class = null;
        $dateService = new DateService();
        switch($group){
            case 1: $class =  new DeclarationYear($dateService); break;
            case 2: $class =  new DeclarationYear($dateService); break;
            case 3: $class =  new DeclarationQuarter($dateService); break;
            case 4: $class = new DeclarationQuarter($dateService); break;
            case 5: $class = new DeclarationQuarter($dateService); break;
            case 6: $class = new DeclarationQuarter($dateService); break;
        }

        return $class;
    }

}