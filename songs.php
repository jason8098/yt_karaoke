<?php
$n = $_GET['name'];
$s = $_GET['str'];
function get_content($name,$str){
  $c=0;
  $conn = mysqli_connect("localhost", "root", "", "nrb");
  $result = mysqli_query($conn,"SELECT * FROM `songs`");
  while($data = mysqli_fetch_assoc($result)){
    $dd=$data[$name];
    
    if($str==0){
      echo "'$dd',";
    }else if($str==1){
      ++$c;
      echo "<tr><td>".$c."</td><td>".$dd."</td><td style='padding:2px;'><button class='btn2' onclick='cancle(".$c.")'>취소</button></td>";
    }else if($str==2){
        echo $dd.' / ';
        
    }
  }
}
get_content($n,$s)
?>
