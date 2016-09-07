<div class="panel-body text-left ">
@foreach($news as $new)
    <div class="media">
        <div class="pull-left " >
            <span class="media-object">{{ substr($new->published_at, 5, 11)}}</span>
        </div>
        <div class="media-body">
            <a href="{{url('news/'.$new->id)}}" >{{$new->content}}</a>
        </div>
    </div>
@endforeach()
</div>