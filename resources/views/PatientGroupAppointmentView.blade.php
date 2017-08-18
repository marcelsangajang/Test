<html>
    
<head>
</head>

<body>
    
<h1> Group appointment </h1>

<ul>
    @if ($errors->any())
    {!! implode('', $errors->all('<li><b>:message</b></li>')) !!}
    @endif
</ul>


<table>
	<tr>
		<th>
			Patients:
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






</body>

</html>