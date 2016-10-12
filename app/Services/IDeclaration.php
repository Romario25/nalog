<?php
/**
 * Created by PhpStorm.
 * User: Tq
 * Date: 11.10.2016
 * Time: 13:11
 */

namespace App\Services;


interface IDeclaration
{
    function getDate($locale, $dateFrom, $dateTo, $currentYear);
}