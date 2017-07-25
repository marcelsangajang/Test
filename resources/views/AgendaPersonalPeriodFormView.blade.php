<html>
    
<head>
</head>

<body>
    
<h1> Create period </h1>

<ul>
    @if ($errors->any())
    {!! implode('', $errors->all('<li><b>:message</b></li>')) !!}
    @endif
</ul>

{{ Form::open(array('url' => '/postPeriod')) }}


   
    Employee
    <select class="form-control" name="agendaSelect">
        @foreach($allAgendasArray as $agenda)
        <option value="{{$agenda['id']}}">{{$agenda['description_intern']}}</option>
        @endforeach
    </select>
    <br>
    {{ Form::label('description', 'Description') }}
    
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
    <input name="start_time_mon" type="time" value="09:00:00" step="1">

    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break1_start_mon', ['11:00:00', '12:00:00', '13:00:00'], 1) }} 
    to 
    {{ Form::select('break1_end_mon', ['11:30:00', '12:30:00', '13:30:00'], 1) }} 
    
    <br>
    <input name="end_time_mon" type="time" value="17:00:00" step="1">
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break2_start_mon', ['14:00:00', '15:00:00', '16:00:00'], 1) }}
    to
    {{ Form::select('break2_end_mon', ['14:30:00', '15:30:00', '16:30:00'], 1) }}
    <br>
    
    <h3>Tuesday</h3>
    <input name="start_time_tue" type="time" value="09:00:00" step="1">
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break1_start_tue', ['11:00:00', '12:00:00', '13:00:00'], 1) }}
        to 
    {{ Form::select('break1_end_tue', ['11:30:00', '12:30:00', '13:30:00'], 1) }} 
    
    <br>
    <input name="end_time_tue" type="time" value="17:00:00" step="1">
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break2_start_tue', ['14:00:00', '15:00:00', '16:00:00'], 1) }}
    to
    {{ Form::select('break2_end_tue', ['14:30:00', '15:30:00', '16:30:00'], 1) }}
    <br>

    <h3>Wednesday</h3>
    <input name="start_time_wed" type="time" value="09:00:00" step="1">
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break1_start_wed', ['11:00:00', '12:00:00', '13:00:00'], 1) }}
        to 
    {{ Form::select('break1_end_wed', ['11:30:00', '12:30:00', '13:30:00'], 1) }} 
    
    <br>
    <input name="end_time_wed" type="time" value="17:00:00" step="1">
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break2_start_wed', ['14:00:00', '15:00:00', '16:00:00'], 1) }}
    to
    {{ Form::select('break2_end_wed', ['14:30:00', '15:30:00', '16:30:00'], 1) }}
    <br>

    <h3>Thursday</h3>
    <input name="start_time_thu" type="time" value="09:00:00" step="1">
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break1_start_thu', ['11:00:00', '12:00:00', '13:00:00'], 1) }}
        to 
    {{ Form::select('break1_end_thu', ['11:30:00', '12:30:00', '13:30:00'], 1) }} 
    
    <br>
    <input name="end_time_thu" type="time" value="17:00:00" step="1">
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break2_start_thu', ['14:00:00', '15:00:00', '16:00:00'], 1) }}
    to
    {{ Form::select('break2_end_thu', ['14:30:00', '15:30:00', '16:30:00'], 1) }}
    <br>

    <h3>Friday</h3>
    <input name="start_time_fri" type="time" value="09:00:00" step="1">
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break1_start_fri', ['11:00:00', '12:00:00', '13:00:00'], 1) }}
        to 
    {{ Form::select('break1_end_fri', ['11:30:00', '12:30:00', '13:30:00'], 1) }} 
    
    <br>
    <input name="end_time_fri" type="time" value="17:00:00" step="1">
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break2_start_fri', ['14:00:00', '15:00:00', '16:00:00'], 1) }}
    to
    {{ Form::select('break2_end_fri', ['14:30:00', '15:30:00', '16:30:00'], 1) }}
    <br>

    <h3>Saturday</h3>
    <input name="start_time_sat" type="time" value="09:00:00" step="1">
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break1_start_sat', ['11:00:00', '12:00:00', '13:00:00'], 1) }}
        to 
    {{ Form::select('break1_end_sat', ['11:30:00', '12:30:00', '13:30:00'], 1) }} 
    
    <br>
    <input name="end_time_sat" type="time" value="17:00:00" step="1">
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break2_start_sat', ['14:00:00', '15:00:00', '16:00:00'], 1) }}
    to
    {{ Form::select('break2_end_sat', ['14:30:00', '15:30:00', '16:30:00'], 1) }}
    <br>

    <h3>Sunday</h3>
    <input name="start_time_sun" type="time" value="09:00:00" step="1">
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break1_start_sun', ['11:00:00', '12:00:00', '13:00:00'], 1) }}
        to 
    {{ Form::select('break1_end_sun', ['11:30:00', '12:30:00', '13:30:00'], 1) }} 
    
    <br>
    <input name="end_time_sun" type="time" value="17:00:00" step="1">
    {{ Form::label('', 'Breaks') }}
    {{ Form::select('break2_start_sun', ['14:00:00', '15:00:00', '16:00:00'], 1) }}
    to
    {{ Form::select('break2_end_sun', ['14:30:00', '15:30:00', '16:30:00'], 1) }}
    <br>
    {{ Form::submit('Submit') }}

{{ Form::close() }}



</body>

</html>