<?php
session_start();

if (!isset($_SESSION['gameCode'])) {
    header("Location: ../../index.html");
    exit();
}

$code = $_SESSION['gameCode'];
$game = json_decode(file_get_contents("../../games/$code.json"), true);

if (!isset($_SESSION['historyP2'])) {
    $_SESSION['historyP2'] = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>🔢 CowBull: Number Game</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .box {
      width: 30px;
      height: 35px;
      text-align: center;
      font-size: 18px;
      margin: 5px;
      border: 2px solid black;
    }
  </style>
</head>
<body style="margin: 0;">

<div class="d-flex">

  <!-- Left Side -->
  <div class="d-flex flex-column flex-fill align-items-center"
       style="width: 1%; height: 100vh; background: #DBDFFF; box-shadow: 0px 4px 10px 2px gray;">

    <h4 class="p-3"><strong>🐮 CowBull 🐂</strong></h4>

    <?php if ($game['status'] === 'setting_secrets'): ?>
    <!--  WAITING FOR OPPONENT TO SET SECRET  -->
      <p class="text-muted mt-5">
        Your secret was set. Waiting for <?= $_SESSION['nameP1'] ?> to set secret number ⏳
      </p>
      <!-- Polling script: Checks every 2 seconds if the game status has changed from 'setting_secrets'.
           If it has, reloads the page to update the UI. This allows real-time updates without manual refresh. -->
      <script>
    setInterval(function() {
        fetch("poll.php")
            .then(response => response.json())
            .then(data => {
                if (data.status !== 'setting_secrets') {
                    location.reload();
                }
            });
    }, 2000);
</script>

    <?php elseif ($game['status'] === 'playing' && $game['turn'] === 'player2'): ?>
    <!--  YOUR TURN - SHOW GUESS FORM  -->
      
      <h5 class="mt-4 mb-4 text-center">
        Enter guesses and find the secret number set by <?= $_SESSION['nameP1'] ?>
      </h5>

      <h6 class="text-center">
        <strong>Cow</strong> = Correct number, wrong position &
        <strong>Bull</strong> = Correct number, correct position
      </h6>

      <h6 class="mt-4">Keep trying until you guess the correct number</h6>

      <?php if (isset($_SESSION['dupErrorP2'])): ?>
        <div class="alert alert-danger alert-dismissible fade show text-center mt-3" role="alert">
          <?php echo $_SESSION['dupErrorP2']; unset($_SESSION['dupErrorP2']); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      <?php endif; ?>

      <form action="compareP2.php" method="POST" class="mt-5 mb-5">
        <input class="box" type="text" name="d1" maxlength="1" required>
        <input class="box" type="text" name="d2" maxlength="1" required>
        <input class="box" type="text" name="d3" maxlength="1" required>
        <input class="box" type="text" name="d4" maxlength="1" required>
        <button type="submit" class="btn btn-sm btn-success">Guess 🤷🏾</button>
      </form>

      <p>See your guesses and match it properly 👉🏽👉🏽👉🏽</p> 

      <button onclick="return confirm('Are you sure?')" form="giveup" type="submit"
              class="btn btn-sm btn-danger mt-3">
        🔄 Give Up!
      </button>
      <form id="giveup" action="newgame.php" method="POST"></form>
      

    <?php elseif ($game['status'] === 'playing' && $game['turn'] !== 'player2'): ?>
    <!--  OPPONENT'S TURN - WAIT  -->
      <h6 class="text-center mt-5 mb-5">
        <strong>Cow</strong> = Correct number, wrong position &
        <strong>Bull</strong> = Correct number, correct position
      </h6>

      <p class="text-muted mt-5">
        <?= $_SESSION['nameP1'] ?> is guessing your number. Wait for your turn
      </p>

      <p class="mt-5 mb-5">See your guesses and match it properly 👉🏽👉🏽👉🏽</p>

      <button onclick="return confirm('Are you sure?')" form="giveup" type="submit"
              class="btn btn-sm btn-danger mt-3">
        🔄 Give Up!
      </button>
      <form id="giveup" action="newgame.php" method="POST"></form>
      <!-- Polling script: Checks every 2 seconds if it's now player2's turn.
           If it is, reloads the page to switch to the guessing UI. -->
      <script>
    setInterval(function() {
        fetch("poll.php")
            .then(response => response.json())
            .then(data => {
                if (data.turn === 'player2') {
                    location.reload();
                }
            });
    }, 2000);
</script>
      <!-- Polling script: Checks every 2 seconds if player1 has won the game.
           If player1 is the winner, reloads the page to show the game over screen. -->
      <script>
    setInterval(function() {
        fetch("poll.php")
            .then(response => response.json())
            .then(data => {
                if (data.winner === 'player1') {
                    location.reload();
                }
            });
    }, 2000);
</script>

    <?php elseif ($game['winner'] === 'player2'): ?>
    <!--  YOU WON  -->
      <div class="alert alert-success mt-5 mb-5 text-center">
        🎉 You guessed it! The number set by <strong><?= $_SESSION['nameP1'] ?></strong>
        was <strong><?= $_SESSION['secretP1'] ?></strong>
      </div>

      <button form="newgame" type="submit" class="btn btn-success">🔄 Play Again</button>
      <form id="newgame" action="newgame.php" method="POST"></form>

    <?php elseif ($game['status'] === 'game_over'): ?>
    <!--  YOU LOST  -->
      <div class="alert alert-danger mt-5 mb-5 text-center">
        You lost! <strong><?= $_SESSION['nameP1'] ?></strong> guessed your number.
        You were guessing : <strong><?= $_SESSION['secretP1'] ?></strong>
      </div>

      <button form="newgame" type="submit" class="btn btn-success">🔄 Play Again</button>
      <form id="newgame" action="newgame.php" method="POST"></form>
  
    <?php endif; ?>


  </div>
  <!-- End Left Side -->

  <!-- Right Side - Guess History -->
  <div class="flex-fill">
    <?php require "guessesP2.php"; ?>
  </div>

</div>

<script>
  const inputs = document.querySelectorAll(".box");
  inputs[0].focus(); // sets the cursor to the first input box everytime

  inputs.forEach((input, index) => {
    input.addEventListener("input", function () {
      if (this.value.length === 1 && index < inputs.length - 1) {
        inputs[index + 1].focus();
      }
    });

    input.addEventListener("keydown", function (e) {
      if (e.key === "Backspace" && this.value === "" && index > 0) {
        inputs[index - 1].focus();
      }
    });
  });
</script>

</body>
</html>