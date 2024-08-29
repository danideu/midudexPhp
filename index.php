<?php
#Inicializar una nueva sesión de CURL; ch = cURL handle
const API_URL = "https://www.whenisthenextmcufilm.com/api";
$ch = curl_init(API_URL);

#Indicar que queremos recibir el resultado de la petición y no mostrarlo en pantalla (de momento)
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
#Ejecutar la petición y guardamos el resultado
$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);
?>
<head>
    <title>La próxima película de marvel</title>
    <meta name="description" content="La próxima película de marvel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Centered viewport -->
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >
</head>
<main>
    <!-- <pre><?= var_dump($data); ?></pre> -->
<section>
    <img src="<?= $data["poster_url"] ?>" width="200" alt="">
</section>
</main>
    <hgroup>
        <h3><?= $data["title"]?> se estrena en <?= $data["days_until"] ?> días</h3>
        <p>Fecha de estreno <?= $data["release_date"] ?></p>
        <p>La siguiente peli es: <?= $data["following_production"]["title"]?></p>
    </hgroup>
<style>
    body{
        display: grid;
        place-content: center;
    }
</style>