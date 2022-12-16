<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>6API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;

    }

    body {
        background-image: url("idbg.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        -webkit-background-size: 100% 100%;
        -moz-background-size: 100% 100%;
        -o-background-size: 100% 100%;
        background-size: 100% 100%;

    }

    .toggle {
        font-size: 30px;
        color: white;
        float: left;
        line-height: 45px;
        margin-left: 5%;
        cursor: pointer;
        display: none;
    }

    nav {
        background: #000000;
        background-color: rgba(0, 0, 0, 0.1);
        height: 45px;
        width: 100%;
    }

    ul {
        float: left;
        margin-left: 5%;
    }

    .socialtop {
        float: right;
        margin-right: 5%;
    }

    ul li {
        margin: 0;
        padding: 0;
        position: relative;
        display: inline-block;
        font-size: 16px;
    }

    ul a {
        font-weight: 400;
        padding: 15px;
        line-height: 45px;
        color: #fff;
        font-size: 12px;
        text-transform: uppercase;
        text-decoration: none;
    }

    ul li:first-child {
        background: #FF7D00;
    }

    ul li:hover {
        background: #FF7D00;
        color: #fff;
    }

    ul li a:hover {
        color: #fff;
    }

    .top-social a {
        padding: 13px;
        color: #fff;
    }

    .top-social {
        padding: 14px 15px;
    }

    .top-social a:hover {
        color: #FF7D00;
    }

    div.gallery {
        border: 1px solid #ccc;
    }

    div.gallery:hover {
        border: 1px solid #777;
    }

    div.gallery img {
        width: 100%;
        height: auto;
    }

    div.desc {
        padding: 15px;
        text-align: center;
    }

    * {
        box-sizing: border-box;
    }

    .responsive {
        padding: 0 6px;
        float: left;
        width: 50%;

    }

    .container {
        padding: 0 50px;
        
        
        justify-content: center;
    }

    @media screen and (max-width: 1052px) {
        .toggle {
            display: block;
        }

        ul {
            z-index: -1;
            margin-top: -15px;
            position: fixed;
            top: -400px;
            right: 0;
            left: 0;
            width: 200px;
            background: #222222;
            display: inline-block;
            transition: top .4s;
            margin-left: 0;
        }

        ul.show {
            top: 60px;
        }

        ul li {
            top: 0;
            width: 100%;
            float: left;
            text-align: center;
        }
    }

    @media screen and (max-width:500px) {
        ul {
            width: 100%;
        }

    }

    a {
        position: relative;
        padding: 20px 50px;
        display: block;
        text-decoration: none;
        text-transform: uppercase;
        width: 200px;
        overflow: hidden;
        border-radius: 40px;
    }

    a span {
        position: relative;
        color: #fff;
        font-size: 20px;
        font-family: Arial;
        letter-spacing: 8px;
        z-index: 1;
    }

    a .liquid {
        position: absolute;
        top: -80px;
        left: 0;
        width: 200px;
        height: 200px;
        background: #4973ff;
        box-shadow: inset 0 0 50px rgba(0, 0, 0, .5);
        transition: .5s;
    }

    a .liquid::after,
    a .liquid::before {
        content: '';
        width: 200%;
        height: 200%;
        position: absolute;
        top: 0;
        left: 50%;
        transform: translate(-50%, -75%);
        background: #000;
    }

    a .liquid::before {

        border-radius: 45%;
        background: rgba(20, 20, 20, 1);
        animation: animate 5s linear infinite;
    }

    a .liquid::after {

        border-radius: 40%;
        background: rgba(20, 20, 20, .5);
        animation: animate 10s linear infinite;
    }

    a:hover .liquid {
        top: -120px;
    }

    @keyframes animate {
        0% {
            transform: translate(-50%, -75%) rotate(0deg);
        }

        100% {
            transform: translate(-50%, -75%) rotate(360deg);
        }
    }
</style>

<body>
    <nav class="sticky-top">
        <label class="toggle">
            <i class="fa fa-bars"></i>
        </label>

        <div class="socialtop">
            <div class='top-social'>
                <a href='#'><i class='fa fa-facebook'></i></a>

                <a href='#'><i class='fa fa-instagram'></i></a>
                <a href='#'><i class='fa fa-linkedin'></i></a>


            </div>
        </div>
    </nav>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        $('.toggle i').click(function() {
            $('ul').toggleClass("show");
        });
    </script>
    <section></section>
    <div class="container my-5">
        <div style="float:right"><div>
            <figure class="figure">
                <img src="LOL_001.jpg" height="300" width="400" class="figure-img img-fluid rounded" alt="...">
                <figcaption class="figure-caption">
                    <h5><b>Random Joke Generator</b></h5>
                </figcaption>
            </figure>
            <a href="jokes.php">
                <span><b>Explore</b></span>
                <div class="liquid"></div>
            </a>

        </div>

        </br></br>
        <div>
            <figure class="figure">
                <img src="dictionary.jpg" height="300" width="400" class="figure-img img-fluid rounded" alt="...">
                <figcaption class="figure-caption">
                    <h5><b>Dictionary App</b></h5>
                </figcaption>
            </figure>
            </br>
            <a href="dict.php">
                <span><b>Explore</b></span>
                <div class="liquid"></div>
            </a>
        </div>

        </div>
        </br></br>

        <div>
        <div>
            <figure class="figure">
                <img src="countryd.jpg" height="300" width="400" class="figure-img img-fluid rounded" alt="...">
                <figcaption class="figure-caption">
                    <h5><b>Country Description</b></h5>
                </figcaption>
            </figure>
            <a href="country.php">
                <span>Explore</span>
                <div class="liquid"></div>
            </a>
        </div>

        </br></br>
        <div>
            <figure class="figure">
                <img src="num.jpg" height="300" width="400" class="figure-img img-fluid rounded" alt="...">
                <figcaption class="figure-caption">
                    <h5><b>Number Facts</b></h5>
                </figcaption>
            </figure>
            <a href="number.php">
                <span><b>Explore</b></span>
                <div class="liquid"></div>
            </a>
        </div>
        </div>
        </br></br>

        <div>
        <div style="float:left">
            <figure class="figure">
                <img src="poet.jpg" height="300" width="400" class="figure-img img-fluid rounded" alt="...">
                <figcaption class="figure-caption">
                    <h5><b>Random Quote Generator</b></h5>
                </figcaption>
            </figure>
            <a href="quotes.php">
                <span><b>Explore</b></span>
                <div class="liquid"></div>
            </a>
        </div>

        </br></br>
        <div style="float:right; padding:0 0 0 50px">
            <figure class="figure">
                <img src="rec.jpg" height="400" width="400" class="figure-img img-fluid rounded" alt="...">
                <figcaption class="figure-caption">
                    <h5><b>Recipe App</b></h5>
                </figcaption>
            </figure>
            <a href="recipe.php">
                <span><b>Explore</b></span>
                <div class="liquid"></div>
            </a>
        </div>
        </div>
    </br></br>
    </br></br>
    </br></br>
    </div>
    <div>
    </br></br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </br></br>
    </br></br>
</body>

</html>