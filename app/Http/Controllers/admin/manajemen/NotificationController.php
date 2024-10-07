<?php

namespace App\Http\Controllers\admin\manajemen;

use App\Http\Controllers\Controller;
use App\Models\IkmRegistration;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $ikmRegistrationsIds = IkmRegistration::where('created_by', $userId)->pluck('id');

        $announcements = Notification::whereIn('ikm_registration_id', $ikmRegistrationsIds)->get();

        return view('notifications.index', compact('announcements'));
    }



    public function markAsRead(Request $request)
    {
        $userId = auth()->id();

        $notifications = Notification::whereHas('ikmRegistration', function ($query) use ($userId) {
            $query->where('created_by', $userId);
        })->where('is_read', false)->get();

        // dd([
        //     'auth_id' => $userId,
        //     'notifications' => $notifications
        // ]);

        $updatedCount = Notification::whereHas('ikmRegistration', function ($query) use ($userId) {
            $query->where('created_by', $userId);
        })->where('is_read', false)->update(['is_read' => true]);

        if ($updatedCount > 0) {
            return redirect()->back()->with('success', 'Semua notifikasi telah ditandai sebagai dibaca.');
        } else {
            return redirect()->back()->with('info', 'Tidak ada notifikasi yang perlu ditandai sebagai dibaca.');
        }
    }
}
