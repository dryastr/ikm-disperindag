<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\IkmRegistration;
use App\Models\Complaint;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $panganCount = IkmRegistration::where('jenis_industri', 'Pangan')
            ->where('created_by', $userId)
            ->count();

        $kerajinanCount = IkmRegistration::where('jenis_industri', 'Kerajinan')
            ->where('created_by', $userId)
            ->count();

        $anekaCount = IkmRegistration::where('jenis_industri', 'Aneka')
            ->where('created_by', $userId)
            ->count();

        $complaintsCount = Complaint::where('created_by', $userId)->count();

        return view('user.dashboard', compact('panganCount', 'kerajinanCount', 'anekaCount', 'complaintsCount'));
    }
}
