<?php
/**
 * Created by PhpStorm.
 * User: Tq
 * Date: 11.10.2016
 * Time: 17:52
 */

namespace App\Services;


use DateInterval;
use DatePeriod;
use DateTime;

class SingleTaxQuarter implements ISingleTax
{

    private $dateService;

    public function __construct()
    {
        $this->dateService = new DateService();
    }


    function getDate($locale, $dateFrom, $dateTo)
    {
        $start = new DateTime($dateFrom);
        $interval = new DateInterval('P1M');
        $end = new DateTime($dateTo);
        $period = new DatePeriod($start, $interval, $end);
        $return = '';
        foreach ($period as $date) {
            $month  = $date->format('m');
            if(in_array($month, [3, 6, 9, 12])){
                $dateEnd = new DateTime('20.'.$date->format('m').'.'.$date->format('Y'));
                $dateEnd->modify('+ 50 days');
                $dateEnd = $this->dateService->getEndDate($dateEnd, false);
                $quarter = $month/3;

                $return .= trans('messages.singleTaxQuarterMessage', [
                    'quarter' => $quarter,
                    'dateEnd' => $dateEnd,
                ], 'message', $locale)."<br />";
            }


        }

        return $return;
    }


}