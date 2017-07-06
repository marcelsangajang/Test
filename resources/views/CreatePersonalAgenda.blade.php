<html>
    
<head>
</head>

<body>
    
<p> Dit is de template </p>

{{ Form::open(array('url' => '/post')) }}

    {{ Form::label('description_intern', 'Description intern') }}
    <br>
    {{ Form::text('description_intern') }}
    <br>
        
    {{ Form::label('description_extern', 'Description extern') }}
    <br>
    {{ Form::text('description_intern') }}
    <br>
                
    {{ Form::label('type', 'type') }}
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