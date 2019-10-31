<?php
require "models.php";
//require "view.php";
$mod1 = new Models();
$mod1->CRUD();
//$mod1->Select();

class Controller {
    
    function GetFromDB() 
    {
        $mod = new Models();
        $res  = $mod->GetDataToTable();
        while ($row = $res->fetch_assoc()) 
        {
            echo "<tr class='w3-hover-blue' style='cursor:pointer;'>";
            echo "<td>".$row['student_id']."</td>";
            echo "<td>".$row['Name']."</td>";
            echo "<td>".$row['Address']."</td>";
            echo "<td>".$row['Telephone']."</td>";
            echo "<td>".$row['Standard']."</td>";
            echo "<td>".$row['Roll_Number']."</td>";
            echo "<td><a class='w3-btn w3-green' href='view.php?student_id=".$row['student_id']."'>Select</a></td>";
            echo "</tr>";
        }
           
    }
    
    
}
if(isset($_GET['student_id']))
{
    $row = $mod1->SelectButton();
    $name=$row['Name'];
    $Add=$row['Address'];
    $Tel=$row['Telephone'];
    $Std=$row['Standard'];
    $RNo=$row['Roll_Number'];
    $studenId=$row['student_id'];
}

?>

           
