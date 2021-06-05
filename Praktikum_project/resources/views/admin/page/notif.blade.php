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
                    // dd($notifications);
                ?>
                <ul >
                    <center><a href="/marknotif" class="btn" style="background-color: white;">Mark All As Read</a></center>
                    @foreach($notifications as $notif)
                        <li><a href="/transaksi/detail/{{$notif->data['transaction_id']}}" class="btn">Transaksi dengan id {!!$notif->data['transaction_id']!!} Telah mendapatkan review</a></li>
                        <br>
                    @endforeach                                 
                </ul>
            </li>
        </div>
    </div>
@endsection