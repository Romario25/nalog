<?php
/**
 * Created by PhpStorm.
 * User: Tq
 * Date: 11.10.2016
 * Time: 13:15
 */

namespace App\Services;


use DateInterval;
use DateTime;

class DeclarationYear implements IDeclaration
{

    private $dateService;

    public function __construct(IDateService $dateService)
    {
        $this->dateService = $dateService;
    }

    function getDate($locale, $dateFrom, $dateTo, $currentYear)
    {
        $dateFrom = new DateTime($dateFrom);
        $dateTo = new DateTime($dateTo);


        if($dateFrom < new DateTime('10.02.'.$currentYear)){

            if($dateFrom >= new DateTime('01.01.'.$currentYear)){
                $dateStart = $dateFrom;
            } else {
                $dateStart = new DateTime('01.01.'.$currentYear);
            }

            if($dateTo > new DateTime('10.02.'.$currentYear)){
                $dateEnd = new DateTime('10.02.'.$currentYear);
            } else {
                $dateEnd = $dateTo;
            }


            return trans('messages.declarationYearMessage', [
                'dateStart' => $dateStart->format('d.m.Y'),
                'dateEnd' => $this->dateService->getEndDate($dateEnd)
            ], 'messages', $locale).'<br />';
        }
        return "";
    }


}