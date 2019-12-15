<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecurrentsTask extends Controller
{
    public function ds_congviec_thuong_xuyen()
    {

        return view('ds_congviec_thuong_xuyen');
    }

    public function ds_congviec_thuong_xuyen_cty()
    {

        return view('ds_congviec_thuong_xuyen_cty');
    }
}
