<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8">
    <title>Random Quote Generator</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css" />
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        background-image: url("quote.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        -webkit-background-size: 100% 100%;
        -moz-background-size: 100% 100%;
        -o-background-size: 100% 100%;
        background-size: 100% 100%;
    }

    .wrapper {
        width: 600px;
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
    }

    .container {
        width: 80vmin;
        padding: 50px 40px;
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        backdrop-filter: blur(17px) saturate(105%);
        -webkit-backdrop-filter: blur(17px) saturate(105%);
        background-color: rgba(17, 25, 40, 0.53);
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.125);
        box-shadow: 6px 8px 25px 1px rgba(0, 0, 0, 0.75);
        -webkit-box-shadow: 6px 8px 25px 1px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 6px 8px 25px 1px rgba(0, 0, 0, 0.75);
        text-align:center;
    }

    

    .container p {
        color: #fdd8d8;
        line-height: 2;
        font-size: 18px;
    }

    .container h3 {
        color: #ffffff;
        margin: 20px 0 60px 0;
        font-weight: 600;
        text-transform: capitalize;
    }

    .container button {
        background-color: #DA1464;
        border: none;
        padding: 15px 45px;
        border-radius: 5px;
        font-size: 18px;
        font-weight: 600;
        color: white;
        cursor: pointer;
    }
    .container button:hover{
        background-color: rgba(17, 25, 40, 0.53);
        color: #DA1464;
    }
</style>

<body>
    <div class="wrapper">
        <div class="container">
            <p id="quote">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas,
                magni.
            </p>
            <h3 id="author">Lorem, ipsum.</h3>
            <button id="btn">Get Quote</button>
        </div>
    </div>
    <!-- Script -->
    <script>
        let quote = document.getElementById("quote");
        let author = document.getElementById("author");
        let btn = document.getElementById("btn");

        const url = "https://api.quotable.io/random";

        let getQuote = () => {
            fetch(url)
                .then((data) => data.json())
                .then((item) => {
                    quote.innerText = item.content;
                    author.innerText = item.author;
                });
        };

        window.addEventListener("load", getQuote);
        btn.addEventListener("click", getQuote);
    </script>
</body>

</html>