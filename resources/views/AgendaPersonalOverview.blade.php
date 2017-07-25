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
        <table border="1">
            <tr>
                <th colspan="2">test</th>
            </tr>
        @foreach ($workday as $workdayTime)
            <tr>
                <td width="50px"><b>{{ $workdayTime['time'] }}</b></td>
            @if ($workdayTime['status'] == 'break')
                <td width="400px">------------------------------ {{ $workdayTime['status'] }} ------------------------------</td>
            @else
                <td width="400px">{{ $workdayTime['status'] }}</td>
            @endif
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
