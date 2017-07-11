<html>
    
<head>
</head>

<body>
    
<h1> Period </h1>

<ul>
    @if ($errors->any())
    {!! implode('', $errors->all('<li><b>:message</b></li>')) !!}
    @endif
</ul>

{{ Form::open(array('url' => '/postPeriod')) }}

    {{ Form::label('agenda_personal_id', 'Agenda ID') }}
    <br>
    {{ Form::number('agenda_personal_id', 'Agenda ID') }}
    <br>
    {{ Form::label('description', 'Description') }}
    <br>
    {{ Form::text('description', Input::old('description')) }}
    <br>
                
    {{ Form::label('start_date', 'Start date') }}
    {{ Form::date('start_date', \Carbon\Carbon::now()) }}

    <br>

    {{ Form::label('end_date', 'End date') }}
    {{ Form::date('end_date', \Carbon\Carbon::now()) }}

    <br>

    {{ Form::submit('Submit') }}

{{ Form::close() }}



</body>

</html>