<?php

/**
 * Laravel 5.2 - Env Editor
 * 
 * @author   Vidhya R <vidhyar2612s@gmail.com>
 * @license http://opensource.org/licenses/MIT
 * @package  Enveditor
 */

namespace vidhyar2612\Enveditor;

use Artisan;


/**
 * Array utility functions.
 */
class CoreManager
{
	


	/**
	 * Get all the env values as an array
	 * 
	 * @return mixed
	 */

	public static function all($path) {

		$data =  array();

		if(file_exists($path)) {

			$values = file_get_contents($path);

			$values = explode("\n", $values);

			foreach ($values as $key => $value) {

				$var = explode('=',$value);

				if(count($var) ==  2) {
					if($var[0] != "")
						$data[$var[0]] = $var[1] ? $var[1] : null;
				} else {
					if($var[0] != "")
						$data[$var[0]] = null;
				}
			}

			array_filter($data);
		}

		return $data;
	
	}

	/**
	 * Get an individual key and value
	 * 
	 * @param string $key 
	 *
	 * @return mixed
	 */

	public static function get($key) {

		$result = "";

		if($key) {
			$result = env($key);	
		}
		
		return $result;
	
	}

	/**
	 * Get an individual key and value
	 * 
	 * @param string $key 
	 *
	 * @return mixed
	 */

	public static function set($path,$key,$value=null) {

		$data = CoreManager::all($path);

		if(CoreManager::has($data,$key)) {

			Artisan::call('config:cache');

			$current_key_value = $key.'='.env($key);

			$value = str_replace(' ' , '_', $value);

			$new_key_value = $key.'='.$value;

			$result = file_put_contents($path, str_replace($current_key_value,$new_key_value,file_get_contents($path)));

			Artisan::call('config:cache');

			return true;
		
		}

		return false;
	
	}

	/**
	 * Create a new key with value
	 * 
	 * @param string $key 
	 * @param string $value 
	 *
	 * @return boolean
	 */

	public static function create($path,$key , $value=null) {

		$data = CoreManager::all($path);

		if(!CoreManager::has($data,$key)) {

			$contents = file_get_contents($path);

			$value = str_replace(' ' , '_', $value);

	        $data = "\n".$key."=".$value;

	        $result = file_put_contents($path, $data , FILE_APPEND | LOCK_EX);

	        return true;

			Artisan::call('config:cache');
		
		} else {
			return false;
		}

	}

	/**
	 * Determine if an array has a given key.
	 *
	 * @param  array   $data
	 * @param  string  $key
	 *
	 * @return boolean
	 */
	public static function has(array $data, $key)
	{
		if (!is_array($data)) {
			return false;
		}

		if (!array_key_exists($key,$data)) {
			return false;
		}

		return true;
	}

	/**
	 * Delete a key 
	 * 
	 * @param string $key 
	 *
	 * @return boolean
	 */

	public static function delete($path,$key) {

		if($key) {
			$delete_value = $key."=".env($key);
			file_put_contents($path, str_replace($delete_value, "", file_get_contents($path)));	
			Artisan::call('config:cache');

			return true;
		}

		return false;
	}

}
