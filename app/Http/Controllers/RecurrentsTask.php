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

    public function ds_congviec_thuong_xuyen_truong_phong($id)
    {

        return view('ds_congviec_thuong_xuyen_truong_phong', compact('id'));
    }

    public function ds_congviec_thuong_xuyen_truong_phong_chi_tiet($id)
    {

        return view('ds_congviec_thuong_xuyen_truong_phong_chi_tiet', compact('id'));
    }

    public function ds_congviec_thuong_xuyen_nhan_vien($id)
    {

        return view('ds_congviec_thuong_xuyen_nhan_vien', compact('id'));
    }

    public function ds_congviec_thuong_xuyen_cty()
    {

        return view('ds_congviec_thuong_xuyen_cty');
    }

    public function create()
    {
       
        return view('taocongviec');

    }

    public function employee($id)
    {
        return view('taocongviecnhanvien', compact('id'));
    }

    public function store(Request $request)
    {
        $start = new DateTime($request->start);
        $due = new DateTime($request->due);
        
        $data = $request->all();

        $data['start'] = $start->format(DateTime::ATOM); 
        $data['due'] = $due->format(DateTime::ATOM); 

        if (isset($data['doer'])) {
            $doer = explode(',', $data['doer']);
            $doer['id'] = $doer[0];
            $doer['name'] = $doer[1];
            unset($doer[0], $doer[1]);   
            $data['doer'] = $doer; 
        }

        if (isset($data['coDoers'])) {
            for ($i=0 ; $i < count($data['coDoers']) ; $i++) { 
                $coDoers = explode(',', $data['coDoers'][$i]); 
                $coDoers['id'] = $coDoers[0];
                $coDoers['name'] = $coDoers[1];
                unset($coDoers[0], $coDoers[1]);   
                $data['coDoers'][$i] = $coDoers; 
            }
        }

        if (isset($data['department'])) {
            $department = explode(',', $data['department']); 
            $department['id'] = $department[0];
            $department['name'] = $department[1];
            unset($department[0], $department[1]);   
            $data['department'] = $department;
        }

        if (isset($data['coDepartments'])) {
            for ($i=0 ; $i < count($data['coDepartments']) ; $i++) { 
                $coDepartments = explode(',', $data['coDepartments'][$i]); 
                $coDepartments['id'] = $coDepartments[0];
                $coDepartments['name'] = $coDepartments[1];
                unset($coDepartments[0], $coDepartments[1]);   
                $data['coDepartments'][$i] = $coDepartments; 
            }
        }

        if (isset($data['labels'])) {
            for ($i=0 ; $i < count($data['labels']) ; $i++) { 
                $labels = explode(',', $data['labels'][$i]); 
                // $labels['id'] = $labels[0];
                // $labels['name'] = $labels[1];
                // unset($labels[0], $labels[1]);   
                $data['labels'][$i] = $labels[0]; 
            }
        }
        
        $reviewer = explode(',', $data['reviewer']);
        $reviewer['id'] = $reviewer[0];
        $reviewer['name'] = $reviewer[1];
        unset($reviewer[0], $reviewer[1]);   
        $data['reviewer'] = $reviewer; 
        $data['creator'] = $reviewer;

        // dd($data);
        $dataRequest = json_encode($data);
       
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://falling-frog-38743.pktriot.net/api/recurrent-tasks/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataRequest);

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
        // dd($data, $result);

        // dd($data, isset($data['departmentId']), $data['departmentId']);
        if (isset($data['departmentId'])) {
            return redirect()->route('ds_congviec_thuong_xuyen_truong_phong_chi_tiet', [$data['departmentId']]);
        } else {
            return redirect()->route('ds_congviec_thuong_xuyen_cty');
        }
    }

    public function update($id, Request $request)
    {
        $data = $request->all();

        if (isset($data['start'])) {
            $start = new DateTime($data['start']);
            $data['start'] = $start->format(DateTime::ATOM); 
        }

        if (isset($data['due'])) {
            $start = new DateTime($data['due']);
            $data['due'] = $start->format(DateTime::ATOM); 
        }

        if (isset($data['finish'])) {
            $start = new DateTime($data['finish']);
            $data['finish'] = $start->format(DateTime::ATOM); 
        } 

        if (isset($data['doer'])) {
            $doer = explode(',', $data['doer']);
            $doer['id'] = $doer[0];
            $doer['name'] = $doer[1];
            unset($doer[0], $doer[1]);   
            $data['doer'] = $doer; 
        }

        if (isset($data['coDoers'])) {
            for ($i=0 ; $i < count($data['coDoers']) ; $i++) { 
                $coDoers = explode(',', $data['coDoers'][$i]); 
                $coDoers['id'] = $coDoers[0];
                $coDoers['name'] = $coDoers[1];
                unset($coDoers[0], $coDoers[1]);   
                $data['coDoers'][$i] = $coDoers; 
            }
        }

        if (isset($data['department'])) {
            $department = explode(',', $data['department']); 
            $department['id'] = $department[0];
            $department['name'] = $department[1];
            unset($department[0], $department[1]);   
            $data['department'] = $department;
        }

        if (isset($data['coDepartments'])) {
            for ($i=0 ; $i < count($data['coDepartments']) ; $i++) { 
                $coDepartments = explode(',', $data['coDepartments'][$i]); 
                $coDepartments['id'] = $coDepartments[0];
                $coDepartments['name'] = $coDepartments[1];
                unset($coDepartments[0], $coDepartments[1]);   
                $data['coDepartments'][$i] = $coDepartments; 
            }
        }

        if (isset($data['reviewer'])) {
            $reviewer = explode(',', $data['reviewer']);
            $reviewer['id'] = $reviewer[0];
            $reviewer['name'] = $reviewer[1];
            unset($reviewer[0], $reviewer[1]);   
            $data['reviewer'] = $reviewer;
        }

        if (isset($data['labels'])) {
            for ($i=0 ; $i < count($data['labels']) ; $i++) { 
                $labels = explode(',', $data['labels'][$i]); 
                $labels['id'] = $labels[0];
                $labels['name'] = $labels[1];
                unset($labels[0], $labels[1]);   
                $data['labels'][$i] = $labels; 
            }
        }

        if (isset($data['percentComplete']) && $data['percentComplete'] == 100) {
            $data['status'] = 'finished';
        }
        
        // dd($data);

        $data = json_encode($data);
       
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://falling-frog-38743.pktriot.net/api/recurrent-tasks/'.$id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
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

        return redirect()->route('ketqua_congviec', [$id]);

    }

    public function delete($id, Request $request) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://falling-frog-38743.pktriot.net/api/recurrent-tasks/'.$id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return redirect()->route('ds_congviec_thuong_xuyen', [$request->idDepartment]);
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
