<html>
    
<head>
</head>

<body>
    
    <p> test </p>
    
@if ($workdayArray)


    
@foreach($workdayArray as $timeBlock)

<table border="1">
    <tr>
        <td>{{ $timeBlock['time'] }}</td>
        <td>{{ $timeBlock['status'] }}</td>
    </tr>
</table>
@endforeach



@endif

</body>

</html>