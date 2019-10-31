<?php

class Models {
    function DB() 
    {
        $dbc=mysqli_connect("localhost","root","","studentdb");
        return $dbc;
    }

    function CRUD() 
    {
        if(isset($_POST['submit']))
        {
            $Name = $_POST['Name'];
            $Address = $_POST['Address'];
            $Telephone = $_POST['Telephone'];
            $Standard = $_POST['Standard'];
            $RollNumber = $_POST['RollNumber'];

            $query = "Insert into student_table(Name,Address,Telephone,Standard,Roll_Number) Values('$Name','$Address','$Telephone','$Standard','$RollNumber')";            

            $res  = $this->DB()->query($query);

            header("Refresh:0;url=view.php");
        }

        

        else if(isset($_POST['Update']))
        {
            $Name = $_POST['Name'];
            $Address = $_POST['Address'];
            $Telephone = $_POST['Telephone'];
            $Standard = $_POST['Standard'];
            $RollNumber = $_POST['RollNumber'];
            $SID=$_POST['student_id'];
            $query = "UPDATE student_table SET Name='$Name',Address='$Address',Telephone='$Telephone',Standard='$Standard',Roll_Number='$RollNumber' WHERE student_id=$SID";            
            // echo $query;
            $res  = $this->DB()->query($query);
            //header("Refresh:0;url=form.php");
        }
            
        else if(isset($_POST['Delete']))
        {
  
            $SID=$_POST['student_id'];
            $query = "DELETE FROM  student_table  WHERE student_id=$SID";            

            $res  = $this->DB()->query($query);
            //header("Refresh:0;url=form.php");
        }   
    }
    function GetDataToTable () {
        $res  = $this->DB()->query( "select * from student_table");
        return $res;
    }
    function SelectButton() {
        $query = "select * from student_table where student_id='".$_GET['student_id']."'";       
        $res  = $this->DB()->query($query);
        $row = $res->fetch_assoc();
        return $row;
    }
}

?>