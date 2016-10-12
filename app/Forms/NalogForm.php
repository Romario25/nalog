<?php
/**
 * Created by PhpStorm.
 * User: Tq
 * Date: 11.10.2016
 * Time: 7:31
 */

namespace App\Forms;


use Validator;

class NalogForm
{
    public function validate(array $data){
        return Validator::make($data, [
            'group' => 'required',
            'dateFrom' => 'required|Period',
        ]);
    }
}