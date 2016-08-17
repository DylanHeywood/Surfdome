<?php
include '../resources/core/db.php';
class Helpers
{
	 
	function swapSpace($string)
	{
		return strtolower(str_replace(" ","-",$string));
	}
    
    function __construct()
    {
    }
}