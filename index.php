<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/darkly/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <script src="app.js" charset="utf-8"></script>
</head>

<body>
    <?php

    $city_naname = 'Manati';
    $api_key = '65320c7fed411a5985fc27f952367d89';
    $api_url = 'http://api.openweathermap.org/data/2.5/weather?q=' . $city_naname . '&appid=' . $api_key . '&lang=sp';

    $weather_data = json_decode(file_get_contents($api_url), true);

    $ciudad = $weather_data['name'];
    $temperatura = 9 / 5 * $weather_data['main']['temp'] - 459.67;
    $maxTem = 9 / 5 * $weather_data['main']['temp_max'] - 459.67;
    $minTem = 9 / 5 * $weather_data['main']['temp_min'] - 459.67;
    $main = $weather_data['weather'][0]['main'];
    $icon = $weather_data['weather'][0]['icon'];
    $humidity = $weather_data['main']['humidity'];
    $vientos = $weather_data['wind']['speed'];
    ?>
    <nav class="navbar fixed-top navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="https://www.crwflags.com/fotw/images/p/pr-mt1.gif" width="30" height="30" class="d-inline-block align-top" alt="">
            <b>Manatí Weather App</b>
        </a>
    </nav>
    <div class="jumbotron">
        <div class="container shadow-lg  mb-5">
            <div class="bg-image p-5 text-center shadow-1-strong rounded mb-5 text-white" style="background-image: url('https://boricuaonline.com/wp-content/uploads/2017/01/manati-1024x495.jpg')  ;background-size: 100% 100%;">
                <h1 class="text-monospace">Manati Weather App</h1>
                <p class="text-monospace">"Aquél que no está orgulloso de su origen, no valdrá nunca nada, pues comienza a despreciarse a si mismo" ~ Pedro Albizu Campos <br>(12 de septiembre de 1891- 21 de abril de 1965)</p>




                <form action="https://manatiweather.000webhostapp.com/WeatherAPP/" method="post">
                    <h2>New City Zip: </h2><input name="name" type="text" pattern="^(?(^00000(|-0000))|(\d{5}(|-\d{4})))$"><br>
                    <input type="submit" class="btn btn-primary">
                </form>

            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <h3 class="text-monospace">Location:<?php echo ' ' . $ciudad; ?></h3>
                        <p>
                        <div class="row">
                            <div class="col"><img src="http://openweathermap.org/img/wn/<?php echo $icon; ?>@2x.png" alt="alternatetext" src="" width="50" height="50">

                                </h6>
                                <h5 class='text-light'>Temperature <?php echo ' ' . $temperatura; ?>

                                </h5>
                                <h5 class='text-light text-monospace'>
                                    Min:<?php echo ' ' . $maxTem; ?>

                                    Max:<?php echo ' ' . $minTem; ?>

                                </h5>
                                <h5 class='text-light'>Condition: <?php echo ' ' . $main; ?> </h5>
                                <h5 class='text-light'>Humedad: <?php echo ' ' . $humidity; ?>

                                </h5>
                                <h5 class='text-light'> Vientos:<?php echo ' ' . $vientos; ?>

                                </h5>

                            </div>
                        </div>

                    </div>
                    </p>

                    <div class="col-6">

                        <?php

                        if (empty($_POST["name"])) {
                            $newCity = 'Enter a new';
                        } else {
                            try {
                                $newCity = $_POST["name"];
                                $api_key = '65320c7fed411a5985fc27f952367d89';
                                $api_url = 'http://api.openweathermap.org/data/2.5/weather?zip=' . $newCity . '&appid=' . $api_key . '&lang=sp';
                                $weather_data = json_decode(@file_get_contents($api_url), true);
                                if ($weather_data == null || empty($weather_data['name'])) {
                                    echo 'value not allowed';
                                } else {
                                    $ciudad = $weather_data['name'];
                                    $temperatura = 9 / 5 * $weather_data['main']['temp'] - 459.67;
                                    $maxTem = 9 / 5 * $weather_data['main']['temp_max'] - 459.67;
                                    $minTem = 9 / 5 * $weather_data['main']['temp_min'] - 459.67;
                                    $main = $weather_data['weather'][0]['main'];
                                    $icon = $weather_data['weather'][0]['icon'];
                                    $humidity = $weather_data['main']['humidity'];
                                    $vientos = $weather_data['wind']['speed'];

                                    echo '<div class="row">';
                                    echo '<div class="col">';
                                    echo '<h3>New Location: ' . $ciudad . '</h3>';
                                    echo '<h6 class="text-primary"><img src="http://openweathermap.org/img/wn/' . $icon . '@2x.png" alt="alternatetext" src="" width="50" height="50"></h6>';
                                    echo '<h5 class="text-light">Temperature' . $temperatura . '</h5>';


                                    echo '<h5 class="text-light">
                                    Min:' . $maxTem . '

                                    Max:' . $minTem . '</h5>';

                                    echo '<h5 class="text-light">Condition:' . $main . ' </h5>
                                <h5 class="text-light">Humedad:' . $humidity . '';

                                    echo '</h5>
                                <h5 class="text-light"> Vientos:' . $vientos . '</h5>

                            </div>

                        </div>';
                                }
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                        }

                        $api_key = '65320c7fed411a5985fc27f952367d89';
                        $api_url = 'http://api.openweathermap.org/data/2.5/forecast?zip=manati&appid=' . $api_key . '&lang=sp';
                        echo $weather_data = json_decode(@file_get_contents($api_url), true);
                        echo $weather_data;
                        ?>


                    </div>

                </div>

            </div>
        </div>



    </div>

    <footer class="text-center fixed-bottom" style="background-color: #f1f1f1;">
        <!-- Grid container -->

        <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-dark" href="">Nrodriguez8414</a>


        </div>
        <!-- Copyright -->
    </footer>

</body>

</html>
