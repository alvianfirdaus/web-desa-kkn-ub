<?php

namespace App\Http\Controllers\desa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardDesaController extends Controller
{
    public function index()
    {        
        return view('halaman_desa.manajemen_data.dashboard');
    }
}
