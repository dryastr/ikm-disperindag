<?php

namespace App\Http\Controllers\admin\manajemen;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintsAdminController extends Controller
{
    public function index()
    {
        $complaints = Complaint::orderBy('created_at', 'desc')->get();

        return view('admin.complaints-admin.index', compact('complaints'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string|max:500',
        ]);

        $complaint = Complaint::findOrFail($id);
        $complaint->reply = $request->reply;
        $complaint->updated_by = auth()->id();
        $complaint->save();

        return redirect()->route('list-complaints.index')->with('success', 'Balasan berhasil dikirim.');
    }
}
