<?php
//require_once("Model.php");
namespace mvc;
use  dbadapter;
class Model{
	  

	public function getAll(){
	    $SQL="SELECT * FROM ".static::$table;
		$rep =  dbadapter::$dbh->query($SQL);
	    $rep->setFetchMode(PDO::FETCH_CLASS, 'Model'.ucfirst(static::$table));
	    return $rep->fetchAll();
	}

    public function select($cle_primaire) {
	    $sql = "SELECT * from ".static::$table." WHERE ".static::$primary."=:cle_primaire";
	    $req_prep =  dbadapter::$dbh->prepare($sql);
	    $req_prep->bindParam(":cle_primaire", $cle_primaire);
	    $req_prep->execute();
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Model'.ucfirst(static::$table));
	    if ($req_prep->rowCount()==0){
			return null;
			die();
	  	}else{
			$rslt = $req_prep->fetch();
			return $rslt;
		}
	      
  	}


	public function delete($cle_primaire) {
		$sql = "DELETE FROM ".static::$table." WHERE ".static::$primary."=:cle_primaire";
		$req_prep = dbadapter::$dbh->prepare($sql);
		$req_prep->bindParam(":cle_primaire", $cle_primaire);
		$req_prep->execute();
	}

	public function update($tab, $cle_primaire) {
		$sql = "UPDATE ".static::$table." SET";
		foreach ($tab as $cle => $valeur){
			$sql .=" ".$cle."=:new".$cle.",";
		}
		$sql=rtrim($sql,",");
		$sql.=" WHERE ".static::$primary."=:oldid;";
		
		  $req_prep = dbadapter::$dbh->prepare($sql);
		  $values = array();
	  
	  foreach ($tab as $cle => $valeur){
				$values[":new".$cle] = $valeur;
		  }

		  $values[":oldid"] = $cle_primaire;
		  $req_prep->execute($values);
		  $obj = self::select($tab[static::$primary]);
		  return $obj;
    }

  public function insert($tab){
    $sql = "INSERT INTO ".static::$table." VALUES(";
    foreach ($tab as $cle => $valeur){
		$sql .=" :".$cle.",";
	}
	$sql=rtrim($sql,",");
	$sql.=");";
    $req_prep = dbadapter::$dbh->prepare($sql);
    $values = array();
    foreach ($tab as $cle => $valeur)
      		$values[":".$cle] = $valeur;
    $req_prep->execute($values);
  }
	
}
