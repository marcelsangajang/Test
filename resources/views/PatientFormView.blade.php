<html>
    
<head>
</head>

<body>
    
<p> Create patient </p>

<ul>
    @if ($errors->any())
    {!! implode('', $errors->all('<li><b>:message</b></li>')) !!}
    @endif
</ul>

{{ Form::open(array('url' => '/postPatient')) }}

    {{ Form::label('first_name', 'First name') }}
    {{ Form::text('first_name', Input::old('first_name')) }}
    <br>
        
    {{ Form::label('Last_name', 'Last name') }}
    {{ Form::text('last_name', Input::old('last_name')) }}
    <br>
    {{Form::label('date_of_birth', 'Date of birth')}}
    {{Form::date('date_of_birth')}}

    <br>
    {{ Form::label('zipcode', 'zipcode') }}
    {{ Form::number('zipcode', Input::old('zipcode')) }}
    <br>
    {{ Form::label('house_number', 'house number') }}
    {{ Form::number('house_number', Input::old('house_number')) }}
    <br>
    {{ Form::label('address', 'address') }}
    {{ Form::text('address', Input::old('address')) }}
    <br>
    {{ Form::label('city', 'city') }}
    {{ Form::text('city', Input::old('city')) }}

    <br>
    {{ Form::label('email', 'email') }}
    {{ Form::email('email', Input::old('email')) }}
    <br>
    {{ Form::label('phone_number', 'phone number') }}
    {{ Form::number('phone_number', Input::old('phone_number')) }}
    <br>
    
    {{ Form::submit('Submit') }}

{{ Form::close() }}



</body>

</html>