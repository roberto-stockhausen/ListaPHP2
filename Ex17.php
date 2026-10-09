<?php

$input = "Johusaaysigdssy augdp7ga bas 7a9ga79";
$output = processarTexto($input);

function processarTexto($texto)
{
$palavrasFrases = quantidadeTexto($texto);
$palavrasLongasCurtas = curtoLongo($texto);

return[
    "Caracteres" => $palavrasFrases["Tamanho"],
    "Palavras" => $palavrasFrases["Palavras"],
    "Frases" => $palavrasFrases["Frases"],
    "MaisLonga" => $palavrasLongasCurtas["PalavraLonga"],
    "MaisCurta" => $palavrasLongasCurtas["PalavraCurta"]
];
}

function curtoLongo($texto)
{
$textoCaracteres = mb_strlen($texto);
$counter = 0;
$palavraAtual = "";
$palavraLonga = "";
$tamanhoPalavraLonga = 0;
$palavraCurta = "";
$tamanhoPalavraCurta = 120;
$contadorPalavras = 0;
while ($counter < $textoCaracteres)
{
if ($texto[$counter] != " ")
{
$palavraAtual = $palavraAtual . $texto[$counter];
$contadorPalavras += 1;
}
else
    {
        if ($contadorPalavras > $tamanhoPalavraLonga)
        {
            $palavraLonga = $palavraAtual;
            $tamanhoPalavraLonga = $contadorPalavras;
        }
        if ($contadorPalavras < $tamanhoPalavraCurta)
        {
            $palavraCurta = $palavraAtual;
            $tamanhoPalavraCurta = $contadorPalavras;
        }
        $palavraAtual = "";
        $contadorPalavras = 0;
    }
$counter += 1;
}
return[
    "PalavraLonga" => $palavraLonga,
    "PalavraCurta" => $palavraCurta
];
}

function quantidadeTexto($texto)
{
$textoCaracteres = mb_strlen($texto);
$textoPalavras = 1; // O contador não conta a primeira palavra, então a variável ja começa como 1.
$textoFrases = 1;
$counter = 0;
while ($counter < $textoCaracteres)
    {
        if ($texto[$counter] == " ")
            {
                $textoPalavras += 1; // Cada espaço no texto = Uma palavra a mais.
            }
        if ($texto[$counter] == ".")
            {
                $textoFrases += 1;
            }
        $counter += 1;
    }

    return [
        "Tamanho" => $textoCaracteres,
        "Palavras" => $textoPalavras,
        "Frases" => $textoFrases
    ];
}



echo "Caracteres no texto: " . $output["Caracteres"] . "<br>";
echo "Palavras no texto: " . $output["Palavras"] . "<br>";
echo "Frases no texto: " . $output["Frases"] . "<br>";
echo "Palavra mais longa: " . $output["MaisLonga"] . "<br>";
echo "Palavra mais curta: " . $output["MaisCurta"] . "<br>";

?>