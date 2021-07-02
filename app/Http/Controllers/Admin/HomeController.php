<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    public function index()
    {
        $Doctores = Http::get('https://parsehub.com/api/v2/runs/tWsH3KTxevNf/data?api_key=t_7sgyuHMfao');
        $ArrayD= $Doctores->json();
        return view('admin.index',compact('ArrayD'));
    }
}
