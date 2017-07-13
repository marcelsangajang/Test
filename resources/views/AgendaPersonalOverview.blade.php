<?php if (!isset($agendaObj)) { $agendaObj = ''; } ?>

<html>
    
<head>
        
        
</head>    
    
<body>
 
<form action="agendaOverviewpost" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <select class="form-control" name="agendaSelect">
        @foreach($allAgendas as $agenda)
        <option value="{{$agenda->id}}">{{$agenda->description_intern}}</option>
        @endforeach
  </select>
    
  <input type="submit" value="Submit"> 
  
</form>
    
</body>    
    
    
    
    
    
    
    
    
</html>
