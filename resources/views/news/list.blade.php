<div class="panel-body text-left ">
@foreach($news as $value)
    {{ $value->content }}
@endforeach()
</div>