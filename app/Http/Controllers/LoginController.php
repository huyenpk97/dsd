<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        // dd(json_encode($credentials));

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api-ptpmpt-18.herokuapp.com/api/auth/login');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($credentials));

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
    
        $user = json_decode($result);
        // dd($user);
        
        $userId = $user->user->userId;
        // dd($userId);

        $userDepartment = $this->get_web_page("http://18.217.21.235:8083/api/v1/userOrganization/findByUserId?userId=" . $userId);
        // dd($userDepartment[0]);
        
        if ($userDepartment[0]->positionId === 1 || $userDepartment[0]->positionId === 2) {
            return redirect()->route('ds_congviec_thuong_xuyen_cty');
        } elseif ($userDepartment[0]->positionId === 3) {
            return redirect()->route('ds_congviec_thuong_xuyen_truong_phong', [$userDepartment[0]->organizationId]);
        } else {
            return redirect()->route('thongke_congviec');
        }

    }

    public function get_web_page($url) {
        $options = array(
            CURLOPT_RETURNTRANSFER => true,   // return web page
            CURLOPT_HEADER         => false,  // don't return headers
            CURLOPT_FOLLOWLOCATION => true,   // follow redirects
            CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
            CURLOPT_ENCODING       => "",     // handle compressed
            CURLOPT_USERAGENT      => "test", // name of client
            CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
            CURLOPT_TIMEOUT        => 120,    // time-out on response
        ); 

        $ch = curl_init($url);
        curl_setopt_array($ch, $options);

        $content  = curl_exec($ch);

        curl_close($ch);

        return json_decode($content);
    }
}
