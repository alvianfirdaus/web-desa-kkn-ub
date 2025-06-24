<?php

namespace App\Http\Controllers\notification;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationSuratController extends Controller
{
    public function unreadCount()
    {
        $count = Auth::user()->unreadNotifications()->count();
        return response()->json(['count' => $count]);
    }

    public function latest()
    {
        $notifications = auth()->user()
            ->unreadNotifications()
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get()
            ->map(function ($notification) {
                return [
                    'id' => $notification->id,
                    'surat_id' => $notification->data['surat_id'],
                    'message' => $notification->data['message'],
                    'created_at' => $notification->created_at->toDateTimeString()
                ];
            });

        return response()->json($notifications);
    }

    public function markAsRead($notificationId)
    {
        try {
            $notification = auth()->user()
                ->notifications()
                ->where('id', $notificationId)
                ->firstOrFail();

            $notification->markAsRead();

            return response()->json([
                'success' => true,
                'unread_count' => auth()->user()->unreadNotifications()->count()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function markAllRead()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return response()->json([
            'success' => true,
            'unread_count' => 0
        ]);
    }
}
