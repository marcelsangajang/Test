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
    {{ Form::label('start_time_tu', 'Start time') }}
    {{ Form::number('start_time_tu', 'Start time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break1_start_tu', [11, 12, 13], 1) }}
        to 
    {{ Form::select('break1_end_tu', [11.30, 12.30, 13.30], 1) }} 
    
    <br>
    {{ Form::label('end_time_tu', 'End time') }}
    {{ Form::number('end_time_tu', 'End time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break2_start_tu', [14, 15, 16], 1) }}
    to
    {{ Form::select('break2_end_tu', [14.30, 15.30, 16.30], 1) }}
    <br>

    <h3>Wednesday</h3>
    {{ Form::label('start_time_we', 'Start time') }}
    {{ Form::number('start_time_we', 'Start time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break1_start_we', [11, 12, 13], 1) }}
        to 
    {{ Form::select('break1_end_we', [11.30, 12.30, 13.30], 1) }} 
    
    <br>
    {{ Form::label('end_time_we', 'End time') }}
    {{ Form::number('end_time_we', 'End time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break2_start_we', [14, 15, 16], 1) }}
    to
    {{ Form::select('break2_end_we', [14.30, 15.30, 16.30], 1) }}
    <br>

    <h3>Thursday</h3>
    {{ Form::label('start_time_th', 'Start time') }}
    {{ Form::number('start_time_th', 'Start time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break1_start_th', [11, 12, 13], 1) }}
        to 
    {{ Form::select('break1_end_th', [11.30, 12.30, 13.30], 1) }} 
    
    <br>
    {{ Form::label('end_time_th', 'End time') }}
    {{ Form::number('end_time_th', 'End time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break2_start_th', [14, 15, 16], 1) }}
    to
    {{ Form::select('break2_end_th', [14.30, 15.30, 16.30], 1) }}
    <br>

    <h3>Friday</h3>
    {{ Form::label('start_time_fr', 'Start time') }}
    {{ Form::number('start_time_fr', 'Start time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break1_start_fr', [11, 12, 13], 1) }}
        to 
    {{ Form::select('break1_end_fr', [11.30, 12.30, 13.30], 1) }} 
    
    <br>
    {{ Form::label('end_time_fr', 'End time') }}
    {{ Form::number('end_time_fr', 'End time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break2_start_fr', [14, 15, 16], 1) }}
    to
    {{ Form::select('break2_end_fr', [14.30, 15.30, 16.30], 1) }}
    <br>

    <h3>Saturday</h3>
    {{ Form::label('start_time_sa', 'Start time') }}
    {{ Form::number('start_time_sa', 'Start time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break1_start_sa', [11, 12, 13], 1) }}
        to 
    {{ Form::select('break1_end_sa', [11.30, 12.30, 13.30], 1) }} 
    
    <br>
    {{ Form::label('end_time_sa', 'End time') }}
    {{ Form::number('end_time_sa', 'End time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break2_start_sa', [14, 15, 16], 1) }}
    to
    {{ Form::select('break2_end_sa', [14.30, 15.30, 16.30], 1) }}
    <br>

    <h3>Sunday</h3>
    {{ Form::label('start_time_su', 'Start time') }}
    {{ Form::number('start_time_su', 'Start time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break1_start_su', [11, 12, 13], 1) }}
        to 
    {{ Form::select('break1_end_su', [11.30, 12.30, 13.30], 1) }} 
    
    <br>
    {{ Form::label('end_time_su', 'End time') }}
    {{ Form::number('end_time_su', 'End time') }}
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break2_start_su', [14, 15, 16], 1) }}
    to
    {{ Form::select('break2_end_su', [14.30, 15.30, 16.30], 1) }}
    <br>
    {{ Form::submit('Submit') }}

{{ Form::close() }}



</body>

</html>