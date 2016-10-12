<?php

namespace App\Http\Controllers;

use App\Forms\NalogForm;
use App\Http\Requests\NalogFormRequest;
use App\Services\NalogService;
use Illuminate\Foundation\Testing\HttpException;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;

class NalogController extends Controller
{
    private $service;


    public function __construct(NalogService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request){

        return view('nalog.index');
    }

    public function send(NalogFormRequest $request){

        if($request->all()){

                $this->service->setData(
                    $request->get('locale'),
                    $request->get('group'),
                    $request->get('dateFrom'),
                    $request->get('dateTo'),
                    $request->get('year'),
                    $request->get('period')
                );


                return response()->json($this->service->getData(), 200);
        }
        throw new HttpException(404);
    }


}
