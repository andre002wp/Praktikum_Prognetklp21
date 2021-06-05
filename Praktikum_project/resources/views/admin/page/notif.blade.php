@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="container">
        Notification
        </div>
        <div>
            <li class="hassubs active">
                <?php 
                    $id = Auth::user()->id;
                    if(Auth::user()->unreadNotifications != null){
                        $notif_count = Auth::user()->unreadNotifications->count();
                    }
                    else {
                        $notif_count = 0;
                    }
                    $notifications = Auth::user()->notifications;
                    $notifications = DB::table('user_notifications')->where('notifiable_id',$id)->where('read_at',NULL)->orderBy('created_at','desc')->get();
                ?>
                @if ($notif_count>0)
                    <a href="#"><span class="badge badge-pill badge-danger">{{$notif_count}}</span></a>
                @endif
                <ul >
                    <center><a href="/marknotif" class="btn" style="background-color: white;">Mark All As Read</a></center>
                    @foreach($notifications as $notif)
                        <li>{!!$notif->data!!}</li>
                        <br>
                    @endforeach                                  
                </ul>
            </li>
        </div>
    </div>
@endsection