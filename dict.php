<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />


    <title>Dictionary</title>
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    *:not(i) {
        font-family: "Poppins", sans-serif;
    }

    body {
        background-image: url('city.jpg');
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        -webkit-background-size: 100% 100%;
        -moz-background-size: 100% 100%;
        -o-background-size: 100% 100%;
        background-size: 100% 100%;
    }

    .container {

        width: 90vmin;
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        padding: 80px 50px;
        position: absolute;
        transform: translate(-50%, -50%);
        border: 1px solid rgba(255, 255, 255, 0.125);
        box-shadow: 6px 8px 25px 1px rgba(0, 0, 0, 0.75);
        -webkit-box-shadow: 6px 8px 25px 1px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 6px 8px 25px 1px rgba(0, 0, 0, 0.75);
        backdrop-filter: blur(16px) saturate(90%);
        -webkit-backdrop-filter: blur(16px) saturate(90%);
        background-color: rgba(255, 255, 255, 0.51);
        border-radius: 12px;
        border: 1px solid rgba(209, 213, 219, 0.3);
    }

    .search-box {
        width: 100%;
        display: flex;
        justify-content: space-between;
    }

    .search-box input {
        padding: 5px;
        width: 70%;
        border: none;
        outline: none;
        border-bottom: 3px solid blue;
        font-size: 16px;
        background: transparent;
    }

    .search-box button {
        padding: 15px 0;
        width: 25%;
        background-color: blue;
        border: none;
        outline: none;
        color: #ffffff;
        border-radius: 5px;
    }

    .search-box button:hover {
        background-color: rgba(255, 255, 255, 0.51);
        color: blue;
        border: solid 1px blue;
        border-color: blue;

    }

    .result {
        position: relative;
    }

    .result h3 {
        font-size: 30px;
        color: #1f194c;
    }

    .result .word {
        display: flex;
        justify-content: space-between;
        margin-top: 80px;
    }

    .result button {
        background-color: transparent;
        color: blue;
        border: none;
        outline: none;
        font-size: 18px;
    }

    .result .details {
        display: flex;
        gap: 10px;
        color: #4C4646;
        margin: 5px 0 20px 0;
        font-size: 14px;
        font-style: bold;
    }

    .word-meaning {
        color: black;
    }

    .word-example {
        color: #494F55;
        font-style: italic bold;
        border-left: 5px solid #ae9cff;
        padding-left: 20px;
        margin-top: 30px;
    }

    .error {
        margin-top: 80px;
        text-align: center;
    }

    @media screen and (max-width: 768px) {
        .container {
            width: 90%;
        }
    }

    @media screen and (max-width: 480px) {
        .container {
            width: 90%;
        }

        .search-box {
            flex-direction: column;
        }

        .search-box input {
            width: 100%;
            margin-bottom: 20px;
        }

        .search-box button {
            width: 100%;
        }
    }
</style>

<body>
    

    <audio id="sound"></audio>
    <div class="container">
        <div class="search-box">
            <input type="text" placeholder="Type the word here.." id="inp-word" />
            <button id="search-btn" class="btn">Search</button>
        </div>
        <div class="result" id="result"></div>
    </div>
    <!-- Script -->
    <script>
        const url = "https://api.dictionaryapi.dev/api/v2/entries/en/";
        const result = document.getElementById("result");
        const sound = document.getElementById("sound");
        const btn = document.getElementById("search-btn");

        btn.addEventListener("click", () => {
            let inpWord = document.getElementById("inp-word").value;
            fetch(`${url}${inpWord}`)
                .then((response) => response.json())
                .then((data) => {
                    console.log(data);
                    result.innerHTML = `
            <div class="word">
                    <h3>${inpWord}</h3>
                    <button onclick="playSound()">
                        <i class="fas fa-volume-up"></i>
                    </button>
                </div>
                <div class="details">
                    <p>${data[0].meanings[0].partOfSpeech}</p>
                    <p>/${data[0].phonetic}/</p>
                </div>
                <p class="word-meaning">
                   ${data[0].meanings[0].definitions[0].definition}
                </p>
                <p class="word-example">
                    ${data[0].meanings[0].definitions[0].example || ""}
                </p>`;
                    sound.setAttribute("src", `https:${data[0].phonetics[0].audio}`);
                })
                .catch(() => {
                    result.innerHTML = `<h3 class="error">Couldn't Find The Word</h3>`;
                });
        });

        function playSound() {
            sound.play();
        }
    </script>
</body>

</html>