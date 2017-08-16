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

{{ Form::open(array('url' => '/EmployeePost')) }}

    {{ Form::label('first_name', 'First name') }}
    {{ Form::text('first_name', Input::old('first_name')) }}
    <br>
        
    {{ Form::label('Last_name', 'Last name') }}
    {{ Form::text('last_name', Input::old('last_name')) }}
    <br>
    {{Form::label('date_of_birth', 'Date of birth')}}
    {{Form::date('date_of_birth')}}

    <br>
    {{ Form::label('zipcode', 'zipcode') }}
    {{ Form::number('zipcode', Input::old('zipcode')) }}
    <br>
    {{ Form::label('house_number', 'house number') }}
    {{ Form::number('house_number', Input::old('house_number')) }}
    <br>
    {{ Form::label('address', 'address') }}
    {{ Form::text('address', Input::old('address')) }}
    <br>
    {{ Form::label('city', 'city') }}
    {{ Form::text('city', Input::old('city')) }}

    <br>
    {{ Form::label('email', 'email') }}
    {{ Form::email('email', Input::old('email')) }}
    <br>
    {{ Form::label('phone_number', 'phone number') }}
    {{ Form::number('phone_number', Input::old('phone_number')) }}
    <br>
        
    {{ Form::label('description_intern', 'Description intern') }}
    <br>
    {{ Form::text('description_intern', Input::old('description_intern')) }}
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

-----------------------------------------------------------------------------------------------
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