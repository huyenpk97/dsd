<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use DateTime;

class RecurrentsTask extends Controller
{
    public function ds_congviec_thuong_xuyen($id)
    {

        return view('ds_congviec_thuong_xuyen', compact('id'));
    }

    public function ds_congviec_thuong_xuyen_cty()
    {

        return view('ds_congviec_thuong_xuyen_cty');
    }

    public function create()
    {
       
        return view('taocongviec');

    }

    public function store(Request $request)
    {
        
        $start = new DateTime($request->start);
        $finish = new DateTime($request->finish);

        
        $data = $request->all();

        $data['start'] = $start->format(DateTime::ATOM); 
        $data['finish'] = $finish->format(DateTime::ATOM); 

        $doer = explode(',', $data['doer']);
        $doer['id'] = $doer[0];
        $doer['name'] = $doer[1];
        unset($doer[0], $doer[1]);   
        $data['doer'] = $doer; 
        
        $reviewer = explode(',', $data['reviewer']);
        $reviewer['id'] = $reviewer[0];
        $reviewer['name'] = $reviewer[1];
        unset($reviewer[0], $reviewer[1]);   
        $data['reviewer'] = $reviewer; 
        $data['creator'] = $reviewer;

        

        $department = explode(',', $data['department']); 
        $department['id'] = $department[0];
        $department['name'] = $department[1];
        unset($department[0], $department[1]);   
        $data['department'] = $department; 

        if (isset($data['coDepartments'])) {
            for ($i=0 ; $i < count($data['coDepartments']) ; $i++) { 
                $coDepartments = explode(',', $data['coDepartments'][$i]); 
                $coDepartments['id'] = $coDepartments[0];
                $coDepartments['name'] = $coDepartments[1];
                unset($coDepartments[0], $coDepartments[1]);   
                $data['coDepartments'][$i] = $coDepartments; 
               }
        }
        

        $data = json_encode($data);
       
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://falling-frog-38743.pktriot.net/api/recurrent-tasks/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , false);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return redirect()->route('ds_congviec_thuong_xuyen_cty');

    }

    public function show($id){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://falling-frog-38743.pktriot.net/api/recurrent-tasks/' . $id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


        $headers = array();
        $headers[] = 'Accept: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , false);

        $result = curl_exec($ch);
        $recurrent_task = json_decode($result);

        if (isset($recurrent_task->error)) {
           $errors = json_decode($result);
            return view('errors.404', compact('errors'));
        }
        curl_close($ch);


        return view('ketqua_congviec', compact('recurrent_task'));
    }
}
