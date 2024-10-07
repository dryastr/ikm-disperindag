<?php

namespace App\Http\Middleware;

use App\Models\IkmRegistration;
use App\Models\Notification;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $userId = auth()->id();

        $ikmRegistrationsIds = IkmRegistration::where('created_by', $userId)->pluck('id');

        $announcements = Notification::whereIn('ikm_registration_id', $ikmRegistrationsIds)->get();

        view()->share('announcements', $announcements);

        return $next($request);
    }
}
