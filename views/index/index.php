<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <?php
    $slider1 = $data[0];
    $onlyasanbiamoz = $data[1];
    $mostviewd = $data[2];
    foreach ($slider1 as $slider) {
    ?>
            <a href="<?= $slider['link']; ?>"><img src="<?= $slider['img'] ?>" alt=""></a>
            <p><?= $slider['title'] ?></p>
        <?php

}
?>


   
</body>
</html>