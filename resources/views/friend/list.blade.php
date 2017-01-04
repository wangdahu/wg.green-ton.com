<div class="panel-body text-left ">
@foreach($friends as $friend)
    <div class="media">
        <div class="pull-left " >
            <span class="media-object">{{$friend['friend_id']}}</span>
        </div>
    </div>
@endforeach()
</div>
