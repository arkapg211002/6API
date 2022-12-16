<style>
    p {
        font-size: 1.0em;
        font-weight: 500;
        color: #181a34;
        padding: 0.5em;
        backdrop-filter: blur(18px) saturate(167%);
        -webkit-backdrop-filter: blur(18px) saturate(167%);
        background-color: rgba(17, 25, 40, 0.64);
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.125);
        color: azure;
        box-shadow: 5px 4px 16px 0px rgba(0, 0, 0, 0.75);
        -webkit-box-shadow: 5px 4px 16px 0px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 5px 4px 16px 0px rgba(0, 0, 0, 0.75);
    }

    .flex-container {
        width: 200px;
        text-align: center;
        justify-content: right;
        display: flex;
        position:absolute;
    }
</style>

<div class="flex-container">
    <p>Time: <span id="datetime"></span></p>
</div>

<script>
    var dt = new Date();
    document.getElementById("datetime").innerHTML = (("0" + (dt.getMonth() + 1)).slice(-2)) + "/" + (("0" + dt.getDate()).slice(-2)) + "/" + (dt.getFullYear()) + " " + (("0" + dt.getHours() + 1).slice(-2)) + ":" + (("0" + dt.getMinutes() + 1).slice(-2));
</script>