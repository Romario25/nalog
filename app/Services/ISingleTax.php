<?php
/**
 * Created by PhpStorm.
 * User: Tq
 * Date: 11.10.2016
 * Time: 17:12
 */

namespace App\Services;


interface ISingleTax
{
    function getDate($locale, $dateFrom, $dateTo);
}
