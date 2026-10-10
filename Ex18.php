<?php

$input = array (
  array("Marlon", "Dermatologista", "2026-10-10", "14:00"),
  array("Susane", "Oftalmologista", "2002-06-05", "16:30"),
  array("Oráculo", "Neurologista", "2002-07-22", "6:00"),
  array("Marlon", "Oftalmologista", "2002-07-15", "14:00")
);

echo organizarAgenda($input);

function organizarAgenda($data)
{
$howmany = howMany($data);
$uniques = diferentesPacientes($data);
$especialidades1 = quantidadeEspecialidade($data)['dermato'];
$especialidades2 = quantidadeEspecialidade($data)['oftalmo'];
$especialidades3 = quantidadeEspecialidade($data)['neuro'];
echo 'Quantidade de consultas: ' . $howmany . '<br>';
echo 'Quantidade de pacientes diferentes: ' . $uniques . '<br>';
echo 'Consultas com dermatologista: ' . $especialidades1 . '<br>';
echo 'Consultas com oftalmologista: ' . $especialidades2 . '<br>';
echo 'Consultas com neurologista: ' . $especialidades3 . '<br>';
}

function howMany($array)
{
$counter = 0;
$howmany = 0;
while (isset($array[$counter][0]))
{
$howmany += 1;
$counter += 1;
}
return $howmany;
}

function diferentesPacientes($array)
{
$newarray = [];
$counter = 0;
while (isset($array[$counter][0]))
{
$newarray[] = $array[$counter][0];
$counter += 1;
}
$newerarray = array_unique($newarray);
$counter = 0;
$howmanynewerarray = 0;
while (isset($newerarray[$counter]))
{
$howmanynewerarray += 1;
$counter += 1;
}
return $howmanynewerarray;
}

function quantidadeEspecialidade($array)
{
$counter = 0;
$dermato = 0;
$oftalmo = 0;
$neuro = 0;
while (isset($array[$counter][1]))
{
switch($array[$counter][1])
{
    case "Dermatologista":
        $dermato += 1;
    break;
    case "Oftalmologista":
        $oftalmo += 1;
    break;
    case "Neurologista":
        $neuro += 1;
    break;
}
$counter += 1;
}
return[
    'dermato' =>  $dermato,
    'oftalmo' =>  $oftalmo,
    'neuro' =>  $neuro
];
}

function consultasdoDia($array)
{
$counter = 0;
$listaDatas = [];
$today = 0;
while (isset($array[$counter][2]))
{
if (str_replace('-', "", $array[$counter][2]) == date("Ymd"))
{
$listaDatas[] = $array[$counter][2];
$today = 1;
}
$counter += 1;
}
$counter = 0;
while (isset($listaDatas[$counter]))
{
$counter += 1;
}
if ($today == 0)
    {
        return[
        'primeira' => "Não há consultas hoje",
        'ultima' => "Não há consultas hoje"
        ];
    } 

else{
    sort($listaDatas);
    return[
        'primeira' => $listaDatas[0],
        'ultima' => $listaDatas[$counter-1]
    ];
}
echo $listaDatas[0];
}

/* DID SOMEONE EVEN MANAGE TO DO THIS WITHOUT THE HELP
OF THE DEVIL'S MACHINE? EVERY NEW LINE I WRITE INTO THIS
ONLY GROWS THE COMPLEXITY OF THIS USELESS DOCUMENT. THIS
CODE CAN NOT DO SHIT WORTH ANYONE'S TIME WITHOUT SQL
CONNECTIONS. AND I SURE BET IT WOULD BE A LOT EASIER TO
QUERY IN SEARCH OF EVERYTHING IN A SPECIFIC DAY OR TIME
WITH THEM. I AM CURRENTLY SITTING IN A DINNER TABLE
SURROUNDED BY FOUR "AUNTS" (women above 50) SPEAKING 
LOUDLY ABOUT THE MOST BRAIN-DEAD, USELESS TOPICS AND
I GUARANTEE THERE'S IS NO BETTER PLACE TO WORK RIGHT NOW. */

?>