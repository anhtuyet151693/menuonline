<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mongo_db 
{
	public function __construct()
	{

		//get instance of CI class
		if(function_exists('get_instance')){
			$this->_ci = get_instance();
		}

		else
		{
			$this->_ci = NULL;
		}

		//load the config file which we have created in 'config' directory
		$this->_ci->load->config('mongodb');


		$config      = 'default';
		// Fetch Mongo server and database configuration from config file which we have created in 'config' directory
		$config_data = $this->_ci->config->item($config);

		try
		{
			//connect to the mongodb server
			$this->mb = new MongoClient ('mongodb://'.$config_data['mongo_server']);
			
			//select the mongodb database
			$this->db = $this->mb->selectDB($config_data['mongo_dbname']);
		}
		catch(MongoConnectionException $exception){
			//if mongodb is not connect, then display the error
			show_error('Unable to connect to Database', 500);
		}


	}
}
?>