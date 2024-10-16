<?php
$url_host = $_SERVER['HTTP_HOST'];

$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');

$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);

$url_path = $url_host . $matches[1][0];

$url_path = str_replace('\\', '/', $url_path);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="type-3031">
        <div class="container">
            <div class="col-1">
                <h1>About us</h1>
            </div>
            <div class="col-2">
                <div class="info-item">
                    <a href="">HOME</a> <i id="icon" class='fas fa-play'></i>
                    <div class="info-item2">
                        <a>ABOUT US</a>
                    </div> 
                </div>
            </div>
            <div class="col-3">
                <div class="col-md-6 col-4">
                    <h1>"We provide full and specific solutions for our every customers."</h1>
                    <div class="content-wrapper">
                        <p>Started in the year 1974 with a vision of providing repair solutions to customers and dealers all over USA.
                        Repair Plus, based in Newyork, USA, aims to be one of the best Phone /Laptops & Desktops repair company and leading provider of spare components and tools within USA. <br><br>
                        Our commitment to bring professionalism, good service & trust to the Phone repair service & maintenance business. We take immense pride in sending some of the most of professional technicians</p>
                        <div class="image-logo">
                            <img class="logo" src="certified-logo.png" alt="">
                        </div>
                    </div>
                     <div class="signature">
                        <img src="signature.png" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image-container">
                    <div class="image-background"></div>
                        <img class="image" src="video-gallery.png" alt="">
                        <a href="#" class="icon-container" onclick="openYoutubeLink()">
                        <div class="icon"></div></a>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</body>
<script>
   
  function openYoutubeLink() {
    window.open('https://www.youtube.com/watch?v=KssOT2QVg-M', '_blank');
}
</script>
</html>