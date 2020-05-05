<?php
$faculty_name =$_POST['faculty_name'];
$subject =$_POST['subject'];
$semester =$_POST['semester'];
$year =$_POST['year'];
$section =$_POST['section'];

if (isset($_POST['A1'])) {
    $A1 = $_POST['A1'];
    
    if ($A1 == 'checked') {
    $A1 = 'checked';
    }else{
        $A1='NULL';
    }}
    else 
    {
        if(isset($_POST['AT1'])){
            $AT1 = $_POST['AT1'];
        
       $A1=$AT1;
    }else 
    {
        
        $AT1='NULL';
    }

    }


if (isset($_POST['B1'])) {
        $B1 = $_POST['B1'];
        
        if ($B1 == 'checked') {
        $B1 = 'checked';
        }else{
            $B1='NULL';   
        }}
        else 
    {
        if(isset($_POST['BT1'])){
            $BT1 = $_POST['BT1'];
        
       $B1=$BT1;
    }else 
    {
       
        $BT1='NULL';
    } 
        
    }
    
        
        
         
      
if (isset($_POST['C1'])) {
            $C1 = $_POST['C1'];
            
            if ($C1 == 'checked') {
            $C1 = 'checked';
            } else {
                $C1='NULL'; 
            }}
            else 
    {
        if(isset($_POST['CT1'])){
            $CT1 = $_POST['CT1'];
        
       $C1=$CT1;
    }else 
    {
        
        $CT1='NULL';
    }
        
    }
           
           
                
    
if (!empty($faculty_name )||!empty($subject )||!empty($semester )||!empty($year )||!empty($section ))
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "audit";
    // Create connection
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
    if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
    }
    else{
    $SELECT = "SELECT faculty_name From daa Where faculty_name = ? Limit 1";
    $INSERT="INSERT Into daa(faculty_name ,subject ,semester ,year,section,A1,B1,C1) values(?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $faculty_name);
     $stmt->execute();
     $stmt->bind_result($faculty_name);
     $stmt->store_result();

    $rnum = $stmt->num_rows;
     if ($rnum==0) {
    $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("ssisssss",$faculty_name ,$subject ,$semester ,$year,$section,$A1,$B1,$C1);
    $stmt->execute();
    echo "New record inserted sucessfully";
     }

    $stmt->close();
    $conn->close();
    }}
    else{
    echo "all fields required";
    die();
    }

    
    
    ?>