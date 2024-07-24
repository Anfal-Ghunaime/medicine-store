<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function read(Request $request): JsonResponse
    {
        $request->validate([
            'id' => ['required', 'exists:notifications,id'],
            'user_id'
        ]);
        $user_id = $request['user_id'];
        $notification = DB::table('notifications')
            ->where('id', $request['id'])
            ->where('data->user_id', $user_id)
            ->update([
            'read_at' => Carbon::now(),
        ]);
        return response()->json('success');
    }

    public function allUnreadNotifications(Request $request): JsonResponse
    {
        $request->validate([
            'id'
        ]);
        $notifications = DB::table('notifications')->where('data->user_id', $request['id'])
            ->where('read_at', '=',null)
            ->get(['id','data->message']);
        return response()->json($notifications);
    }

    public function allNotifications(Request $request): JsonResponse
    {
        $request->validate([
            'id'
        ]);
        $notifications = DB::table('notifications')->where('data->user_id', $request['id'])
            ->get(['id','data->message']);
        return response()->json($notifications);
    }

    public function markAllAsRead(Request $request){
        $request->validate([
            'id'
        ]);
        $notifications = DB::table('notifications')
            ->where('data->user_id', $request['id'])
            ->update([
                'read_at' => Carbon::now(),
            ]);
    }
}
