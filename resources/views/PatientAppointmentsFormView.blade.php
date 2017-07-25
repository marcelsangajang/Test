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


 
    

    First name <input name="first_name" type="text"> <br>
    Last name <input name="last_name" type="text"> <br>
    Date of birth <input name="date_of_birth" type="date"> <br>
    {{ Form::submit('Submit') }}

{{ Form::close() }}



</body>

</html>