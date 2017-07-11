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

{{ Form::open(array('url' => '/postWeekdays')) }}

     {{ Form::label('period_id', 'Period ID') }}
    {{ Form::number('period_id', 'Period ID') }}
<h1> Workdays </h1>
    
    <h3>Monday</h3>
    {{ Form::label('start_time_mo', 'Start time') }}
    {{ Form::number('start_time_mo', 'Start time') }}
    
    <br>
    {{ Form::label('end_time_mo', 'End time') }}
    {{ Form::number('end_time_mo', 'End time') }}
    <br>
    
    <h3>Tuesday</h3>
    {{ Form::label('start_time_tu', 'Start time') }}
    {{ Form::number('start_time_tu', 'Start time') }}
    
    <br>
    {{ Form::label('end_time_tu', 'End time') }}
    {{ Form::number('end_time_tu', 'End time') }}
    <br>

    <h3>Wednesday</h3>
    {{ Form::label('start_time_we', 'Start time') }}
    {{ Form::number('start_time_we', 'Start time') }}
    
    <br>
    {{ Form::label('end_time_we', 'End time') }}
    {{ Form::number('end_time_we', 'End time') }}
    <br>

    <h3>Thursday</h3>
    {{ Form::label('start_time_th', 'Start time') }}
    {{ Form::number('start_time_th', 'Start time') }}
    
    <br>
    {{ Form::label('end_time_th', 'End time') }}
    {{ Form::number('end_time_th', 'End time') }}
    <br>

    <h3>Friday</h3>
    {{ Form::label('start_time_fr', 'Start time') }}
    {{ Form::number('start_time_fr', 'Start time') }}
    
    <br>
    {{ Form::label('end_time_fr', 'End time') }}
    {{ Form::number('end_time_fr', 'End time') }}
    <br>

    <h3>Saturday</h3>
    {{ Form::label('start_time_sa', 'Start time') }}
    {{ Form::number('start_time_sa', 'Start time') }}
    
    <br>
    {{ Form::label('end_time_sa', 'End time') }}
    {{ Form::number('end_time_sa', 'End time') }}
    <br>

    <h3>Sunday</h3>
    {{ Form::label('start_time_su', 'Start time') }}
    {{ Form::number('start_time_su', 'Start time') }}
    
    <br>
    {{ Form::label('end_time_su', 'End time') }}
    {{ Form::number('end_time_su', 'End time') }}
    <br>



    {{ Form::submit('Submit') }}

{{ Form::close() }}



</body>

</html>