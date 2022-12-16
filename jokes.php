<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Random Joke Generator</title>

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap" rel="stylesheet">



</head>

<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Rubik", sans-serif;
    }

    body {


        background-image: url("bg1.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        -webkit-background-size: 100% 100%;
        -moz-background-size: 100% 100%;
        -o-background-size: 100% 100%;
        background-size: 100% 100%;
    }


    .card {
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
    }

    span {
        display: block;
        text-align: center;
        font-size: 100px;
    }

    p {
        font-size: 16px;
        color: #ffffff;
        font-weight: 400;
        text-align: center;
        word-wrap: break-word;
        line-height: 35px;
        margin: 30px 0;
        opacity: 0;
    }

    .fade {
        opacity: 1;
        transition: opacity 1.5s;
    }

    button {
        display: block;
        background-color: #fab22e;
        border: none;
        padding: 5px;
        font-size: 18px;
        color: #171721;
        font-weight: 600;
        padding: 12px 25px;
        margin: 0 auto;
        border-radius: 5px;
        cursor: pointer;
        outline: none;
    }
</style>

<body>
    
    
    <div class="card">
        <span>&#128514;</span>
        <p id="joke"></p>
        <button id="btn">Get Random Joke</button>
        
    </div>

    <!-- Script -->

    <script>
        const jokeContainer = document.getElementById("joke");
        const btn = document.getElementById("btn");
        const url = "https://v2.jokeapi.dev/joke/Any?blacklistFlags=nsfw,religious,political,racist,sexist,explicit&type=single";

        let getJoke = () => {
            jokeContainer.classList.remove("fade");
            fetch(url)
                .then(data => data.json())
                .then(item => {
                    jokeContainer.textContent = `${item.joke}`;
                    jokeContainer.classList.add("fade");
                });
        }
        btn.addEventListener("click", getJoke);
        getJoke();
    </script>


</body>

</html>