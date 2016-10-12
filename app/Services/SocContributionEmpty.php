<?php
/**
 * Created by PhpStorm.
 * User: Tq
 * Date: 11.10.2016
 * Time: 23:24
 */

namespace App\Services;


class SocContributionEmpty implements ISocContribution
{

    function getDate($locale, $dateFrom, $dateTo, $period)
    {
        return "";
    }
}