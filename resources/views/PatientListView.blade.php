<html>
    
<head>
</head>

<body>
    

    
  

<table border="1">
	<th>
		<td>ID</td>
		<td>First name</td>
		<td>Last name</td>
		<td>Date of birth</td>
		<td>Address</td>
		<td>House number</td>
		<td>Zipcode</td>
		<td>Phone number 1</td>
		<td>Phone number 2</td>
		<td>Email</td>
	</th>
	@foreach ($allPatientsArray as $patient)                        
        	<tr>
        		<td></td>
        		<td>{{ $patient['id'] }}</td>
            	<td>{{ $patient['first_name'] }}</td>
            	<td>{{ $patient['last_name'] }}</td>
            	<td>{{ $patient['date_of_birth'] }}</td>
            	<td>{{ $patient['address'] }}</td>
            	<td>{{ $patient['house_number'] }}</td>
            	<td>{{ $patient['zipcode'] }}</td>
            	<td>{{ $patient['phone_number_1'] }}</td>
            	<td>{{ $patient['phone_number_2'] }}</td>
            	<td>{{ $patient['email'] }}</td>
            </tr>    
    @endforeach
</table>



</body>

</html>