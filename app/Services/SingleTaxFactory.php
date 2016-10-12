<?php
/**
 * Created by PhpStorm.
 * User: Tq
 * Date: 11.10.2016
 * Time: 23:26
 */

namespace App\Services;


class SingleTaxFactory
{
    public static function create($group){
        $class = null;
        switch($group){
            case 1 : $class = new SingleTax(); break;
            case 2 : $class = new SingleTax(); break;
            case 3 : $class = new SingleTaxQuarter(); break;
            case 4 : $class = new SingleTaxQuarter(); break;
            case 5 : $class = new SingleTaxQuarter(); break;
            case 6 : $class = new SingleTaxQuarter(); break;
        }

        return $class;
    }
}