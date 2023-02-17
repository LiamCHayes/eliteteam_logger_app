<html>

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- linking css file -->
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Elite Team Logger</h1>

    <section class="logger" id="logger">
        <form action="connect.php" method="post">
            <ul>
                <label for="name">Name: </label>
                <input type="text" id="name" name="name"/>
                <br><br>

                <label for="grade">Grade:</label>
                <input type="text" id="grade" name="grade"/>
                <br><br>

                <label for="flash">Flash:</label>
                <select name="flash" id="flash">
                    <option value="1">Flash</option>
                    <option value="0">No Flash</option>
                </select>
                <br><br>

                <label for="zone">Zone: </label>
                <select name="zone" id="zone">
                    <option value="slab">Slab</option>
                    <option value="accordion">Accordion</option>
                    <option value="10">10</option>
                    <option value="45">45</option>
                    <option value="prow">prow</option>
                    <option value="30">30</option>
                </select>
                <br><br>

                <button type="submit">Log</button>

                <button type="reset">Reset</button>

                <button type="button">Undo</button>
            </ul>
        </form>
        <form action="showdata.php" method="post">
        <ul>
            <button href="showdata.php" class="button">See Data</a>
        </ul>
        </form>
    </section>

    <p><?php
    session_start();
    if(isset($_SESSION['message'])) {
        echo 'Most recent log: ';
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?></p>
</body>

</html>