<?php
/**
 * Created by PhpStorm.
 * User: Tq
 * Date: 11.10.2016
 * Time: 18:29
 */

namespace App\Services;


use DateInterval;
use DatePeriod;
use DateTime;

class DeclarationQuarter implements IDeclaration
{

    private $dateService;

    public function __construct(IDateService $dateService)
    {
        $this->dateService = $dateService;
    }

    function getDate($locale, $dateFrom, $dateTo, $currentYear)
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
                $dateEnd->modify('+ 40 days');
                $dateEnd = $this->dateService->getEndDate($dateEnd, false);
                $quarter = $month/3;

                $return .= trans('messages.declarationQuarterMessage', [
                    'quarter' => $quarter,
                    'dateEnd' => $dateEnd
                ], 'message', $locale).'<br />';
            }
        }

        return $return;
    }
}