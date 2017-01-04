@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @include('user.avatar')
                <div class="panel-body text-left">
                    <h4>他的说说</h4>
                    <hr  style="margin-top: 5px;">
                    @include('news.list')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
