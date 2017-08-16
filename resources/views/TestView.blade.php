<html>
    
<head>
</head>

<body>
    
<h1> Create Employee </h1>

<ul>
    @if ($errors->any())
    {!! implode('', $errors->all('<li><b>:message</b></li>')) !!}
    @endif
</ul>

{{ Form::open(array('url' => '/TestPost')) }}

    {{ Form::submit('Setup initial data') }}

{{ Form::close() }}



</body>

</html>