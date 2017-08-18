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
	@foreach ($allappointmentsArray as $appointment)                        
        	<tr>
        		<td></td>
        		<td>{{ $appointment['id'] }}</td>
            	<td>{{ $appointment['first_name'] }}</td>
            	<td>{{ $appointment['last_name'] }}</td>
            	<td>{{ $appointment['date_of_birth'] }}</td>
            	<td>{{ $appointment['address'] }}</td>
            	<td>{{ $appointment['house_number'] }}</td>
            	<td>{{ $appointment['zipcode'] }}</td>
            	<td>{{ $appointment['phone_number_1'] }}</td>
            	<td>{{ $appointment['phone_number_2'] }}</td>
            	<td>{{ $appointment['email'] }}</td>
            </tr>    
    @endforeach
</table>



</body>

</html>