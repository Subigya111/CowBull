<?php
session_start();
if (!isset($_SESSION['history'])) {
    $_SESSION['history'] = [];
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

<body style="margin:0;">

<div class="d-flex ">


  <div class="d-flex  flex-column flex-fill align-items-center"
       style="width:1%; height:100vh; background:#DBDFFF; box-shadow: 0px 4px 10px 2px gray;">

    
    
    <?php if (isset($_SESSION['won'])): ?>
    <div class="alert alert-success mt-5 mb-5 text-center">
        🎉 You guessed it! The number was <strong><?= $_SESSION['secret'] ?></strong>
    </div>
    
    <button  form="newgame" type="submit" class="btn btn-success">🔄 Play Again</button>
  <form  id="newgame"action="newgame.php" method="POST"> </form>
<?php else: ?>
  
<h4 class="p-3"><strong>🐮 CowBull 🐂</strong></h4>

    <h5 class="mt-4 mb-5 text-center">
      Enter guesses and find the secret four-digit number set by <?php echo $_SESSION['nameP2']?>. 
      
    </h5>

    <h6 class="text-center">
      <strong>Cow</strong> = Correct number, wrong position &
      <strong>Bull</strong> = Correct number, correct position
    </h6>

    <h6 class="mt-4">Keep trying until you guess the correct number</h6>
       
    <form action="compareP1.php" method="POST" class="mt-5 mb-5">
        <input class="box" type="text" name="d1" maxlength="1" required>
        <input class="box" type="text" name="d2" maxlength="1" required>
        <input class="box" type="text" name="d3" maxlength="1" required>
        <input class="box" type="text" name="d4" maxlength="1" required>
        <button type="submit" class="btn btn-sm btn-success">Guess 🤷🏾</button>
    </form>

    <p> See your guesses and match it properly 👉🏽👉🏽👉🏽</p>
     <button form="giveup"type="submit" class="btn btn-sm btn-danger mt-3">🔄 Give Up!</button>
<form id="giveup"action="newgame.php" method="POST"> </form> 


    
<?php endif; ?>
  

    
        
 

  </div>

  <div class="flex-fill">
  <?php
  require "guessesP1.php";
  
  ?>
  
  
</div>
</div>



<script>
const inputs = document.querySelectorAll(".box");

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
