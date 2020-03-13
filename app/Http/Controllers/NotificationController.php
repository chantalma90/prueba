<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NotificationService;
use App\User;
use Illuminate\Support\Str;

class NotificationController extends Controller
{
    protected $notification;

    public function __construct(NotificationService $notificationService) {
        $this->notification = $notificationService;
    }
    public function sendNotification($id) {

        $user = User::example($id);
        $message = Str::random();;
        $result = $this->notification->notify($user, $message);

        return response()->json([
            'id' => $id,
            'email' => $user->email,
            'message' => $message,
            'result' => $result
        ]);
    }
}