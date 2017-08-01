<html>
    
<head>
</head>

<body>
    
<h1> Create period </h1>

<ul>
    @if ($errors->any())
    {!! implode('', $errors->all('<li><b>:message</b></li>')) !!}
    @endif
</ul>

{{ Form::open(array('url' => '/ChairPeriodPost')) }}


   
    Chair
    <select class="form-control" name="ChairSelect">
        @foreach($allChairsArray as $Chair)
        <option value="{{$Chair['id']}}">{{$Chair['description']}}</option>
        @endforeach
    </select>
    <br>
    {{ Form::label('description', 'Description') }}
    
    {{ Form::text('description', Input::old('description')) }}
    <br>
                
    {{ Form::label('start_date', 'Start date') }}
    {{ Form::date('start_date', \Carbon\Carbon::now()) }}

    <br>

    {{ Form::label('end_date', 'End date') }}
    {{ Form::date('end_date', \Carbon\Carbon::now()) }}

    <br>

    <h1> Workdays </h1>
    
    <h3>Monday</h3>
    <input name="start_time_mon" type="time" value="09:00:00" step="1">
    
    <input name="end_time_mon" type="time" value="17:00:00" step="1">

    
    <h3>Tuesday</h3>
    <input name="start_time_tue" type="time" value="09:00:00" step="1">
    <input name="end_time_tue" type="time" value="17:00:00" step="1">


    <h3>Wednesday</h3>
    <input name="start_time_wed" type="time" value="09:00:00" step="1">

    <input name="end_time_wed" type="time" value="17:00:00" step="1">
   

    <h3>Thursday</h3>
    <input name="start_time_thu" type="time" value="09:00:00" step="1">
    <input name="end_time_thu" type="time" value="17:00:00" step="1">
    

    <h3>Friday</h3>
    <input name="start_time_fri" type="time" value="09:00:00" step="1">
    <input name="end_time_fri" type="time" value="17:00:00" step="1">
    
    <h3>Saturday</h3>
    <input name="start_time_sat" type="time" value="09:00:00" step="1">
    <input name="end_time_sat" type="time" value="17:00:00" step="1">

    <h3>Sunday</h3>
    <input name="start_time_sun" type="time" value="09:00:00" step="1">
    <input name="end_time_sun" type="time" value="17:00:00" step="1">
   <br>
    {{ Form::submit('Submit') }}

{{ Form::close() }}



</body>

</html>