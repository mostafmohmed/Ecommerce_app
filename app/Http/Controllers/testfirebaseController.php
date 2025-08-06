<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Laravel\Firebase\Facades\Firebase;

class testfirebaseController extends Controller
{
  public  function notifyAllAdmins()
    {
        // dd(auth('admin')->user());
        $tokens = Admin::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();
    
        $messaging = Firebase::messaging();
    
        foreach ($tokens as $token) {
            $message = CloudMessage::withTarget('token', $token)
                ->withNotification([
                    'title' =>'hhhhhhhhh',
                    'body' => 'hhhhhhhhhykkk',
                ]);
    
            $messaging->send($message);
        }
        return response()->json(['status'=>'yes']);
}
public function saveFcmToken(Request $request)
{
    \Log::info('FCM Token: ' . $request->token);

    $admin = auth('admin')->user();
    $admin->fcm_token = $request->token;
    $admin->save();

    return response()->json(['success' => true]);
}
}