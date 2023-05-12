<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;


class NotificationsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $notifications = auth()->user()->notifications;

        return view('admin.notifications.noti-index',compact(['notifications']));
    }

    public function read($id){
        DatabaseNotification::find($id)->markAsRead();

        return back()->with('status-noti','Notificación marcada como leída');
    }

    public function destroy($id){
        DatabaseNotification::find($id)->delete();

        return back()->with('status-noti','La notificación se elimino correctamente.');
    }

    public function read_all(){
        $user = auth()->user()->unreadNotifications->markAsRead();
        return $user;
    }

    public function read_noti($id){
        $read = DatabaseNotification::find($id)->markAsRead();

        return $read;

    }
}
