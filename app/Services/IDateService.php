<?php
/**
 * Created by PhpStorm.
 * User: Tq
 * Date: 12.10.2016
 * Time: 12:50
 */

namespace App\Services;


use DateTime;

interface IDateService
{
    function getEndDate(DateTime $date, $type = true);
}