@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="container">
        Notification
        </div>
        <div>
            {{Auth::user()->Notification}}
        </div>
    </div>
@endsection