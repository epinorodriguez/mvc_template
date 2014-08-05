<?php
	
	/**
	* 
	*/
	class User 
	{
		protected $db;
		
		public function __construct($db)
		{
			try{
				$this->db = $db;
			}
			catch(PDOException $e)
			{
				die($e);
			}
		}

		public function latestUsers()
		{
			$sql = "SELECT username FROM users ORDER BY created DESC LIMIT 3";
			$result = $this->db->query($sql);
			return $result->fetchAll();
		}
	}

?>