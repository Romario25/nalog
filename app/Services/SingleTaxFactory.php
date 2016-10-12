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
        $dateService = new DateService();
        switch($group){
            case 1 : $class = new SingleTax($dateService); break;
            case 2 : $class = new SingleTax($dateService); break;
            case 3 : $class = new SingleTaxQuarter($dateService); break;
            case 4 : $class = new SingleTaxQuarter($dateService); break;
            case 5 : $class = new SingleTaxQuarter($dateService); break;
            case 6 : $class = new SingleTaxQuarter($dateService); break;
        }

        return $class;
    }
}