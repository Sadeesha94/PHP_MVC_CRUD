<?php 
$dbc=mysqli_connect("localhost","root","","studentdb");
if(isset($_POST['submit']))
{
    $Name = $_POST['Name'];
$Address = $_POST['Address'];
$Telephone = $_POST['Telephone'];
$Standard = $_POST['Standard'];
$RollNumber = $_POST['RollNumber'];

$query = "Insert into student_table(Name,Address,Telephone,Standard,Roll_Number) Values('$Name','$Address','$Telephone','$Standard','$RollNumber')";            

$res  = $dbc->query($query);
header("Refresh:0");
}else if(isset($_GET['student_id']))
{
    $query = "select * from student_table where student_id='".$_GET['student_id']."'";       
    $res  = $dbc->query($query);
    $row = $res->fetch_assoc();
    $Name=$row['Name'];
    $Add=$row['Address'];
    $Tel=$row['Telephone'];
    $Std=$row['Standard'];
    $RNo=$row['Roll_Number'];
    $studenId=$row['student_id'];
}else if(isset($_POST['Update']))
{
    $Name = $_POST['Name'];
    $Address = $_POST['Address'];
    $Telephone = $_POST['Telephone'];
    $Standard = $_POST['Standard'];
    $RollNumber = $_POST['RollNumber'];
    $SID=$_POST['student_id'];
    $query = "UPDATE  student_table SET Name='$Name',Address='$Address',Telephone='$Telephone',Standard='$Standard',Roll_Number='$RollNumber' WHERE student_id=$SID";            
   // echo $query;
    $res  = $dbc->query($query);
 //   header("Refresh:0;url=index.php");
}
else if(isset($_POST['Delete']))
{
  
    $SID=$_POST['student_id'];
    $query = "DELETE FROM  student_table  WHERE student_id=$SID";            
    
    $res  = $dbc->query($query);
    //header("Refresh:0;url=index.php");
}
?>
<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body >
<div style="width:100%;text-align:center">
<h1> Student Detail System</h1>
</div>
<div style="width:100%; align:center;">
<form action="index.php" method="post" class="form" enctype="multipart/form-data">
<div style="margin:10px;display: inline-block;"> Name :<input  name="Name" type="text" value="<?php echo (isset($Name))?$Name:'';?>"></div>
<div style="margin:10px;display: inline-block;"> Address :<input  name="Address" type="text" value="<?php echo (isset($Add))?$Add:'';?>"></div>
<div style="margin:10px;display: inline-block;"> Telephone :<input  name="Telephone" type="text" value="<?php echo (isset($Tel))?$Tel:'';?>"></div>

<div style="margin:10px;display: inline-block;"> Standard :<input  name="Standard" type="text" value="<?php echo (isset($Std))?$Std:'';?>"></div>
<div style="margin:10px;display: inline-block;" > Roll Number :<input  name="RollNumber" type="text" value="<?php echo (isset($RNo))?$RNo:'';?>"></div>
<div style="margin:10px;display: inline-block;" ><input  name="student_id" style="display:none;" type="text" value="<?php echo (isset($studenId))?$studenId:'';?>"></div>
</div>
<div   class="w3-cell-row w3-center w3-padding">

<input  name="submit"  class="w3-btn w3-blue w3-border w3-margin" type="submit" value="Insert"/>
<input  name="Update" class="w3-btn w3-blue w3-border w3-margin" type="submit" value="Update"/>
<input  name="Delete" class="w3-btn w3-blue w3-border w3-margin" type="submit" value="Delete"/>
</form>
</div>
<?php


//$query =;            
$res  = $dbc->query( "select * from student_table");
        ?>
        <table class="w3-table-all w3-small ">
            <tr >
                <td>Student_ID</td>
                <td>Name</td>
                <td>Address</td>
                <td>Telephone</td>
                <td>Standard</td>
                <td>Roll Number</td>
                <td>Update / Delete</td>
            </tr>
            <?php
               while ($row = $res->fetch_assoc()) {
                   echo "<tr class='w3-hover-blue' style='cursor:pointer;'>";
                   echo "<td>".$row['student_id']."</td>";
                   echo "<td>".$row['Name']."</td>";
                   echo "<td>".$row['Address']."</td>";
                   echo "<td>".$row['Telephone']."</td>";
                   echo "<td>".$row['Standard']."</td>";
                   echo "<td>".$row['Roll_Number']."</td>";
                   echo "<td><a href='index.php?student_id=".$row['student_id']."'>Select</a></td>";
                   echo "</tr>";
               }

            ?>
        </table>
</body>

</html>