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
                    // $notif_count = Auth()->user()->unreadNotifications->count();
                    // $notifications = Auth::user()->notifications;
                    $notifications = DB::table('user_notifications')->where('notifiable_id',$id)->where('read_at',NULL)->orderBy('created_at','desc')->get();
                ?>
                {{-- <a href="/home"><span class="badge badge-pill badge-danger">{{$notif_count}}</span></a> --}}
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