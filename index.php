<!-- Stampare tutti i nostri hotel con tutti i dati disponibili.
Iniziate in modo graduale. Prima stampate in pagina i dati, senza preoccuparvi dello stile. Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
 -->

<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];
function filterRating($var)
{
    global $userRating;
    return ($var['vote'] > $userRating);
};
function filterParking($var)
{
    global $userParking;
    return ($var['parking'] == $userParking);
};
$userRating = $_GET['rating'];
$userParking = $_GET['parking'];
if (!is_null($userRating)) {
    $hotels = array_filter($hotels, 'filterRating');
};
if (!is_null($userParking)) {
    $userParking = (bool)$userParking;
    $hotels = array_filter($hotels, 'filterParking');
};


var_dump($userParking);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <form action="" method="GET">
            <h4>Parcheggio</h4>
            <select name="parking" id="parking">
                <option value="1">Sì</option>
                <option value="0">No</option>
            </select>
            <h4>Seleziona Una Valutazione</h4>
            <select name="rating" id="rating">
                <option value="1">1/5</option>
                <option value="2">2/5</option>
                <option value="3">3/5</option>
                <option value="4">4/5</option>
                <option value="5">5/5</option>
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="container py-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance From Center</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $key => $hotel) : ?>
                    <tr>
                        <th scope="row"><?php echo $key + 1 ?> </th>
                        <td><?php echo $hotel['name'] ?></td>
                        <td><?php echo $hotel['description'] ?></td>
                        <td><?php echo $hotel['parking'] ? 'Parcheggio presente' : 'Parcheggio assente' ?></td>
                        <td><?php echo $hotel['vote'] ?>/5</td>
                        <td><?php echo $hotel['distance_to_center'] ?> Km</td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>



</body>

</html>