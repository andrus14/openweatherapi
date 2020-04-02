<?php

    $url = 'http://api.openweathermap.org/data/2.5/weather?appid=06ed8ffc5df844d7686c7457a010761b&lat=58.2550&lon=22.4919&units=metric';
    $fileName = './cache.json';
    $cacheTime = 300;

    if ( file_exists($fileName) && (time() - filemtime($fileName) < $cacheTime) ) {
        $content = file_get_contents($fileName);
    } else {
        $content = file_get_contents($url);

        $file = fopen($fileName, 'w');
        fwrite($file, $content);
        fclose($file);
    }

    $json = json_decode($content);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuressaare ilm</title>
</head>
<body>
    <img src="http://openweathermap.org/img/wn/<?php echo $json->weather[0]->icon;?>@2x.png">
</body>
</html>