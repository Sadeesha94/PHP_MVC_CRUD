
<html>
<?php 
    require "controller.php";
?>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body >
<div style="width:100%;text-align:center">
<h1> Student Detail System</h1>
</div>
<div style="width:100%;" class="w3-center">
<form action="view.php" method="post" class="form" enctype="multipart/form-data">
<div style="margin:10px;"> Name :<input  name="Name" type="text" value="<?php echo (isset($name))?$name:'';?>"></div>
<div style="margin:10px;"> Address :<input  name="Address" type="text" value="<?php echo (isset($Add))?$Add:'';?>"></div>
<div style="margin:10px;"> Telephone :<input  name="Telephone" type="text" value="<?php echo (isset($Tel))?$Tel:'';?>"></div>

<div style="margin:10px;"> Standard :<input  name="Standard" type="text" value="<?php echo (isset($Std))?$Std:'';?>"></div>
<div style="margin:10px;" > Roll Number :<input  name="RollNumber" type="text" value="<?php echo (isset($RNo))?$RNo:'';?>"></div>
<div style="margin:10px;" ><input  name="student_id" style="display:none;" type="text" value="<?php echo (isset($studenId))?$studenId:'';?>"></div>
</div>
<div   class="w3-cell-row w3-center w3-padding">

<input  name="submit"  class="w3-btn w3-blue w3-border w3-margin" type="submit" value="Insert"/>
<input  name="Update" class="w3-btn w3-blue w3-border w3-margin" type="submit" value="Update"/>
<input  name="Delete" class="w3-btn w3-red w3-border w3-margin" type="submit" value="Delete"/>
</form>
</div>

    <table class="w3-table-all w3-small ">
            <tr >
                <td>Student_ID</td>
                <td>Name</td>
                <td>Address</td>
                <td>Telephone</td>
                <td>Standard</td>
                <td>Roll Number</td>
                <td>Select to Update / Delete</td>
            </tr>
        <?php
            
            $con = new Controller();
            $con->GetFromDB();
            
        ?>

    </table>

</body>

</html>
