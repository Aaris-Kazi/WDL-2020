<?php
include 'connect.php';
include 'head.php';
$output ='';
if(isset($_POST['query']))
{
$search = mysqli_real_escape_string($conn,$_POST["query"]);
 $query = "
 SELECT place FROM trip_name
 WHERE place LIKE '%".$search."%'
 ";
 $result = mysqli_query($conn, $query);

 $output = '';

 if(mysqli_num_rows($result) > 0)
 {
    while ($row = mysqli_fetch_array($result))
    {
        $output .= '
        <li class="list-group-item" id = "trip-list">
        <a href="javascript:void(0)" class="gsearch" style="color:#333;text-decoration:none;">'.$row["place"].'</a>
        </li>
        ';
    }

 echo $output;
}
 }
else
{
    $output .= '
 <li class="list-group-item" id = "trip-list" >
 NO PLACE FOUND
</li>
 ';
 echo $output;
}


?>