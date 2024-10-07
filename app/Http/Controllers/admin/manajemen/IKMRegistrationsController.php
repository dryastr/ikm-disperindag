<?php

namespace App\Http\Controllers\admin\manajemen;

use App\Http\Controllers\Controller;
use App\Models\IkmRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IKMRegistrationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        $ikmRegistrations = IkmRegistration::where('created_by', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.ikm.index', compact('ikmRegistrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'jenis_industri' => 'required',
            'bulan_tahun_daftar_usaha' => 'required|date',
            'badan_usaha' => 'required',
            'nama_perusahaan' => 'required|string|max:255',
            'nama_pemilik' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|string',
            'alamat' => 'required',
            'desa_kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'email' => 'required|email|unique:ikm_registrations',
            'kode_kbli' => 'required|string|max:255',
            'nama_produk' => 'required|string|max:255',
            'jenis_produk' => 'required|string|max:255',
            'jumlah_tenaga_kerja_pria' => 'required|integer|min:0',
            'jumlah_tenaga_kerja_wanita' => 'required|integer|min:0',
            'nilai_investasi' => 'required|numeric|min:0',
            'jumlah_kapasitas_produksi_perbulan' => 'required|integer|min:0',
            'satuan_produksi' => 'required|string|max:255',
            'nilai_produksi' => 'required|numeric|min:0',
            'izin_nib' => 'required|integer',
            'pirt' => 'nullable|image|max:2048',
            'sertifikat_halal' => 'nullable|image|max:2048',
            'foto_ktp' => 'nullable|image|max:2048',
            'foto_produk' => 'nullable|image|max:2048',
            'foto_sample_produk' => 'nullable|image|max:2048',
        ]);

        $ikmRegistration = new IKMRegistration($request->all());

        $ikmRegistration->created_by = auth()->id();
        $ikmRegistration->updated_by = auth()->id();

        if ($request->hasFile('foto_ktp')) {
            $ikmRegistration->foto_ktp = $request->file('foto_ktp')->store('ikm_registrations', 'public');
        }
        if ($request->hasFile('foto_produk')) {
            $ikmRegistration->foto_produk = $request->file('foto_produk')->store('ikm_registrations', 'public');
        }
        if ($request->hasFile('foto_sample_produk')) {
            $ikmRegistration->foto_sample_produk = $request->file('foto_sample_produk')->store('ikm_registrations', 'public');
        }
        if ($request->hasFile('pirt')) {
            $ikmRegistration->pirt = $request->file('pirt')->store('ikm_registrations', 'public');
        }
        if ($request->hasFile('sertifikat_halal')) {
            $ikmRegistration->sertifikat_halal = $request->file('sertifikat_halal')->store('ikm_registrations', 'public');
        }

        $ikmRegistration->save();

        return redirect()->route('ikm-registrations.index')->with('success', 'IKM Registration created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'jenis_industri' => 'required',
            'bulan_tahun_daftar_usaha' => 'required|date',
            'badan_usaha' => 'required',
            'nama_perusahaan' => 'required|string|max:255',
            'nama_pemilik' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|string',
            'alamat' => 'required',
            'desa_kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'email' => 'required|email|unique:ikm_registrations,email,' . $id,
            'kode_kbli' => 'required|string|max:255',
            'nama_produk' => 'required|string|max:255',
            'jenis_produk' => 'required|string|max:255',
            'jumlah_tenaga_kerja_pria' => 'required|integer|min:0',
            'jumlah_tenaga_kerja_wanita' => 'required|integer|min:0',
            'nilai_investasi' => 'required|numeric|min:0',
            'jumlah_kapasitas_produksi_perbulan' => 'required|integer|min:0',
            'satuan_produksi' => 'required|string|max:255',
            'nilai_produksi' => 'required|numeric|min:0',
            'izin_nib' => 'required|integer',
            'pirt' => 'nullable|image|max:2048',
            'sertifikat_halal' => 'nullable|image|max:2048',
            'foto_ktp' => 'nullable|image|max:2048',
            'foto_produk' => 'nullable|image|max:2048',
            'foto_sample_produk' => 'nullable|image|max:2048',
        ]);

        $ikmRegistration = IKMRegistration::findOrFail($id);

        // Mengupdate data selain file gambar
        $ikmRegistration->fill($request->except(['pirt', 'sertifikat_halal', 'foto_ktp', 'foto_produk', 'foto_sample_produk']));

        // Handling file upload
        if ($request->hasFile('foto_ktp')) {
            $ikmRegistration->foto_ktp = $request->file('foto_ktp')->store('ikm_registrations', 'public');
        }
        if ($request->hasFile('foto_produk')) {
            $ikmRegistration->foto_produk = $request->file('foto_produk')->store('ikm_registrations', 'public');
        }
        if ($request->hasFile('foto_sample_produk')) {
            $ikmRegistration->foto_sample_produk = $request->file('foto_sample_produk')->store('ikm_registrations', 'public');
        }
        if ($request->hasFile('pirt')) {
            $ikmRegistration->pirt = $request->file('pirt')->store('ikm_registrations', 'public');
        }
        if ($request->hasFile('sertifikat_halal')) {
            $ikmRegistration->sertifikat_halal = $request->file('sertifikat_halal')->store('ikm_registrations', 'public');
        }

        $ikmRegistration->save();

        return redirect()->route('ikm-registrations.index')->with('success', 'IKM Registration updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ikmRegistration = IKMRegistration::findOrFail($id);
        $ikmRegistration->delete();

        return redirect()->route('ikm-registrations.index')->with('success', 'IKM Registration deleted successfully.');
    }
}
