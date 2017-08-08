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

{{ Form::open(array('url' => '/PatientGroupAppointmentPost')) }}
	
<table>
	<tr>
		<th>
			Patient Group
		</th>
	</tr>
	<tr>
		<td>
			<div name="patientGroup">
	        @foreach($allPatientsArray as $patient)
	        <option value="{{$patient['id']}}">{{$patient['first_name']}} {{$patient['last_name']}} </option>
	        @endforeach
	        </div>
	        
    	</td>
	</tr>


</table>




{{ Form::submit('Submit') }}
{{ Form::close() }}



</body>

</html>