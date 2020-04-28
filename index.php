<?php
    $conn = mysqli_connect("localhost","root","","comentarios");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
    <script src="jquery.js"></script>
    <script>
     $(function(){
        $('.btn').click(function(){
           var nome= $('#nome').val();
           var sms = $('#sms').val();
           $('.input').html('Enviando Comentario');
            $.post('cadastra.php',{
                nome_post:nome,
                sms_post:sms,
            }, function(res){
                $('.input').html(res);
                $.post('actualiza.php', function(aComent){
                    $('#comentarios ul').html(aComent);
                });
            });
            return false;
        });
     });
    </script>
    <title>Comentarios</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="conteudo">
     <div id="cabecalho">
      Comentarios
     </div>
     <div id="comentarios">
        <ul>
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
            <li><span>

            </span></li>
        </ul>
     </div>
            <div id ="formulario">
            <form  method="post" id="form" class="form">
            <div class="input">
            Seu Nome :<label for="nome"></label> 
            <br>
            <input type="text" name="nome" id="nome">
            <br>
            Seu comentario: 
            <br>
            <textarea name="sms" id="sms" cols="30" rows="10"></textarea>
            <br>
            </div>
            <input type="submit" value="Enviar" id="Enviar" name ="enviar" class="btn">
            </form>
     </div>
    </div>
</body>
</html>