<?php

namespace App\Http\Controllers;

use App\Models\Mitigations;
use App\Models\Risk;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        return view('dashboard',[
            'status' => Status::count(),
            'risk' => Risk::count(),
            'mitigation' => Mitigations::count(),
        ]);
    }
}
