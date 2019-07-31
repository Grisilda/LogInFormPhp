<?php
  $ussername=filter_input(INPUT_POST, 'username');
  $password=filter_input(INPUT_POST, 'password');

  $connect=mysqli_connect('localhost','root','','userdb');
  $query="Select role from user where ussername = "."'$ussername'"." and password = "."'$password'";
  $query2="Select id from user where ussername = "."'$ussername'"." and password = "."'$password'";
  $data=mysqli_query($connect,$query);
  $row=mysqli_fetch_array($data);
   $data2=mysqli_query($connect,$query2);
  $row2=mysqli_fetch_array($data2);
  session_start();
  $_SESSION['id']=$row2[0];
  // print_r("session ".$_SESSION['id']); die;
  if($row[0]==2){
  	header('Location: ../../user/html/worker.html');
  }
  else if($row[0]==1){
  	header('Location: ../../admin/html/admin.html');
  }
  else if($row[0]==0){
  	echo "<script type='text/javascript'>
  	alert('There was a problem with your credentials!');
  	window.location.href='../html/logimi2.html';
  	</script>";
  }
?>