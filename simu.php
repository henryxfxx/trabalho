<?php session_start();
if($_POST){
  $novoc = $_POST['valorc'];
  $_SESSION['respostas'][]=$novoc;
}
?>

<?php
$ganhou=0;
$perdeu=0;

$escolhaBot=rand(0,1)? "Cara": "Coroa";
$resultado=$escolhaBot;
?>


<html>
  <head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Cara ou coroa</title>
  </head>
  <body>
    <form action="simu.php" method="post">
    <h1>Cara ou Coroa </h1>
      <label for="resposta">Resposta:</label><input type="text" id="resposta" name="valorc">
      <input type="submit" value="Enviar">
      
    </form> 
    
    
  <?php if(isset($_SESSION['respostas'])): ?>
<?php foreach($_SESSION['respostas']as $resposta):
  ?>
<?php 
  if($resposta==$resultado){
    echo "Você ganhou!";
    $ganhou++;
  }else{
    echo "Você perdeu!";
    $perdeu++;
  }
?>
    <?php
echo "Você escolheu $resposta, o computador gerou $escolhaBot\n"; 
 echo "Total de vitorias: $ganhou.\n";
echo "Total de derrotas: $perdeu.\n";

?>

    <?php endforeach; ?>
  <?php endif; ?>
  
</html>