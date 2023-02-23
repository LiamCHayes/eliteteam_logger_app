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
                <label class="container">Trent
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Owen
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="container">James
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Ethan
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Derek
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Jace
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Xander
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Arabella
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Rosella
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Norah
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Zack
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <br><br>

                <label class="container">4
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="container">5
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="container">6
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="container">7
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="container">8
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="container">9
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="container">10
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Hard
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
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