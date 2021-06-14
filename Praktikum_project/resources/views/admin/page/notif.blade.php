@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="container">
        Notification
        </div>
        <div>
            <?php
                $notifications = Auth::user()->notifications()->paginate(6);
                $read_notif = Auth::user()->unreadNotifications()->get();
                if(Auth::user()->unreadNotifications != null){
                    $notif_count = Auth::user()->unreadNotifications->count();
                }
                else {
                    $notif_count = 0;
                }
            ?>
            <ul >
                <center><a href="/admin/marknotif" class="btn" style="background-color: white;">Mark All As Read</a></center>
                @foreach($notifications as $notif)
                    @if($notif_count>0)
                        @if($notif->type == "App\Notifications\NewTransaction")
                            <li>
                                @foreach($read_notif as $unred)
                                    @if ($unred->id==$notif->id)
                                        <i class="fas fa-exclamation"></i>
                                    @endif
                                @endforeach
                                <a href="/admin/mark/{{$notif->id}}" class="btn">Telah dibuat transaksi dengan id {!!$notif->data['transaction_id']!!}</a>
                            </li>
                            <br>
                        @elseif($notif->type == "App\Notifications\NewReview")
                            <li>
                                @foreach($read_notif as $unred)
                                    @if ($unred->id==$notif->id)
                                        <i class="fas fa-exclamation"></i>
                                    @endif
                                @endforeach
                                <a href="/admin/mark/{{$notif->id}}" class="btn">Transaksi dengan id {!!$notif->data['review_id']!!} Telah mendapatkan review</a>
                            </li>
                            <br>
                        @elseif($notif->type == "App\Notifications\PaymentUploaded")
                            <li>
                                @foreach($read_notif as $unred)
                                    @if ($unred->id==$notif->id)
                                        <i class="fas fa-exclamation"></i>
                                    @endif
                                @endforeach
                                <a href="/admin/mark/{{$notif->id}}" class="btn">Transaksi dengan id {!!$notif->data['transaction_id']!!} Telah dibayarkan</a>
                            </li>
                            <br>
                        @endif
                    @else
                        @if($notif->type == "App\Notifications\NewTransaction")
                            <li><a href="admin/transaksi/detail/{{$notif->data['transaction_id']}}" class="btn">Telah dibuat transaksi dengan id {!!$notif->data['transaction_id']!!}</a></li>
                            <br>
                        @elseif($notif->type == "App\Notifications\NewReview")
                            <li><a href="admin/transaksi/detail/{{$notif->data['review_id']}}" class="btn">Transaksi dengan id {!!$notif->data['review_id']!!} Telah mendapatkan review</a></li>
                            <br>
                        @elseif($notif->type == "App\Notifications\PaymentUploaded")
                            <li><a href="admin/transaksi/detail/{{$notif->data['transaction_id']}}" class="btn">Transaksi dengan id {!!$notif->data['transaction_id']!!} Telah dibayarkan</a></li>
                            <br>
                        @endif
                    @endif
                @endforeach 
                <span>{{$notifications->links()}}</span>                                
            </ul>
        </div>
    </div>
@endsection