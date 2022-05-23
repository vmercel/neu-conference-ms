<?php
include("../settings/dbconfig.php");
if(isset($_POST["submit_file"]))
{
 $file = $_FILES["file"]["tmp_name"];
 $file_open = fopen($file,"r");
 while(($csv = fgetcsv($file_open, 1000, ",")) !== false)
 {
  $question = $csv[0];
  $opt_a = $csv[1];
  $opt_b = $csv[2];
  $opt_c = $csv[3];
  $opt_d = $csv[4];
  $ans = $csv[5];
  $mark = $csv[6];
  $course_code = $csv[7];
  $db_conn = mysqli_connect("localhost","root","","online_cbt");
  $success = mysqli_query($db_conn,"INSERT INTO all_questions(`question`, `opt_a`, `opt_b`, `opt_c`, `opt_d`, `ans`, `mark`, `course_code`) VALUES ('$question','$opt_a','$opt_b','$opt_c','$opt_d','$ans','$mark','$course_code')");
  if($success){
      echo "<script> alert(Questions imported successfully) </script>";
      header("Refresh:3, location:'manage_questions.php'");
  } else {
      echo "Question import FAILED!";
      header("Refresh=3, location='manage_questions.php'");
  }
}
}
?>