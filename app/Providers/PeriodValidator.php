<?php
/**
 * Created by PhpStorm.
 * User: Tq
 * Date: 11.10.2016
 * Time: 7:37
 */

namespace App\Providers;


use App\Services\NalogService;
use DateTime;
use Illuminate\Validation\Validator;

class PeriodValidator extends Validator
{





    public function validatePeriod ($attribute, $value, $parameters)
    {



        if($attribute == 'dateFrom' && isset($parameters) ){

            if($parameters[0] == 'dateTo' && !$this->compareDate($value, $parameters[1])){
                return true;
            }
        }


        return false;
    }

    /**
     *
     * Метод сравнивает две даты. Если первая дата больше второй вернет true , иначе fasle
     *
     * @param $date1
     * @param $date2
     * @return bool
     */
    public function compareDate($date1, $date2){

        $d1 = new DateTime($date1);
        $d2 = new DateTime($date2);
        if($d1 > $d2){
            return true;
        }
        return false;
    }
}