<html>
    
<head>
</head>

<body>
    
<h1> Create appointment </h1>

<ul>
    @if ($errors->any())
    {!! implode('', $errors->all('<li><b>:message</b></li>')) !!}
    @endif
</ul>

{{ Form::open(array('url' => '/postAppointment')) }}
	
<table>
	<tr>
		<th>
			Patient
		</th>
		<th>
			Specialist
		</th>
		<th>
			Date
		</th>
		<th>
			Time
		</th>
		<th>
			Duration (for groups this is total duration)
		</th>
		<th>
			Treatment Type
		</th>
	</tr>

	<tr>
		<td>
			<select class="form-control" name="patientSelect">
	        @foreach($allPatientsArray as $patient)
	        <option value="{{$patient['id']}}">{{$patient['first_name']}} {{$patient['last_name']}}, {{$patient['date_of_birth']}}, {{$patient['address']}} {{$patient['house_number']}} </option>
	        @endforeach
	        </select>
    	</td>
    	<td>
	    	<select class="form-control" name="agendaSelect">
	        @foreach($allAgendasArray as $agenda)
	        <option value="{{$agenda['id']}}">({{$agenda['description_intern']}}), {{$agenda['type']}}  </option>
	        @endforeach
    		</select>
    	</td>
    	<td> {{ Form::date('date', \Carbon\Carbon::now()) }}</td>
    	<td><input type="time" step="1" name="time" value="09:00:00"></td>
    	<td><input type="number" value="10" name="duration"> </td>
    	<td><input type="text" value="Controle" name="treatment_type"></td>

	</tr>


</table>


<select class="form-control" name="appointmentSelect">
<option value="single">Single Appointment</option>
<option value="group">Group Appointment</option>
</select>
<input type="text" name="description">Description (only for group appointments)</input>

{{ Form::submit('Submit') }}
{{ Form::close() }}



</body>

</html>