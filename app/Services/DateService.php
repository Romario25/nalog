<?php
/**
 * Created by PhpStorm.
 * User: Tq
 * Date: 11.10.2016
 * Time: 18:15
 */

namespace App\Services;


use App\Holiday;
use DateInterval;
use DateTime;

class DateService
{
    protected function validateEndDate(DateTime $date){

        $day = $date->format('w');
        if($day == 0 || $day == 6 ){
            return true;
        }
        return false;
    }

    protected function validateHoliday(DateTime $date){
        // Получим все праздники
        $holidays = Holiday::all();
        foreach ($holidays as $holiday){
            if($date->format('d') == $holiday->day && $date->format('m') == $holiday->month){
                return true;
            }
        }
        return false;
    }

    public function getEndDate(DateTime $date, $type = true){
        $endDate = $date;
        if($this->validateEndDate($endDate) || $this->validateHoliday($endDate)){
            while($this->validateEndDate($endDate) || $this->validateHoliday($endDate)){
                if($type){
                    $endDate = $endDate->add(new DateInterval('P1D'));
                } else {
                    $endDate = $endDate->sub(new DateInterval('P1D'));
                }
            }
        }
        return $endDate->format('d.m.Y');
    }
}