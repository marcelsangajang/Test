<?php 
	namespace App\Http\Controllers;

	use App\User;
	use App\Http\Controllers\Controller;

	class TestController extends Controller
	{
	  
	    public function doTheTest()
	    {
	        return view('test');
	    }
	}
?>