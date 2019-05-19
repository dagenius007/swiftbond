<?php
/*
function getDBname(){
  $host = "localhost";
  $username = "root";
  $pass = "";
  $db= "fortune_builders";

  $conn = new mysqli($host, $username, $pass, $db);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

}*/


function checkdv($admin_id, $no_of_pple)
{

  $k = 0;
  $list_to_pay = array();
  for ($j = $admin_id; $j <= $no_of_pple * 4; $j++) {
    if ($admin_id == $j % $no_of_pple) {
      $list_to_pay[++$k] = $j;
      //echo  $list_to_pay[$k] . " ";
    } elseif ($admin_id == $no_of_pple && 0 == $j % $no_of_pple) {
      $list_to_pay[++$k] = $j;
      //echo  $list_to_pay[$k] . " ";
    }
  }


  return $list_to_pay;
}

/*function echoPayList($reg_id , $db){
    $list_to_pay = array();
    $list_to_pay = pair4($reg_id);
    for ($i=0; $i < count($list_to_pay) ; $i++) {
      $query = "select * from reg_10k where id ='$list_to_pay[$i]' ";
      $result =$conn->query($query);
    }
 }*/


function pair2()
{
  $q2 = "select * from " . $dbname . "LIMIT  2 ";
  $result = $conn->query($q2);
  return $result;
}
