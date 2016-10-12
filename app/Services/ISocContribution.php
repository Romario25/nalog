<?php
/**
 * Created by PhpStorm.
 * User: Tq
 * Date: 11.10.2016
 * Time: 13:13
 */

namespace App\Services;


interface ISocContribution
{
    function getDate($locale, $dateFrom, $dateTo, $period);
}