@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @include('user.avatar')
                <div class="panel-body text-left ">
                    @include('user.title')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
