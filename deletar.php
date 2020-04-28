<?php
$conn = mysqli_connect("localhost","root","","comentarios");
?>
<?php


  $id = $_GET['id'];
  $sql = "DELETE FROM comentario WHERE id = '$id'";
  if(mysqli_query($conn,$sql)){
  header("Location: index.php");

  }else{
      echo "ERRO ao tentar deletar";
  }

?>