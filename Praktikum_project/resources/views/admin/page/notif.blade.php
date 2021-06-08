@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="container">
        Notification
        </div>
        <div>
            <?php
                $notifications = Auth::user()->notifications()->paginate(6);
                // dd($notifications);
            ?>
            <ul >
                <center><a href="/admin/marknotif" class="btn" style="background-color: white;">Mark All As Read</a></center>
                @foreach($notifications as $notif)
                    @if($notif->type == "App\Notifications\NewTransaction")
                        <li><a href="/admin/transaksi" class="btn">Telah dibuat transaksi dengan id {!!$notif->data['transaction_id']!!}</a></li>
                        <br>
                    @elseif($notif->type == "App\Notifications\NewReview")
                        <li><a href="/admin/transaksi" class="btn">Transaksi dengan id {!!$notif->data['review_id']!!} Telah mendapatkan review</a></li>
                        <br>
                    @endif
                @endforeach 
                <span>{{$notifications->links()}}</span>                                
            </ul>
        </div>
    </div>
@endsection