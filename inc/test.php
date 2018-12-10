<?php 

include "db_actions.php";

//Select records
echo "<br> ";
echo "select records";

$where=array("user_id"=>6);
$row=$obj->select_record("users",$where);
print_r($row);
echo "<br>";

echo "Join tables: ";
$tables=array("users", "student_profile");
$rows="*";
$join=array("users.user_id=student_profile.fk_userID");

$rows=$obj->join_tables($tables,$rows,$join);

foreach($rows as $row){
	echo $row['last_name']."<br>";
	echo $row['first_name']."<br>";
	echo $row['username']."<br>";
}

//Update table
echo "<br> ";

echo "Update table: ";

$table="skills";
$params=array('skill'=>"yeeey");
$where="skillsID=6";

$obj->update($table,$params,$where);

echo "<br> ";

echo "Upload image: ";
if(isset($_POST["insert"])) {
    $obj->uploadPhoto("images","image_url");
}


//insert record
echo "<br> ";

echo "Insert record: ";
$arr=array("skill"=>"djsdjhsdj");
$obj->insert_record('skills',$arr);



//Delete record
echo "<br> ";
echo "Delete record: ";

$table="skills";
$where="skillsID=5";

$obj->delete($table,$where);


//Fecth records
echo "<br> ";
echo "Fetch records: ";

$rows=$obj->fetch_records("skills");


foreach($rows as $row){//loops to print the records
	echo $row['skillsID']."<br>";
	echo $row['skill']."<br>";
}


//Selectrecords

echo "<br> ";
echo "Select records: ";
$where=array("skill"=>"fafafaf");
$rows=$obj->select_record("skills",$where);
foreach($rows as $row){
	echo $row['skillsID']."<br>";

}
?>





<!DOCTYPE html>
<html>
<head>
<title>Welcome</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<h3 align="center">Upload photo to MySQL</h3>  
                <br />  
                <form method="post" enctype="multipart/form-data">  
                     <input type="file" name="image" id="image" />  
                     <br>  
                     <input type="submit" name="insert" id="insert" value="Insert"/>  
                </form>  
                <br>  
                <br>  
          
  
</body>
</html>
