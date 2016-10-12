<?php
/**
 * Created by PhpStorm.
 * User: Tq
 * Date: 11.10.2016
 * Time: 17:16
 */

namespace App\Services;


use DateInterval;
use DatePeriod;
use DateTime;

class SingleTax implements ISingleTax
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
            $dateEnd = $this->dateService->getEndDate(new DateTime('20.'.$date->format('m').'.'.$date->format('Y')), false);

            $return .= trans('messages.singleTaxMessage', [
                'dateStart' => trans('messages.'.$date->format('M'), [], 'message', $locale),
                'dateEnd' => $dateEnd
            ], 'message', $locale)."<br />";

        }

        return $return;
    }

}