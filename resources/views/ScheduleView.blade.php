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



</body>

</html>