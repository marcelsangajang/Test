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

{{ Form::open(array('url' => '/PatientGroupPost')) }}
	
<table>
	<tr>
		<th>
			Patient 1
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
	</tr>


</table>




{{ Form::submit('Submit') }}
{{ Form::close() }}



</body>

</html>