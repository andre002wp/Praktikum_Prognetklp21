@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="container">
        Notification
        </div>
        <div>
            <?php 
                $id = Auth::user()->id;
                if(Auth::user()->unreadNotifications != null){
                    $notif_count = Auth::user()->unreadNotifications->count();
                }
                else {
                    $notif_count = 0;
                }
                $notifications = Auth::user()->notifications()->paginate(6);
                $read_notif = Auth::user()->unreadNotifications()->get();
                // dd($notifications);
            ?>
            <ul >
                <center><a href="/marknotif" class="btn" style="background-color: white;">Mark All As Read</a></center>
                @foreach($notifications as $notif)
                    @if($notif_count>0)
                        <li>
                            @foreach($read_notif as $unred)
                                @if ($unred->id===$notif->id)
                                    <i class="fas fa-exclamation"></i>
                                @endif
                            @endforeach
                            <a href="/transaksi/detail/{{$notif->data['transaction_id']}}" class="btn">Status transaksi anda dengan id {!!$notif->data['transaction_id']!!} Telah diupdate menjadi {!!$notif->data['new_status']!!}</a>
                        </li>
                        <br>
                    @else
                        <li><a href="/transaksi/detail/{{$notif->data['transaction_id']}}" class="btn">Status transaksi anda dengan id {!!$notif->data['transaction_id']!!} Telah diupdate menjadi {!!$notif->data['new_status']!!}</a></li>
                        <br>
                    @endif
                @endforeach   
                <span>{{$notifications->links()}}</span>                                  
            </ul>
        </div>
    </div>
@endsection