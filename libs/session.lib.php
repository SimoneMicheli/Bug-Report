<?php
include_once("./libs/database.lib.php");
class session{
    private $session_id=null;
    
    public function __construct(){
        session_start();
        $this->session_id=session_id();
        if($_SESSION['loggedIn']){
            return true;
        }
        else
            $_SESSION['loggedIn']=false;
            return false;
    }
    
    public function login($mail,$password){
        $db = new pgDB();
        $db->connect();
        $user=$db->query("select * from utente where email='$mail' and password=md5('$password')");
        if($user->getNumRows() > 0){
            $user=$user->first();
            $_SESSION['loggedIn']=true;
            $_SESSION['id']=$user->id;
            $_SESSION['nome']=$user->nome;
            $_SESSION['cognome']=$user->cognome;
            return true;
        }
        else
            return false;
    }
    
    public function logout(){
        $_SESSION['loggedIn']=false;
        session_destroy();
    }
    
    public function isLoggedIn(){
        if(isset($_SESSION['loggedIn']))
            return $_SESSION['loggedIn'];
        else
            return false;
    }
    
    public function getSessionId(){
        return $this->session_id;
    }
    
    public function getDisplayName(){
        return $_SESSION['nome']." ".$_SESSION['cognome'];
    }
    
    public function getUserId(){
        return $_SESSION['id'];
    }
}

?>
