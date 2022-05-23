<?php
include('config.php');
$sth = mysqli_query($conn, "SELECT * from attendanceregister WHERE userID ='AA000371' ");
$rows = array();
while($r = mysqli_fetch_assoc($sth)) {
    $rows[] = $r;
}
echo json_encode($rows[0]);
echo "<br><br><br>";
$json = json_encode($rows);
echo $json;
echo "<br><br><br>";
print $json;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script type="text/javascript" >
        console.log(<?php echo json_encode($rows) ?>);
    </script>
</body>
</html>