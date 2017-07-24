<?php

    //This function expects a PHP standard PHP class DateTime OBJ, returns the the first 3 letters of the dayname of the given date
    // Example: 
    // $date  = new \DateTime('01-01-2017');
    // $date2 = formatSpec($date);
    // echo $date2
    // returns 'sun'

    function formatS($obj) {
        
                $format = $obj->format('l');
		$format = strtolower($format);
		$format = substr($format, 0, 3);
		
		return $format;
    }
    
    //PHP standard var_dump function + html <pre> tags, easy for testing objects, arrays etc.   
    function var_dumpS($dump) {
        
        echo '<pre>';
        var_dump($dump);
        echo '</pre>';
        
    }
    
    

