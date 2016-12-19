<?php
/**
 * Laravel 5.2 - Env Editor
 * 
 * @author   Vidhya R <vidhyar2612s@gmail.com>
 * @package  environment-editor
 */

namespace vidhyar2612\Enveditor;

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
	 * Get all the env values as an array
	 * 
	 * @return array 
	 */

	public function all() {

		if($this->check_path()) {
			return CoreManager::all($this->path);	
		}
		return array();
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

		return CoreManager::get($this->path,$key);
	
	}

	/** 
	 * Check the key exists
	 * 
	 * @param string $key 
	 * @param string $value
	 * 
	 * @return boolean 
	 */

	public function has($key , $value=null) {
		return CoreManager::has($this->path,$key,$value);
	}

	/**
	 * Create a key with an value
	 *
	 * @param string $key
	 * @param string $value
	 * 
	 * @return boolean
	 */

	public function create($key , $value=null) {

		if($this->check_path()) {
			return CoreManager::create($this->path,$key,$value);	
		}

		return false;
		
	}

	/**
	 * Set a specific key to a value in the env file.
	 *
	 * @param string $key   Key string
	 * @param string        $value 
	 */
	public function set($key, $value = null)
	{
		if($this->check_path()) {
			return CoreManager::set($this->path,$key,$value);	
		}

		return false;
	}

	/**
	 * Delete the key and value
	 *
	 * @param string $key   Key string
	 *
	 * @return boolean
	 */

	public function delete($key) {
		if($this->check_path()) {
			return CoreManager::delete($this->path,$key);
		}
	}

}
