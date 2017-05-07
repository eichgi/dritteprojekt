<?php

namespace App\Http\Controllers;

use App\Language;
use App\Resource;
use App\Star;
use App\User;
use Illuminate\Http\Request;

class JokerController extends Controller
{
    //

    public function getWhatIWant()
    {

        $curl = curl_init('https://api.github.com/zen');
        $response = curl_exec($curl);
        /*curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.1) Gecko/2008070208 Firefox/3.0.1");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Accept-Language: es-es,en"));*/
        curl_close($curl);
        var_dump($response);

        /*$ch = curl_init("https://api.github.com/users/defunkt");
        $fp = fopen("example.txt", "w");

        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        curl_exec($ch);
        curl_close($ch);
        fclose($fp);*/
    }

    public function joker()
    {
        /*$resourcesByUser = User::find(1)->resources();
        dd($resourcesByUser);*/

        /*$recurso = Resource::find(3);
        dd($recurso->user);*/

        /*$recurso = Resource::find(2);
        dd($recurso->stars);*/

        $star = Star::find(1);
        dd($star->resource);

        /*$recurso = Resource::withCount('name')->get();
        dd($recurso->name_count);*/
    }
}
