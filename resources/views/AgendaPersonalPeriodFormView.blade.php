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

    <h1> Workdays </h1>
    
    <h3>Monday</h3>
    {{ Form::label('start_time_mon', 'Start time') }}
    {{ Form::number('start_time_mon', 'Start time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break1_start_mon', ['11:00:00', '12:00:00', '13:00:00'], 1) }} 
    to 
    {{ Form::select('break1_end_mon', ['11:00:00', '12:30:00', '13:30:00'], 1) }} 
    
    <br>
    {{ Form::label('end_time_mon', 'End time') }}
    {{ Form::number('end_time_mon', 'End time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break2_start_mon', [14, 15, 16], 1) }}
    to
    {{ Form::select('break2_end_mon', [14.30, 15.30, 16.30], 1) }}
    <br>
    
    <h3>Tuesday</h3>
    {{ Form::label('start_time_tue', 'Start time') }}
    {{ Form::number('start_time_tue', 'Start time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break1_start_tue', [11, 12, 13], 1) }}
        to 
    {{ Form::select('break1_end_tue', [11.30, 12.30, 13.30], 1) }} 
    
    <br>
    {{ Form::label('end_time_tue', 'End time') }}
    {{ Form::number('end_time_tue', 'End time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break2_start_tue', [14, 15, 16], 1) }}
    to
    {{ Form::select('break2_end_tue', [14.30, 15.30, 16.30], 1) }}
    <br>

    <h3>Wednesday</h3>
    {{ Form::label('start_time_wed', 'Start time') }}
    {{ Form::number('start_time_wed', 'Start time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break1_start_wed', [11, 12, 13], 1) }}
        to 
    {{ Form::select('break1_end_wed', [11.30, 12.30, 13.30], 1) }} 
    
    <br>
    {{ Form::label('end_time_wed', 'End time') }}
    {{ Form::number('end_time_wed', 'End time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break2_start_wed', [14, 15, 16], 1) }}
    to
    {{ Form::select('break2_end_wed', [14.30, 15.30, 16.30], 1) }}
    <br>

    <h3>Thursday</h3>
    {{ Form::label('start_time_thu', 'Start time') }}
    {{ Form::number('start_time_thu', 'Start time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break1_start_thu', [11, 12, 13], 1) }}
        to 
    {{ Form::select('break1_end_thu', [11.30, 12.30, 13.30], 1) }} 
    
    <br>
    {{ Form::label('end_time_thu', 'End time') }}
    {{ Form::number('end_time_thu', 'End time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break2_start_thu', [14, 15, 16], 1) }}
    to
    {{ Form::select('break2_end_thu', [14.30, 15.30, 16.30], 1) }}
    <br>

    <h3>Friday</h3>
    {{ Form::label('start_time_fri', 'Start time') }}
    {{ Form::number('start_time_fri', 'Start time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break1_start_fri', [11, 12, 13], 1) }}
        to 
    {{ Form::select('break1_end_fri', [11.30, 12.30, 13.30], 1) }} 
    
    <br>
    {{ Form::label('end_time_fri', 'End time') }}
    {{ Form::number('end_time_fri', 'End time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break2_start_fri', [14, 15, 16], 1) }}
    to
    {{ Form::select('break2_end_fri', [14.30, 15.30, 16.30], 1) }}
    <br>

    <h3>Saturday</h3>
    {{ Form::label('start_time_sat', 'Start time') }}
    {{ Form::number('start_time_sat', 'Start time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break1_start_sat', [11, 12, 13], 1) }}
        to 
    {{ Form::select('break1_end_sat', [11.30, 12.30, 13.30], 1) }} 
    
    <br>
    {{ Form::label('end_time_sat', 'End time') }}
    {{ Form::number('end_time_sat', 'End time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break2_start_sat', [14, 15, 16], 1) }}
    to
    {{ Form::select('break2_end_sat', [14.30, 15.30, 16.30], 1) }}
    <br>

    <h3>Sunday</h3>
    {{ Form::label('start_time_sun', 'Start time') }}
    {{ Form::number('start_time_sun', 'Start time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break1_start_sun', [11, 12, 13], 1) }}
        to 
    {{ Form::select('break1_end_sun', [11.30, 12.30, 13.30], 1) }} 
    
    <br>
    {{ Form::label('end_time_sun', 'End time') }}
    {{ Form::number('end_time_sun', 'End time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break2_start_sun', [14, 15, 16], 1) }}
    to
    {{ Form::select('break2_end_sun', [14.30, 15.30, 16.30], 1) }}
    <br>
    {{ Form::submit('Submit') }}

{{ Form::close() }}



</body>

</html>