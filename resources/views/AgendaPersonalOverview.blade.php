<?php if (!isset($agendaObj)) { $agendaObj = ''; } ?>

<html>
    
<head>
        
        
</head>    
    
<body>
 
<form action="agendaOverviewpost" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <select class="form-control" name="agendaSelect">
        @foreach($allAgendasArray as $agenda)
        <option value="{{$agenda['id']}}">{{$agenda['description_intern']}}</option>
        @endforeach
  </select>
    
    <input type="date" name="date">
    
  <input type="submit" value="Submit"> 
  
</form>
    
    @if ($workday)
        @foreach ($workday as $workdayTime)
    <table border="1">
        <tr>
            <td width="50px"><b>{{ $workdayTime['time'] }}</b></td>
            <td width="50px">{{ $workdayTime['status'] }}</td>
            <td width="400px"></td>
        </tr>
        @endforeach
        
    </table>
    
    @endif
    
    
    
    
    
    @if ($workday)
    
    <pre>
    <?php 
    var_dump($workday);
    ?>
    </pre>
    @endif
    
</body>    
    
    
    
    
    
    
    
    
</html>
