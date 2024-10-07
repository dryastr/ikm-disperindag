<?php

namespace App\Http\Controllers\admin\manajemen;

use App\Http\Controllers\Controller;
use App\Models\IkmRegistration;
use App\Models\Notification;
use App\Exports\PanganExport;
use App\Exports\KerajinanExport;
use App\Exports\AnekaExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class IKMDisperindagAdminController extends Controller
{
    public function index(Request $request)
    {
        $jenisIndustri = $request->input('jenis_industri', 'pangan');

        $ikmRegistrations = IkmRegistration::where('status', '<>', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        $ikmData = [
            'pangan' => $ikmRegistrations->where('jenis_industri', 'Pangan'),
            'kerajinan' => $ikmRegistrations->where('jenis_industri', 'Kerajinan'),
            'aneka' => $ikmRegistrations->where('jenis_industri', 'Aneka'),
        ];

        return view('admin.ikm-admin.index', compact('ikmData', 'jenisIndustri'));
    }


    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:accepted,rejected',
            'keterangan' => 'nullable|string',
        ]);

        $registration = IkmRegistration::findOrFail($id);

        $registration->status = $request->status;
        $registration->keterangan = $request->keterangan ?? null;

        $registration->save();

        // Buat notifikasi
        $message = $request->status === 'accepted'
            ? 'Pendaftaran Anda telah diterima.'
            : 'Pendaftaran Anda telah ditolak. Keterangan: ' . $request->keterangan;

        Notification::create([
            'ikm_registration_id' => $registration->id,
            'message' => $message,
        ]);

        return redirect()->back()->with('success', 'Status berhasil diperbarui!');
    }

    public function exportPangan()
    {
        return Excel::download(new PanganExport, 'ikm_pangan.xlsx');
    }

    public function exportKerajinan()
    {
        return Excel::download(new KerajinanExport, 'ikm_kerajinan.xlsx');
    }

    public function exportAneka()
    {
        return Excel::download(new AnekaExport, 'ikm_aneka.xlsx');
    }
}
