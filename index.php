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


function convertBooleanToString($value)
{
    if (is_bool($value)) {
        return $value ? 'si' : 'no';
    }
    return $value;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <form action="">
        <select name="parking" id="">
            <option value="default" selected>All</option>
            <option value="has_parking">Has Parking</option>
            <option value="no_parking"> No Parking</option>
            <input type="number" name="vote">
        </select>

        <button type="submit">invia</button>
    </form>

    <table class="table">
        <tbody>
            <?php foreach ($hotels as $data) { ?>
                <?php if (empty($_GET['parking']) || $_GET['parking'] == 'default') { ?>
                    <tr>
                        <?php foreach ($data as $value) { ?>
                            <td><?php echo convertBooleanToString($value) ?></td>
                        <?php } ?>
                    </tr>

                <?php } elseif ($_GET['parking'] == 'has_parking' && $data['parking'] && isset($_GET['vote']) && $_GET['vote'] == $data['vote']) { ?>
                    <tr>
                        <?php foreach ($data as $value) { ?>
                            <td><?php echo convertBooleanToString($value) ?></td>
                        <?php } ?>
                    </tr>

                <?php } elseif ($_GET['parking'] == 'no_parking' && $data['parking'] == false && isset($_GET['vote']) && $_GET['vote'] == $data['vote']) {?>
                    <tr>
                        <?php foreach ($data as $value) { ?>
                            <td><?php echo convertBooleanToString($value) ?></td>
                        <?php } ?>
                    </tr>
                    <?php } 
                    } ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>