<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Country Guide App</title>
    <!--Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet" />
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
        background-image: url("count.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        -webkit-background-size: 100% 100%;
        -moz-background-size: 100% 100%;
        -o-background-size: 100% 100%;
        background-size: 100% 100%;
    }

    .container {
        max-width: 37.5em;
        padding: 3em 2.5em;
        width: 90vmin;
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
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

    .search-wrapper {
        display: grid;
        grid-template-columns: 9fr 3fr;
        gap: 1.25em;
    }

    .search-wrapper button {
        font-size: 1em;
        background-color: #3d64e6;
        color: #ffffff;
        padding: 0.8em 0;
        border: none;
        border-radius: 1.5em;
    }

    .search-wrapper input {
        font-size: 1em;
        padding: 0 0.62em;
        border: none;
        border-bottom: 2px solid #3d64e6;
        outline: none;
        color: #222a43;
    }

    #result {
        margin-top: 1.25em;
    }

    .container .flag-img {
        display: block;
        width: 45%;
        min-width: 7.5em;
        margin: 1.8em auto 1.2em auto;
    }

    .container h2 {
        font-weight: 600;
        color: #222a43;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 1.8em;
    }

    .data-wrapper {
        margin-bottom: 1em;
        letter-spacing: 0.3px;
    }

    .container h4 {
        display: inline;
        font-weight: 500;
        color: #222a43;
    }

    .container span {
        color: #5d6274;
    }

    .container h3 {
        text-align: center;
        font-size: 1.2em;
        font-weight: 400;
        color: #ff465a;
    }

    .search-wrapper input{
        background: transparent;

    }

    .search-wrapper button:hover{
        background-color: rgba(255, 255, 255, 0.51);
        color:blue;
        border: blue solid 1px;
    }
</style>

<body>
    <div class="container">
        <div class="search-wrapper">
            <input type="text" id="country-inp" placeholder="Enter a country name here..." />
            <button id="search-btn">Search</button>
        </div>
        <div id="result"></div>
    </div>
    <!-- Script -->
    <script>
        let searchBtn = document.getElementById("search-btn");
        let countryInp = document.getElementById("country-inp");
        searchBtn.addEventListener("click", () => {
            let countryName = countryInp.value;
            let finalURL = `https://restcountries.com/v3.1/name/${countryName}?fullText=true`;
            console.log(finalURL);
            fetch(finalURL)
                .then((response) => response.json())
                .then((data) => {
                    result.innerHTML = `
        <img src="${data[0].flags.svg}" class="flag-img">
        <h2>${data[0].name.common}</h2>
        <div class="wrapper">
            <div class="data-wrapper">
                <h4>Capital:</h4>
                <span>${data[0].capital[0]}</span>
            </div>
        </div>
        <div class="wrapper">
            <div class="data-wrapper">
                <h4>Continent:</h4>
                <span>${data[0].continents[0]}</span>
            </div>
        </div>
         <div class="wrapper">
            <div class="data-wrapper">
                <h4>Population:</h4>
                <span>${data[0].population}</span>
            </div>
        </div>
        <div class="wrapper">
            <div class="data-wrapper">
                <h4>Currency:</h4>
                <span>${
                  data[0].currencies[Object.keys(data[0].currencies)].name
                } - ${Object.keys(data[0].currencies)[0]}</span>
            </div>
        </div>
         <div class="wrapper">
            <div class="data-wrapper">
                <h4>Common Languages:</h4>
                <span>${Object.values(data[0].languages)
                  .toString()
                  .split(",")
                  .join(", ")}</span>
            </div>
        </div>
      `;
                })
                .catch(() => {
                    if (countryName.length == 0) {
                        result.innerHTML = `<h3>The input field cannot be empty</h3>`;
                    } else {
                        result.innerHTML = `<h3>Please enter a valid country name.</h3>`;
                    }
                });
        });
    </script>
</body>

</html>