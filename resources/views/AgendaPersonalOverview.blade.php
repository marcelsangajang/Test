<html>
    
<head>
        
        
</head>    
    
<body>

    {{ Form::select('Select Agenda', array(
       'Tandarts' => 'Tandarts',
       'Mondhygieste' => 'Mondhygieste',
       'prevassistent' => 'Prev. assistente'                         
    )) }}    
    
   @if ($test)
   @foreach($test as $test2)
      {{ $test2 }}
   @endforeach
@endif 
    
    
    
</body>    
    
    
    
    
    
    
    
    
</html>
