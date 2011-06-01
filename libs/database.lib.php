<?php
class pgDB{
	private $db;
	private $host="localhost";
	private $dbname="bugbox";
	private $user="bugbox";
	private $password="bugbox";
	private $results=Array();
	
	public function __construct(){

	}
	
	public function __construct1($connect){
		if($connect)
			$this->connect();
	}
	
	public function connect(){
		$this->db = pg_connect("host=".$this->host." port=5432 dbname=".$this->dbname." user=".$this->user." password=".$this->password);
		if(!$this->db)
			throw new Exception('Connection Fail',1);
	}
	
	public function query($query){
	    $data=pg_query($this->db,$query);
	    if($data)
	        return new DBResults($data);
	    else
	        throw new Exception('Query Fail '.$query,1);
	}
	
	public function multiple($query){
		if (!pg_connection_busy($this->db)) {
      if (!pg_send_query($this->db, $query))
				throw new Exception('Query Fail',1);
		}
		
		//read query
		$this->results=Array();
		while ($data = pg_get_result($this->db)){
			array_push($this->results,new DBResults($data));
		}
		return $this->results;
	}
	
	public function transaction($query){
	    $query="BEGIN;".$query."COMMIT;";
	    return $this->multiple($query);
	}
	
	public function getResults(){
		return $this->results;
	}
	
	public function insert($query){
		
	}
	
	public function close(){
		pg_close($this->db);
	}
}

class DBResults implements Iterator{
	private $results=Array();
	private $pos;
	
	public function  __construct($res){
		$this->pos=0;
		while($data = pg_fetch_object($res))
			array_push($this->results,$data);
	}
	
	public function getNumRows(){
		return count($this->results);
	}
	
	public function current (){
		return $this->results[$this->pos];
	}
	public function key (){
		return $this->pos;
	}
	public function next (){
		++$this->pos;
	}
	public function rewind (){
		$this->pos=0;
	}
	public function valid (){
		return isset($this->results[$this->pos]);
	}
	public function first(){
	    return $this->results[0];
	}
}
?>
