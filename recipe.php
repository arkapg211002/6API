<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recipe App</title>
    <!-- Google Fonts -->
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
        background-image: url("recipe.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        -webkit-background-size: 100% 100%;
        -moz-background-size: 100% 100%;
        -o-background-size: 100% 100%;
        background-size: 100% 100%;
    }

    .container {
        
        font-size: 16px;
        padding: 3em 2.8em;
        width: 90vw;
        max-width: 32em;
        position: absolute;
        
        left: 50%;
        top: 50%;
        border-radius: 0.6em;

        
        
        
        transform: translate(-50%, -50%);
        
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
        width: 100%;
        display: grid;
        grid-template-columns: 9fr 3fr;
        gap: 1.2em;
    }

    .search-container input {
        font-size: 1em;
        padding: 0.6em;
        border: none;
        outline: none;
        border-bottom: 2px solid #f4c531;
    }

    .search-container button {
        font-size: 1em;
        color: black;
        background-color: #f4c531;
        border: none;
        font-weight: 600;
        border-radius: 0.3em;
    }

    img {
        display: block;
        width: 50%;
        margin: 1.8em auto 0 auto;
    }

    .details {
        background-color: #f4c531;
        position: relative;
        margin: -4.3em 0 0 0;
        text-align: center;
        padding: 0.6em 0;
    }

    .details h2 {
        font-size: 1.2em;
        font-weight: 600;
    }

    .details h4 {
        font-size: 1em;
        font-weight: 400;
    }

    #show-recipe {
        font-size: 1em;
        position: relative;
        left: 75%;
        padding: 0.9em 0.6em;
        background-color: #f4c531;
        border: none;
        top: 1.5em;
        border-radius: 0.3em;
        font-weight: 600;
    }

    #recipe {
        position: absolute;
        
        min-height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        z-index: 2;
        
        display: none;

        box-shadow: 6px 8px 25px 1px rgba(0, 0, 0, 0.75);
        -webkit-box-shadow: 6px 8px 25px 1px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 6px 8px 25px 1px rgba(0, 0, 0, 0.75);
        backdrop-filter: blur(16px) saturate(90%);
        -webkit-backdrop-filter: blur(16px) saturate(90%);
        background-color: rgba(255, 255, 255, 0.51);
        border-radius: 12px;
        border: 1px solid rgba(209, 213, 219, 0.3);
    }

    #recipe pre {
        white-space: pre-wrap;
        word-wrap: break-word;
        padding: 2.5em 1.2em 1.2em 1.2em;
        font-size: 0.92em;
        color: #303040;
    }

    #hide-recipe {
        font-size: 1em;
        position: relative;
        width: 1.8em;
        height: 1.8em;
        background-color: #f4c531;
        border: none;
        top: 1.2em;
        left: 90%;
        border-radius: 0.3em;
    }

    ul {
        font-size: 1em;
        position: relative;
        display: grid;
        grid-template-columns: auto auto;
        gap: 0.8em 1.1em;
        padding: 1.2em 0 0 1.2em;
        color: #303040;
        text-transform: capitalize;
    }

    h3 {
        text-align: center;
        margin-top: 1.8em;
        color: #202030;
    }
    .search-container input{
        background: transparent;
    }
    .search-container button:hover{
        background-color: rgba(17, 25, 40, 0.53);
        color:#f4c531;
        border: #f4c531 1px solid;
    }
    @media screen and (max-width: 500px) {
        .container {
            font-size: 14px;
        }
    }
</style>

<body>
    <div class="container">
        <div class="search-container">
            <input type="text" placeholder="Type A Dish Name Here.." id="user-inp" />
            <button id="search-btn">Search</button>
        </div>
        <div id="result"></div>
    </div>
    <!-- Script -->
    <script>
        //Initial References
        let result = document.getElementById("result");
        let searchBtn = document.getElementById("search-btn");
        let url = "https://www.themealdb.com/api/json/v1/1/search.php?s=";

        searchBtn.addEventListener("click", () => {
            let userInp = document.getElementById("user-inp").value;
            if (userInp.length == 0) {
                result.innerHTML = `<h3>Input Field Cannot Be Empty</h3>`;
            } else {
                fetch(url + userInp)
                    .then((response) => response.json())
                    .then((data) => {
                        let myMeal = data.meals[0];
                        console.log(myMeal);
                        console.log(myMeal.strMealThumb);
                        console.log(myMeal.strMeal);
                        console.log(myMeal.strArea);
                        console.log(myMeal.strInstructions);
                        let count = 1;
                        let ingredients = [];
                        for (let i in myMeal) {
                            let ingredient = "";
                            let measure = "";
                            if (i.startsWith("strIngredient") && myMeal[i]) {
                                ingredient = myMeal[i];
                                measure = myMeal[`strMeasure` + count];
                                count += 1;
                                ingredients.push(`${measure} ${ingredient}`);
                            }
                        }
                        console.log(ingredients);

                        result.innerHTML = `
    <img src=${myMeal.strMealThumb}>
    <div class="details">
        <h2>${myMeal.strMeal}</h2>
        <h4>${myMeal.strArea}</h4>
    </div>
    <div id="ingredient-con"></div>
    <div id="recipe">
        <button id="hide-recipe">X</button>
        <pre id="instructions">${myMeal.strInstructions}</pre>
    </div>
    <button id="show-recipe">View Recipe</button>
    `;
                        let ingredientCon = document.getElementById("ingredient-con");
                        let parent = document.createElement("ul");
                        let recipe = document.getElementById("recipe");
                        let hideRecipe = document.getElementById("hide-recipe");
                        let showRecipe = document.getElementById("show-recipe");

                        ingredients.forEach((i) => {
                            let child = document.createElement("li");
                            child.innerText = i;
                            parent.appendChild(child);
                            ingredientCon.appendChild(parent);
                        });

                        hideRecipe.addEventListener("click", () => {
                            recipe.style.display = "none";
                        });
                        showRecipe.addEventListener("click", () => {
                            recipe.style.display = "block";
                        });
                    })
                    .catch(() => {
                        result.innerHTML = `<h3>Invalid Input</h3>`;
                    });
            }
        });
    </script>
</body>

</html>