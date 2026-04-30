
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

<div class="d-flex justify-content-center ">


  <div class="d-flex  flex-column  align-items-center"
       style="width:50%; height:100vh; background:#DBDFFF; box-shadow: 0px 4px 10px 2px gray;">


  
<h4 class="p-3"><strong>🐮 CowBull 🐂</strong></h4>

    <h6 class="mt-4 mb-4 text-center">
      Enter guesses and find the 4 digit number earlier than your friend.
      </h6>
      <h6 class=" text-center mb-4">
      Set a secret number for your friend to guess. Your friend will do the same.</h6>
      <h6 class=" text-center mb-4">
         Try to guess each other's number. <a href="/php/singleGame/help.php">Help??</a>
          </h6>
  
<div class="d-flex flex-column align-items-center m-5 pt-3"
    style="width:40%; box-shadow: 0px 4px 10px 1px gray; background: #A39B9B; border-radius: 10px;">

    <form action="generateGameCode.php" method="POST" 
          class="d-flex flex-column align-items-center w-75 mt-3">
        <input type="text" name="nameP1" placeholder="Enter your name" 
               class="form-control mb-2" required>
        <button type="submit" class="btn btn-primary w-80">Set Game Code</button>
    </form>

    <div class="d-flex align-items-center w-75 my-3">
        <hr class="flex-grow-1">
        <span class="mx-2"><strong>OR</strong></span>
        <hr class="flex-grow-1">
    </div>

    <form action="joinGame.php" method="POST" 
          class="d-flex flex-column align-items-center w-75 mb-3">
        <input type="text" name="nameP2" placeholder="Enter your name" 
               class="form-control mb-2" required>
        <input type="text" name="code" placeholder="Enter game code" 
               class="form-control mb-2" maxlength="4" required>
        <button type="submit" class="btn btn-secondary w-30">Join 👥</button>
    </form>

</div>
      
    </div>      

  

    
        
  </div>

</div>

</body>
</html>
