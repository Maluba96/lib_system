<?php
	/**
	 * Database connection file
	 */
	class DB{
		private $con = null;
		function ___construct(){
			$host = "localhost";
			$username = "richard";
			$password = "123456789";
			$db_name = 'lib_system';

			$this->con = new mysqli($host, $username, $password, $db_name);
		}

		function select($sql){
			$result = $this->con->query($sql);
			return $result;
		}
		function insert($sql){
			// returns boolean
			$result = $this->con->query($sql);
			return $result;
		}

	}