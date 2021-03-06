<?php 

require_once 'database.php';

class DbActions extends Database{


//insert record in one table
public function insert_record($table,$fields){

	global $db;

	$sql="INSERT INTO ".$table."(".implode(",", array_keys($fields)).") VALUES('".implode("','", array_values($fields))."')";
	

	return $db->query($sql);

}

// fetch all records
public function fetch_records($table){
	
	global $db;

	$arr=array();

	$sql="SELECT * FROM ".$table;
	
	$arr=array();
	$query=$db->query($sql);
	while($row=mysqli_fetch_assoc($query)){
		$arr[]=$row;
	}
	return $arr;


}

//select records
public function select_record($table,$where){
	global $db;
	$condition='';
	$arr=array();
	foreach($where as $key=>$value){
		$condition .= $key."='".$value."' AND ";
	}

	$condition=substr($condition,0, -4);


	$sql="SELECT * FROM ".$table." WHERE ".$condition;
	$query=$db->query($sql);

	while($row=mysqli_fetch_assoc($query)){
		$arr[]=$row;
	}
	return $arr;
}

//Join tables
function join_tables($tables, $rows = '*', $join = null, $where = null, $order = null) {
	global $db;
	
	$arr=array();
    $mainTable = $tables[0];
    $sql = "SELECT ".$rows." FROM ".$mainTable;

   	if($join != null){
    for($i = 1; $i<count($tables);$i++) {
        $joinTable = $tables[$i];
        $joinField = $join[$i-1];
        $sql.= " JOIN ".$joinTable." ON ".$joinField;
    	}
	}
	
	if($where != null){
		$sql .= ' WHERE '.$where;
	}
		
	if($order != null){
		$sql .= ' ORDER BY '.$order;
	}     

	$q=$db->query($sql);
	while($row=mysqli_fetch_assoc($q)){
		$arr[]=$row;
	}
			return $arr;
			


}


//update table

public function update($table,$params=array(),$where){
	global $db;

	$args=array();
	foreach($params as $field=>$value){
	// Seperate each column out with it's corresponding value
	$args[]=$field.'="'.$value.'"';
	}

			// Create the query
	$sql='UPDATE '.$table.' SET '.implode(',',$args).' WHERE '.$where;


	$db->query($sql);

}


//delete record

public function delete($table,$where = null){
	global $db;

if($where == null){
     $sql = 'DROP TABLE '.$table; // Create query to delete table
  }else{
    $sql = 'DELETE FROM '.$table.' WHERE '.$where; // Create query to delete rows
	
$db->query($sql);

}


}

    //upload photo
    public function uploadPhoto($table,$field){
    	global $db;
        $message="";
        $upOne = realpath(__DIR__ . '/..');
        $safeDir = $upOne.DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR;
        $filename = basename($_FILES['image']['name']);
        $ext = substr($filename, strrpos($filename, '.') + 1);
        

        //check to see if upload parameter specified
        if(($_FILES["image"]["error"]==UPLOAD_ERR_OK) && ($ext == "png") && ($_FILES["image"]["type"] == "image/png") && ($_FILES["image"]["size"] < 70000000)){
            //check to make sure file uploaded by upload process
            if(is_uploaded_file($_FILES["image"]["tmp_name"])){
                // capture filename and strip out any directory path info
                $fn = basename($_FILES["image"]["name"]);
                //Build now filename with safty measures in place
                $copyfile = $safeDir."safe_prefix_secure_info".strip_tags($fn);
                $path="assets".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."safe_prefix_secure_info".strip_tags($fn);
                //copy file to safe directory
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $copyfile)){
                    $message .= "<br>Successfully uploaded file $copyfile\n";
                    $sql = "INSERT INTO ".$table."(".$field.") VALUES ('$path')";
                   
               	$db->query($sql);
}
    $list = glob($safeDir . "*");
}
}
}



//update photo
    public function updatePhoto($table,$row,$where=null){
    	global $db;
        $message="";
        $upOne = realpath(__DIR__ . '/..');
        $safeDir = $upOne.DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR;
        $filename = basename($_FILES['image']['name']);
        $ext = substr($filename, strrpos($filename, '.') + 1);
        

        //check to see if upload parameter specified
        if(($_FILES["image"]["error"]==UPLOAD_ERR_OK) && ($ext == "png") && ($_FILES["image"]["type"] == "image/png") && ($_FILES["image"]["size"] < 70000000)){
            //check to make sure file uploaded by upload process
            if(is_uploaded_file($_FILES["image"]["tmp_name"])){
                // capture filename and strip out any directory path info
                $fn = basename($_FILES["image"]["name"]);
                //Build now filename with safty measures in place
                $copyfile = $safeDir."safe_prefix_secure_info".strip_tags($fn);
                $path="assets".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."safe_prefix_secure_info".strip_tags($fn);
                //copy file to safe directory
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $copyfile)){
                    $message .= "<br>Successfully uploaded file $copyfile\n";
                 	// Create the query
	$sql='UPDATE '.$table.' SET '.$row.'="'.$path.'" WHERE '.$where;
	
               	$db->query($sql);
}
    $list = glob($safeDir . "*");
}
}
}

}

$obj=new DbActions();





