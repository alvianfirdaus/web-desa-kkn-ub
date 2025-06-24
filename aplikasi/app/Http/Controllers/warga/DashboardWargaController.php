<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardWargaController extends Controller
{
    public function index()
    {        
        return view('halaman_warga.dashboard');
    }
}
