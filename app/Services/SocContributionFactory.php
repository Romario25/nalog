<?php
/**
 * Created by PhpStorm.
 * User: Tq
 * Date: 11.10.2016
 * Time: 23:19
 */

namespace App\Services;


class SocContributionFactory
{
    public static function create($group){
        $class = null;
        $dateService = new DateService();
        switch($group){
            case 1: $class = new SocContribution($dateService); break;
            case 2: $class =  new SocContribution($dateService); break;
            case 3: $class =  new SocContribution($dateService); break;
            case 4: $class = new SocContributionEmpty(); break;
            case 5: $class = new SocContribution($dateService); break;
            case 6: $class = new SocContributionEmpty(); break;
        }

        return $class;
    }
}