<?php
/**
 * Created by PhpStorm.
 * User: Tq
 * Date: 11.10.2016
 * Time: 15:52
 */

namespace App\Services;


use DateInterval;
use DatePeriod;
use DateTime;

class SocContribution implements ISocContribution
{

    private $dateService;

    public function __construct(IDateService $dateService)
    {
        $this->dateService = $dateService;
    }

    public function getDate($locale, $dateFrom, $dateTo, $period)
    {

        if($period == 1){
            return $this->periodMonth($locale, $dateFrom, $dateTo);
        }
        return $this->periodQuarter($locale, $dateFrom, $dateTo);
    }

    private function periodMonth($locale, $dateFrom, $dateTo){
        $start = new DateTime($dateFrom);
        $interval = new DateInterval('P1D');
        $end = new DateTime($dateTo);
        $period = new DatePeriod($start, $interval, $end);
        $return = '';
        foreach ($period as $date) {
            if($date->format('d') == 20){
                $dateEnd = $this->dateService->getEndDate($date, false);

                $return .= trans('messages.subContributionMonthMessage', [
                    'month' => trans('messages.'.$date->sub(new DateInterval('P1M'))->format('M'), [], 'message', $locale),
                    'dateEnd' => $dateEnd
                ], 'message', $locale).'<br />';
            }
        }

        return $return;
    }

    private function periodQuarter($locale, $dateFrom, $dateTo){

        // 3, 6, 9 12
        $start = new DateTime($dateFrom);
        $interval = new DateInterval('P1D');
        $end = new DateTime($dateTo);
        $period = new DatePeriod($start, $interval, $end);
        $return = '';
        foreach ($period as $date) {
            $month  = $date->format('m');
            if($date->format('d') == 20 && in_array($month, [3, 6, 9, 12])){
                $dateEnd = $this->dateService->getEndDate($date);
                $quarter = $month/3;

                $return .= trans('messages.subContributionQuarterMessage', [
                        'quarter' => $quarter,
                        'dateEnd' => $dateEnd
                    ], 'message', $locale).'<br />';
            }
        }
        return $return;
    }


}