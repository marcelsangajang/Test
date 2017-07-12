<html>
    
<head>
        
        
</head>    
    
<body>
 
 {{ Form::open(array('url' => '')) }}   
    
  <select class="form-control" name="agenaSelect">
    @foreach($allAgendas as $agenda)
      <option value="{{$agenda->id}}">{{$agenda->description_intern}}</option>
    @endforeach
  </select>
    
  {{ Form::submit('Submit') }} 
    
</body>    
    
    
    
    
    
    
    
    
</html>
