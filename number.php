<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Number Trivia App</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
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
        background-image: url('numpage.jpg');
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        -webkit-background-size: 100% 100%;
        -moz-background-size: 100% 100%;
        -o-background-size: 100% 100%;
        background-size: 100% 100%;
    }

    .container {
        
        width: 95vw;
        font-size: 16px;
        max-width: 31.25em;
        padding: 3.5em 2.5em;
        position: absolute;
        transform: translate(-50%, -50%);
        left: 50%;
        top: 50%;
        

        box-shadow: 6px 8px 25px 1px rgba(0, 0, 0, 0.75);
        -webkit-box-shadow: 6px 8px 25px 1px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 6px 8px 25px 1px rgba(0, 0, 0, 0.75);
        backdrop-filter: blur(16px) saturate(90%);
        -webkit-backdrop-filter: blur(16px) saturate(90%);
        background-color: rgba(255, 255, 255, 0.51);
        border-radius: 12px;
        border: 1px solid rgba(209, 213, 219, 0.3);
    }

    .search-container {
        display: flex;
        justify-content: space-between;
    }

    .container input,
    .container button {
        font-size: 1.25em;
        outline: none;
        border: none;
        border-radius: 0.4em;
    }

    .container input {
        width: 40%;
        border: 1px solid #bdbdbf;
        padding: 0.6em;
    }

    .container button {
        width: 55%;
        background-color: #566fff;
        color: #ffffff;
        font-weight: 500;
        padding: 0.7em;
        cursor: pointer;
    }

    #ran-fact-btn {
        width: 100%;
        margin-top: 1em;
    }

    .fact {
        background-color: #ffffff;
        box-shadow: 0 0 1.2em rgba(0, 4, 52, 0.1);
        margin: 3em auto 0 auto;
        padding: 2.8em 1.8em;
        border-radius: 0.6em;
        border: none;
        border-bottom: 0.6em solid #566fff;
        display: none;
    }

    .fact h2 {
        font-size: 2.8em;
        color: #181a34;
    }

    .fact p {
        font-size: 1.15em;
        font-weight: 400;
        color: #50526b;
        line-height: 1.8em;
        text-align: justify;
        margin-top: 0.8em;
    }

    p.msg {
        text-align: center;
        font-weight: 500;
        color: #181a34;
    }

    .search-container button:hover{
        background-color:rgba(255, 255, 255, 0.51);
        color:blue;
        border:blue solid 1px;
    }

    .container button:hover{
        background-color:rgba(255, 255, 255, 0.51);
        color:blue;
        border:blue solid 1px;
    }
</style>

<body>
    <div class="container">
        <div class="search-container">
            <input type="num" placeholder="Number" id="num" />
            <button id="get-fact-btn">Get Fact</button>
        </div>
        <button id="ran-fact-btn">Get Random Fact</button>
        <div class="fact"></div>
    </div>
    <!-- Script -->
    <script>
        let getFactBtn = document.getElementById("get-fact-btn");
        let ranFactBtn = document.getElementById("ran-fact-btn");
        let fact = document.querySelector(".fact");
        let url = "http://numbersapi.com/";

        let fetchFact = (num) => {
            let finalUrl = url + num;
            fetch(finalUrl)
                .then((resp) => resp.text())
                .then((data) => {
                    fact.style.display = "block";
                    fact.innerHTML = `<h2>${num}</h2>
      <p>${data}</p>`;
                    document.querySelector(".container").append(fact);
                });
        };
        let getFact = () => {
            let num = document.getElementById("num").value;
            //Check if input number is not empty
            //If not empty
            if (num) {
                //Check if number lies between 0 and 300
                //if Yes fetch the fact
                if (num >= 0 && num <= 300) {
                    fetchFact(num);
                }
                //If number is less than 0 or greater than 300 display error message.
                else {
                    fact.style.display = "block";
                    fact.innerHTML = `<p class="msg"> Please enter a number between 0 to 300.</p>`;
                }
            }
            //If input number is empty display error message
            else {
                fact.style.display = "block";
                fact.innerHTML = `<p class="msg">The input field cannot be empty</p>`;
            }
        };

        let getRandomFact = () => {
            //Random number between 0 to 300
            let num = Math.floor(Math.random() * 301);
            fetchFact(num);
        };

        getFactBtn.addEventListener("click", getFact);
        ranFactBtn.addEventListener("click", getRandomFact);
        window.addEventListener("load", getRandomFact);
    </script>
</body>

</html>