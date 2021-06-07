@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="container">
        Notification
        </div>
        <div>
            <li class="hassubs active">
                <?php
                    $notifications = Auth::user()->notifications;
                    // dd($notifications);
                ?>
                <ul >
                    <center><a href="/admin/marknotif" class="btn" style="background-color: white;">Mark All As Read</a></center>
                    @foreach($notifications as $notif)
                        @if($notif->type == "App\Notifications\NewTransaction")
                            <li><a href="/admin/transaksi" class="btn">Telah dibuat transaksi dengan id {!!$notif->data['transaction_id']!!}</a></li>
                            <br>
                        @elseif($notif->type == "App\Notifications\NewReview")
                            <li><a href="/admin/transaksi" class="btn">Transaksi dengan id {!!$notif->data['transaction_id']!!} Telah mendapatkan review</a></li>
                            <br>
                        @endif
                    @endforeach                                 
                </ul>
            </li>
        </div>
    </div>
@endsection