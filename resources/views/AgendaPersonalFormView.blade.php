<html>
    
<head>
</head>

<body>
    
<p> Dit is de template </p>

<ul>
    @if ($errors->any())
    {!! implode('', $errors->all('<li><b>:message</b></li>')) !!}
    @endif
</ul>

{{ Form::open(array('url' => '/post')) }}

    {{ Form::label('description_intern', 'Description intern') }}
    <br>
    {{ Form::text('description_intern', Input::old('description_intern')) }}
    <br>
        
    {{ Form::label('description_extern', 'Description extern') }}
    <br>
    {{ Form::text('description_extern', Input::old('description_extern')) }}
    <br>
                
    {{ Form::label('type', 'Type') }}
    <br>
    {{ Form::select('type', array(
       'Tandarts' => 'Tandarts',
       'Mondhygieste' => 'Mondhygieste',
       'prevassistent' => 'Prev. assistente'                         
    )) }}
    <br>
    <br>
    
    {{ Form::submit('Submit') }}

{{ Form::close() }}



</body>

</html>