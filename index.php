<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumo de API</title>
</head>

<body>
    <?php
    $url = "https://swapi.dev/api/people";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resultado = json_decode(curl_exec($ch));
    foreach ($resultado->results as $ator) {
        echo "Nome: " . $ator->name . "<br>";
        echo "Altura: " . $ator->height . "<br>";
        echo "Cor do cabelo: " . $ator->hair_color . "<br>";
        foreach ($ator->films as $filme) {
            $titulos = file_get_contents($filme);
            $titulos = json_decode($titulos);
            $titulo = $titulos->title;
            echo "Filme: " . $titulo . "<br>";
        }
        echo "<br><br>";
    }
    //var_dump($resultado);
    ?>
</body>

</html>