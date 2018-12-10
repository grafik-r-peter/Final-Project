<?php 

require_once 'database.php';

class DbActions extends Database{

//insert record in one table
public function insert_record($table,$fields){

	global $db;

	$sql="INSERT INTO ".$table."(".implode(",", array_keys($fields)).") VALUES('".implode("','", array_values($fields))."')";
	echo $sql;

	$db->query($sql);

}

// fetch all records
public function fetch_records($table){
	
	global $db;

	$sql="SELECT * FROM ".$table; 
	echo $sql;
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
	foreach($where as $key=>$value){
		$condition .= $key."='".$value."' AND";
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
		        
	echo $sql."<br>";
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
	echo $sql;
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
        if(($_FILES["image"]["error"]==UPLOAD_ERR_OK) && ($ext == "jpg") && ($_FILES["image"]["type"] == "image/jpeg") && ($_FILES["image"]["size"] < 70000000)){
            //check to make sure file uploaded by upload process
            if(is_uploaded_file($_FILES["image"]["tmp_name"])){
                // capture filename and strip out any directory path info
                $fn = basename($_FILES["image"]["name"]);
                //Build now filename with safty measures in place
                $copyfile = $safeDir."safe_prefix_secure_info".strip_tags($fn);
                //copy file to safe directory
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $copyfile)){
                    $message .= "<br>Successfully uploaded file $copyfile\n";
                    $sql = "INSERT INTO ".$table."(".$field.") VALUES ('$copyfile')"; 
               	$db->query($sql);
}
    $list = glob($safeDir . "*");
}
}
}
}

$obj=new DbActions();



$tables=array("users", "student_profile");
$rows="*";
$join=array("users.user_id=student_profile.fk_userID");

$rows=$obj->join_tables($tables,$rows,$join);

foreach($rows as $row){
	echo $row['last_name']."<br>";
	echo $row['first_name']."<br>";
	echo $row['username']."<br>";
}

$table="skills";
$params=array('skill'=>"yeeey");
$where="skillsID=6";

$obj->update($table,$params,$where);


if(isset($_POST["insert"])) {
    $obj->uploadPhoto("images","image_url");
}

/*$arr=array("skill"=>"djsdjhsdj");
$obj->insert_record('skills',$arr);

$table="skills";
$where="skillsID=5";

$obj->delete($table,$where);


$rows=$obj->fetch_records("skills");


foreach($rows as $row){
	echo $row['skillsID']."<br>";
	echo $row['skill']."<br>";
}

$where=array("skill"=>"fafafaf");
$rows=$obj->select_record("skills",$where);
foreach($rows as $row){
	echo $row['skillsID']."<br>";

}*/
?>

<h3 align="center">Upload photo to MySQL</h3>  
                <br />  
                <form method="post" enctype="multipart/form-data">  
                     <input type="file" name="image" id="image" />  
                     <br>  
                     <input type="submit" name="insert" id="insert" value="Insert"/>  
                </form>  
                <br>  
                <br>  
