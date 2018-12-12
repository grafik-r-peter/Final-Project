<?php 
require_once '../../db_actions.php';
if($_GET['id']) {
    $id = $_GET['id'];

 $sql = "SELECT * FROM student_profile WHERE profile_id = {$id}";
    $rows=$db->query($sql);
 
 $skills = "SELECT * FROM skills";
    $row=$db->query($skills);


}
 ?>
 <form action="../actions/a_add_skills.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <?php foreach($rows as $data) {?>
           
                <input type="hidden" name="id" value="<?php echo $data['profile_id']?>" />
                 <?php }?>

                <?php foreach($row as $skill) {?>
                   <input type="checkbox" name="skills[]" value="<?php echo $skill['skill'] ?>"><?php echo $skill['skill']; }?>       
                <td><button type="submit">Save Changes</button></td>
                <td><a href="index.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>