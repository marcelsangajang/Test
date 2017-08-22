<html>
    
<head>
</head>

<body>
    
<h1> Create Schedule </h1>

<ul>
    @if ($errors->any())
    {!! implode('', $errors->all('<li><b>:message</b></li>')) !!}
    @endif
</ul>

{{ Form::open(array('url' => '/postSchedule')) }}
	
<table>
	<tr>
		<th>
			Chair
		</th>
		<th>
			Employee
		</th>
	
	</tr>

	<tr>
		<td>
			<select class="form-control" name="chairSelect">
	        @foreach($allChairsArray as $chair)
	        <option value="{{$chair['id']}}">{{$chair['description']}} </option>
	        @endforeach
	        </select>
    	</td>
    	<td>
	    	<select class="form-control" name="employeeSelect">
	        @foreach($allEmployeesArray as $employee)
	        <option value="{{$employee['id']}}">({{$employee['first_name']}}), {{$employee['last_name']}}  </option>
	        @endforeach
    		</select>
    	</td>
	</tr>
</table>
{{ Form::submit('Submit') }}
{{ Form::close() }}

-----------------------------------------------------------------------------------------------

{{ Form::open(array('url' => '/postSchedulePeriod')) }}


   
    Schedule
        <select class="form-control" name="scheduleSelect">
            @foreach($allSchedulesArray as $schedule)
            <option value="{{$schedule['id']}}">Chair {{$schedule['chair_id']}}, Employee {{$schedule['employee_id']}} </option>
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

    <h3>Monday</h3>
    Om de X weken (0 en 1 werkt nu alleen):
    <select class="form-control" name="repeat_number_mon">
        @for($i = 0; $i < 5; $i++)
        <option value="{{$i}}"> {{$i}} </option>
        @endfor
    </select>

    <br>
    Week 1:
    <input name="start_time_mon_0" type="time" value="09:00:00" step="1">
    <input name="end_time_mon_0" type="time" value="12:00:00" step="1">
    {{Form::date('date_0', \Carbon\Carbon::now())}}

    <br>
    Week 2:
    <input name="start_time_mon_1" type="time" value="12:00:00" step="1">
    <input name="end_time_mon_1" type="time" value="17:00:00" step="1">
    {{Form::date('date_1', \Carbon\Carbon::now())}}
  
    <h3>Tuesday</h3>
    <select class="form-control" name="repeat_number_tue">
        @for($i = 0; $i < 5; $i++)
        <option value="{{$i}}"> {{$i}} </option>
        @endfor
    </select>
    <input name="start_time_tue_0" type="time" value="09:00:00" step="1">
    <input name="end_time_tue_0" type="time" value="17:00:00" step="1">

    <h3>Wednesday</h3>
    <select class="form-control" name="repeat_number_wed">
        @for($i = 0; $i < 5; $i++)
        <option value="{{$i}}"> {{$i}} </option>
        @endfor
    </select>
    <input name="start_time_wed_0" type="time" value="09:00:00" step="1">
    <input name="end_time_wed_0" type="time" value="17:00:00" step="1">
   
    <h3>Thursday</h3>
    <select class="form-control" name="repeat_number_thu">
        @for($i = 0; $i < 5; $i++)
        <option value="{{$i}}"> {{$i}} </option>
        @endfor
    </select>
    <input name="start_time_thu_0" type="time" value="09:00:00" step="1">
    <input name="end_time_thu_0" type="time" value="17:00:00" step="1">
    
    <h3>Friday</h3>
    <select class="form-control" name="repeat_number_fri">
        @for($i = 0; $i < 5; $i++)
        <option value="{{$i}}"> {{$i}} </option>
        @endfor
    </select>
    <input name="start_time_fri_0" type="time" value="09:00:00" step="1">
    <input name="end_time_fri_0" type="time" value="17:00:00" step="1">
    
    <h3>Saturday</h3>
    <select class="form-control" name="repeat_number_sat">
        @for($i = 0; $i < 5; $i++)
        <option value="{{$i}}"> {{$i}} </option>
        @endfor
    </select>
    <input name="start_time_sat_0" type="time" value="09:00:00" step="1">
    <input name="end_time_sat_0" type="time" value="17:00:00" step="1">
    
    <h3>Sunday</h3>
    <select class="form-control" name="repeat_number_sun">
        @for($i = 0; $i < 5; $i++)
        <option value="{{$i}}"> {{$i}} </option>
        @endfor
    </select>
    <input name="start_time_sun_0" type="time" value="09:00:00" step="1">
    <input name="end_time_sun_0" type="time" value="17:00:00" step="1">
   <br>



    {{ Form::submit('Submit') }}

{{ Form::close() }}



</body>

</html>