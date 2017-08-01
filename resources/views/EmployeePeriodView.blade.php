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

{{ Form::open(array('url' => '/EmployeePeriodPost')) }}


   
    Employee
    <select class="form-control" name="employeeSelect">
        @foreach($allEmployeesArray as $employee)
        <option value="{{$employee['id']}}">{{$employee['description_intern']}}</option>
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
    Break 1 <input name="break1_start_mon" type="time" value="12:00:00" step="1">
    to
    <input name="break1_end_mon" type="time" value="12:30:00" step="1">

    <br>
    <input name="end_time_mon" type="time" value="17:00:00" step="1">
    Break 2 
    <input name="break2_start_mon" type="time" value="15:00:00" step="1">
    to
    <input name="break2_end_mon" type="time" value="15:30:00" step="1">
    <br>
    
    <h3>Tuesday</h3>
        <input name="start_time_tue" type="time" value="09:00:00" step="1">
    Break 1 <input name="break1_start_tue" type="time" value="12:00:00" step="1">
    to
    <input name="break1_end_tue" type="time" value="12:30:00" step="1">

    <br>
    <input name="end_time_tue" type="time" value="17:00:00" step="1">
    Break 2 
    <input name="break2_start_tue" type="time" value="15:00:00" step="1">
    to
    <input name="break2_end_tue" type="time" value="15:30:00" step="1">
    <br>

    <h3>Wednesday</h3>
        <input name="start_time_wed" type="time" value="09:00:00" step="1">
    Break 1 <input name="break1_start_wed" type="time" value="12:00:00" step="1">
    to
    <input name="break1_end_wed" type="time" value="12:30:00" step="1">

    <br>
    <input name="end_time_wed" type="time" value="17:00:00" step="1">
    Break 2 
    <input name="break2_start_wed" type="time" value="15:00:00" step="1">
    to
    <input name="break2_end_wed" type="time" value="15:30:00" step="1">
    <br>

    <h3>Thursday</h3>
    <input name="start_time_thu" type="time" value="09:00:00" step="1">
    Break 1 <input name="break1_start_thu" type="time" value="12:00:00" step="1">
    to
    <input name="break1_end_thu" type="time" value="12:30:00" step="1">

    <br>
    <input name="end_time_thu" type="time" value="17:00:00" step="1">
    Break 2 
    <input name="break2_start_thu" type="time" value="15:00:00" step="1">
    to
    <input name="break2_end_thu" type="time" value="15:30:00" step="1">
    <br>

    <h3>Friday</h3>
    <input name="start_time_fri" type="time" value="09:00:00" step="1">
    Break 1 <input name="break1_start_fri" type="time" value="12:00:00" step="1">
    to
    <input name="break1_end_fri" type="time" value="12:30:00" step="1">

    <br>
    <input name="end_time_fri" type="time" value="17:00:00" step="1">
    Break 2 
    <input name="break2_start_fri" type="time" value="15:00:00" step="1">
    to
    <input name="break2_end_fri" type="time" value="15:30:00" step="1">
    <br>

    <h3>Saturday</h3>
    <input name="start_time_sat" type="time" value="09:00:00" step="1">
    Break 1 <input name="break1_start_sat" type="time" value="12:00:00" step="1">
    to
    <input name="break1_end_sat" type="time" value="12:30:00" step="1">

    <br>
    <input name="end_time_sat" type="time" value="17:00:00" step="1">
    Break 2 
    <input name="break2_start_sat" type="time" value="15:00:00" step="1">
    to
    <input name="break2_end_sat" type="time" value="15:30:00" step="1">
    <br>

    <h3>Sunday</h3>
    <input name="start_time_sun" type="time" value="09:00:00" step="1">
    Break 1 <input name="break1_start_sun" type="time" value="12:00:00" step="1">
    to
    <input name="break1_end_sun" type="time" value="12:30:00" step="1">

    <br>
    <input name="end_time_sun" type="time" value="17:00:00" step="1">
    Break 2 
    <input name="break2_start_sun" type="time" value="15:00:00" step="1">
    to
    <input name="break2_end_sun" type="time" value="15:30:00" step="1">
    <br>
    {{ Form::submit('Submit') }}

{{ Form::close() }}



</body>

</html>