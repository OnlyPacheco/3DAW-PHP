<!DOCTYPE HTML>
<html lang = "pt-br">
<?php

// Definimos os valores padrões do POST:
$_POST = array_replace(['op' => '+', 'a' => 0, 'b' => 0], $_POST);

// Definimos as operações suportadas e sua função no BCMath:
$ops = ['+' => 'bcadd', '-' => 'bcsub', '*' => 'bcmul', '/' => 'bcdiv', '**' => 'bcpow', '%' => 'bcmod'];

// Encontramos a função baseado na entrada do usuário. Caso não for suportado a operação, etnão o `+` será usado como padrão:
$op = $ops[$_POST['op']] ?? $ops['+'];   

// Fazemos chamamos a função usando os valores de A e B:
$resultado = call_user_func($op, $_POST['a'], $_POST['b'], 2);

?>
<!DOCTYPE HTML>
<html lang="pt-br">
<form action="#" method="post">
    <br>A: <input name="a" type="number" step="any"
                  value="<?= htmlentities($_POST['a'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>">
    <br>B: <input name="b" type="number" step="any"
                  value="<?= htmlentities($_POST['b'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>">
    <br><?php
    foreach ($ops as $n => $_) {
        echo '<input type="submit" name="op" value="' . $n . '">';
    }
    ?>
    <br> Resultado: <input readonly value="<?= $resultado ?>">
</form>
</html>