<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "testing");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM tbl_customer 
  WHERE Dealer_Name LIKE '%".$search."%'
  OR Address LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM tbl_customer ORDER BY Dealer_Name
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
 <div id="" style="overflow:scroll; height:500px;">
  <div  class="table-responsive" >
   <table class="table table-bordered table-hover">';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>
      <h3 >'.$row["Dealer_Name"].'</h3>
      <p class="address"><i class="fa fa-map-marker" aria-hidden="true"></i> '.$row['Address'].'</p>
      <div>
      <a href="https://www.'.$row['Website'].'" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i> '.$row['Website'].'</a>
      </div>
      <div>
      <a href="tel:'.$row['phone'].'"><i class="fa fa-phone" aria-hidden="true"></i> '.$row['phone'].'</a></div>
      <div>
      <a href="mailto:'.$row['Website'].'?subject=Need%20Help" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i> '.$row['email'].'</a>
      </div>
      <a><i class="fa fa-clock-o" aria-hidden="true"></i> '.$row['timing'].'</a>
    </td>
   </tr>
  ';
 }
 $output .= '
   </table>
   </div>
   </div>';
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>