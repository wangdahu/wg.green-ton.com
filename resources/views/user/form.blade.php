<div class="form-group">
    {!! Form::label('name') !!}
    {!! Form::text('name',null, ['class' => 'form-control', 'style' => 'width:auto']) !!}
</div>
<div class="form-group">
    {!! Form::label('email') !!}
    {!! Form::text('email',null, ['class' => 'form-control', 'style' => 'width:auto']) !!}
</div>
{!! Form::submit('提交修改', ['class' => 'btn btn-primary']) !!}