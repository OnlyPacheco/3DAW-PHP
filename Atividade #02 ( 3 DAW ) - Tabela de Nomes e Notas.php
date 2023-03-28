<?php 
      $nomes = array("jose", "neusa", "antonio", "erika", "tiago", "chico");

      $notas = array(7.5, 7.0, 7.1, 8.0, 8.5, 7.7);

      echo $nomes[0];
      echo "<br>";
      echo $nomes[1];
      echo "<br>";
      echo $nomes[2];
      echo "<br>";
      echo $nomes[3];
      echo "<br>";
?> 

<html>
  <head>
    <title>3DAW - if/else/for...</title>
  </head>
  <body>
      <h1>Array</h1>

    <table border = "1">
      <tr>
        <th>Nome</th>
        <th>Nota</th>
        <th>Status</th>
      </tr>

     

     <?php
    for ($x = 0; $x <=5 ; $x++  ) {?>

      
  <tr>
        <td><?php echo $nomes[$x] ?></td>
        <td><?php echo $notas[$x] ?></td>
        <td > <?php if ($notas[$x] > 8)
    {
      
echo "<span style='color:green;'>  Aprovado menó </span>";
} else
{
$status
 echo "<span style='color:red;'>  Reprovado menó </span>";
  
} ?></td>
    
</tr>

     <?php } ?>
      

    </table>
    
    <script src="https://replit.com/public/js/replit-badge.js" theme="blue" defer></script> 
  </body>
</html>
      
              