<html>
    
<head>
</head>

<body>
    
<h1> Create Chair </h1>

<ul>
    @if ($errors->any())
    {!! implode('', $errors->all('<li><b>:message</b></li>')) !!}
    @endif
</ul>

{{ Form::open(array('url' => '/ChairPost')) }}

    {{ Form::label('description', 'Description') }}
    {{ Form::text('description', Input::old('description')) }}

    
    {{ Form::submit('Submit') }}

{{ Form::close() }}



</body>

</html>