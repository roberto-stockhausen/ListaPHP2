<?php

$input = "JoshuaDoBar1987#";
$output = analisarSenha($input);

function analisarSenha($senha){
$resultado = array(
    "0" => 0,
    "1" => 0,
    "2" => 0,
    "3" => 0,
    "4" => 0,
    "5" => 0
);
$resultado[0] = quantasMaiusculas($senha);
$resultado[1] = quantasMinusculas($senha);
$resultado[2] = quantosNumeros($senha);
$resultado[3] = quantosEspecial($senha);
$resultado[4] = strlen($senha);
$resultado[5] = "placeholder";
$segurancaCounter = 0;
if ($resultado[0] >= 1)
{
$segurancaCounter += 1;
}
if ($resultado[1] >= 1)
{
$segurancaCounter += 1;
}
if ($resultado[2] >= 1)
{
$segurancaCounter += 1;  
}
if ($resultado[3] >= 1)
{
$segurancaCounter += 1;   
}
if ($resultado[4] >= 8)
{
$segurancaCounter += 1;   
}
switch($segurancaCounter)
{
case 0:
$resultado[5] = "Nula";
break;
case 1:
$resultado[5] = "Muito baixa";
break;
case 2:
$resultado[5] = "Baixa";
break;
case 3:
$resultado[5] = "Média";
break;
case 4:
$resultado[5] = "Alta";
break;
case 5:
$resultado[5] = "Muito alta";
break;
}
return[
    "maiusculas" => $resultado[0],
    "minusculas" => $resultado[1],
    "numeros" => $resultado[2],
    "especiais" => $resultado[3],
    "tamanho" => $resultado[4],
    "seguranca" => $resultado[5]
];
}
function quantasMaiusculas($senha){
$senhaTamanho = mb_strlen($senha);
$counter = 0;
$resultado = 0;
while ($counter < $senhaTamanho)
{
if (ctype_upper($senha[$counter]))
{
$resultado += 1;
}
$counter += 1;
}
return $resultado;
}

function quantasMinusculas($senha){
$senhaTamanho = mb_strlen($senha);
$counter = 0;
$resultado = 0;
while ($counter < $senhaTamanho)
{
if (ctype_lower($senha[$counter]))
{
$resultado += 1;
}
$counter += 1;
}
return $resultado;
}

function quantosNumeros($senha){
$senhaTamanho = mb_strlen($senha);
$counter = 0;
$resultado = 0;
while ($counter < $senhaTamanho)
{
if (is_numeric($senha[$counter]))
{
$resultado += 1;
}
$counter += 1;
}
return $resultado;
}

function quantosEspecial($senha){
$senhaTamanho = mb_strlen($senha);
$counter = 0;
$resultado = 0;
while ($counter < $senhaTamanho)
{
if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$senha[$counter]))
{
$resultado += 1;
}
$counter += 1;
}
return $resultado;
}

echo "Quantidade de caracteres: " . $output["tamanho"] . "<br>";
echo "Quantidade de maiúsculas: " . $output["maiusculas"] . "<br>";
echo "Quantidade de minusculas: " . $output["minusculas"] . "<br>";
echo "Quantidade de números: " . $output["numeros"] . "<br>";
echo "Quantidade de caracteres especiais: " . $output["especiais"] . "<br>";
echo "Segurança da senha: " . $output["seguranca"] . "<br>";

?>