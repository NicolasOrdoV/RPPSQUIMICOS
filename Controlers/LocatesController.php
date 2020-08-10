<?php

/**
 * Controlador localidades
 */
class LocatesController 
{
	static public function selectLocates()
	{
		$table = 'localidad';
		$answer = Locates::select($table);
		return $answer;
	}
	
}