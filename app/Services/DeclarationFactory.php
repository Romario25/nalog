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
        switch($group){
            case 1: $class =  new DeclarationYear(); break;
            case 2: $class =  new DeclarationYear(); break;
            case 3: $class =  new DeclarationQuarter(); break;
            case 4: $class = new DeclarationQuarter(); break;
            case 5: $class = new DeclarationQuarter(); break;
            case 6: $class = new DeclarationQuarter(); break;
        }

        return $class;
    }

}