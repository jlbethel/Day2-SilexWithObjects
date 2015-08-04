<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Cd.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        $first_cd  = new CD("One Big Particular Loop", "Polyenso", "https://f1.bcbits.com/img/a2474419879_10.jpg");
        $second_cd = new CD("Band of Gypsys", "Band of Gypsys", "https://upload.wikimedia.org/wikipedia/en/5/5c/Band_of_Gypsys_album.jpg");
        $third_cd  = new CD("Layla and Other Assorted Love Songs", "Derek and the Dominos", "https://greatalbumcovers.files.wordpress.com/2012/08/album-covers-derk-the-dominos-laya.jpg");
        $fourth_cd = new CD("Turpentine", "The Late Greats", "https://s-media-cache-ak0.pinimg.com/236x/d7/ee/4b/d7ee4b662949077a353f93bc0705b3a0.jpg", 110.99);
        $cds = array($first_cd, $second_cd, $third_cd, $fourth_cd);

        $output = "";
        foreach ($cds as $album) {
            $output = $output . "<div class='row'>
                <div class='col-md-6'>
                    <img src=" . $album->getCoverArt() . ">
                </div>
                <div class='col-md-6'>
                    <p>" . $album->getTitle() . "</p>
                    <p>By " . $album->getArtist() . "</p>
                    <p>$" . $album->getPrice() . "</p>
                </div>
            </div>
            ";
        }

        return $output;
    });

    return $app;
?>
