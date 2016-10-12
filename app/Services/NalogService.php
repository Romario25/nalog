<?php
/**
 * Created by PhpStorm.
 * User: Tq
 * Date: 11.10.2016
 * Time: 7:46
 */

namespace App\Services;


use DateTime;

class NalogService
{

    private $declaration;
    private $socContribution;
    private $singleTax;

    private $locale;
    private $dateFrom;
    private $dateTo;
    private $year;
    private $period;
    private $group;



    public function setData($locale, $group, $dateForm, $dateTo, $year, $period){
        $this->locale = $locale;
        $this->dateFrom = $dateForm;
        $this->dateTo = $dateTo;
        $this->year = $year;
        $this->period = $period;
        $this->group = $group;
        $this->declaration = DeclarationFactory::create($group);
        $this->socContribution = SocContributionFactory::create($group);
        $this->singleTax = SingleTaxFactory::create($group);


    }

    public function getData(){
        return [
            'declaration' => $this->declaration->getDate($this->locale, $this->dateFrom, $this->dateTo, $this->year),
            'esv' => $this->socContribution->getDate($this->locale, $this->dateFrom, $this->dateTo, $this->period),
            'singleTax' => $this->singleTax->getDate($this->locale, $this->dateFrom, $this->dateTo)
        ];
    }






}