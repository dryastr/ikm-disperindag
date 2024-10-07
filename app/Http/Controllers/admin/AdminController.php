<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\IkmRegistration;
use App\Models\Complaint;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $panganCount = IkmRegistration::where('jenis_industri', 'Pangan')->count();
        $kerajinanCount = IkmRegistration::where('jenis_industri', 'Kerajinan')->count();
        $anekaCount = IkmRegistration::where('jenis_industri', 'Aneka')->count();

        $complaintsCount = Complaint::count();

        return view('admin.dashboard', compact('panganCount', 'kerajinanCount', 'anekaCount', 'complaintsCount'));
    }
}
