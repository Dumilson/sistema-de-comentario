<?php
    $conn = mysqli_connect("localhost","root","","comentarios");
?>
<?php
                $sql = "SELECT * FROM comentario ORDER BY hora";
                $query=mysqli_query($conn,$sql);
                $contar = mysqli_num_rows($query);
                if($contar == 0){
                    echo "<li><span><strong>Seja o primeiro a comentar Em ".date('d/m/y')."</strong></span></li>";
                }else{
                    while($result = mysqli_fetch_array($query)){
                        $id = $result['0'];
                        $nome = $result['1'];
                        $sms = $result['2'];
                        $date = $result['3'];
     
                ?>
                    <li><span>
                    <strong><?php
                    echo $nome." "; 
                    ?>Em <?php echo date('d/m/s',strtotime($date)); echo " As  ".date('H:i:s');?>
                    </strong></span>
                    <?php echo "Disse: ".$sms ?> <a href="deletar.php?id=<?php echo $id;?>">Eliminar</a>
                </li>
                <?php
                } 
               }
                ?>