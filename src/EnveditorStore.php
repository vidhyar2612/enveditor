<?php
/**
 * Laravel 5.2 - Env Editor
 * 
 * @author   Vidhya R <vidhyar2612s@gmail.com>
 * @package  environment-editor
 */

namespace Vidhyar2612\Enveditor;

class EnveditorStore
{
	/**
	 * The settings data.
	 *
	 * @var array
	 */
	protected $key;

	/**
	 * Whether the store has changed since it was last loaded.
	 *
	 * @var boolean
	 */
	protected $value;

	/**
	 * Whether the settings data are loaded.
	 *
	 * @var boolean
	 */
	protected $current;


	/**
	 * Set the Basic path of the .env file
	 * 
	 * @var string
	*/ 

	protected $path;

	/**
	 * Check the environment file exists
	 * 
	 * @param string
	 */

	public function check_path() {

		$this->path = $this->path();

		return file_exists($this->path);
	}


	/**
	 * Check the environment file exists
	 * 
	 * @param string
	 */

	public function path() {

		return base_path().'/.env';
	}


	/**
	 * Get a specific key from the settings data.
	 *
	 * @param  string|array $key
	 * @param  mixed        $default Optional default value.
	 *
	 * @return mixed
	 */
	public function get($key) {

		return env($key);
	}

	/**
	 * Set a specific key to a value in the settings data.
	 *
	 * @param string|array $key   Key string or associative array of key => value
	 * @param mixed        $value Optional only if the first argument is an array
	 */
	public function set($key, $value = null)
	{
		if($this->check_path()) {

    		$current_key_value = $key.'='.env($key);

    		$new_key_value = $key.'='.$value;
    	
    		$result = file_put_contents($this->path, str_replace($current_key_value,$new_key_value,file_get_contents($this->path)));

    		return true;
		}

		return false;
	}

}
