<?php
 
require_once '../../db_actions.php';
 
if($_GET['id']) {
    $id = $_GET['id'];
 
    $sql = "SELECT * FROM student_profile WHERE profile_id = {$id}";
    $rows=$db->query($sql);

    $skills = "SELECT * FROM skills";
    $row=$db->query($skills);
 

 
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
 
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 50%;
        }
 
        table tr th {
            padding-top: 20px;
        }
    </style>
 
</head>
<body>
 
<fieldset>
    <legend>Update user</legend>
 
    <form action="../actions/a_profile_edit.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <?php foreach($rows as $data) {?>
                <th>First Name</th>
                <td><input type="text" name="first_name" placeholder="First Name" value="<?php echo $data['first_name'] ?>" /></td>
            </tr>     
            <tr>
                <th>Last Name</th>
                <td><input type="text" name="last_name" placeholder="Last Name" value="<?php echo $data['last_name'] ?>" /></td>
            </tr>
            <tr>
                <th>Date of birth</th>
                <td><input type="text" name="description" placeholder="Date of birth" value="<?php echo $data['description'] ?>" /></td>
            </tr>
            <tr>
                <input type="hidden" name="id" value="<?php echo $data['profile_id']?>" />
                 <?php }?>

                <?php foreach($row as $skill) {?>
                   <input type="checkbox" name="skills[]" value="<?php echo $skill['skill'] ?>"><?php echo $skill['skill']; }?>       
                <td><button type="submit">Save Changes</button></td>
                <td><a href="index.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>
 
</fieldset>
 
</body>
</html>
 
<?php
}
?>