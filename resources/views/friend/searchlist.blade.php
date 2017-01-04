<div class="panel-body text-left ">
@foreach($lists as $list)
    <div class="media">
        <div class="pull-left " >
            <img class="img-thumbnail" data-id={{$list->id}} width="40" height="40" src="{{$list->avatar ? $list->avatar : '/images/avatar/avatar.png'}}" />
        </div>
        <div class="media-body">
            <a href="{{url('user/'.$list->id)}}" >{{$list->name}}</a>
            @if(!in_array($list->id, $friends))
            <button class="btn btn-success"><i class="fa fa-user-plus"></i> </button>
            @endif
        </div>
    </div>
@endforeach()
{!! $lists->appends(['name' => $name])->links() !!}
</div>