<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>🔢 CowBull: Number Game </title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body style="margin:0;">
  <div class="d-flex justify-content-center">

  
  <div class="d-flex flex-column align-items-center"
       style="width:50%; height:100vh; background:#DBDFFF; box-shadow: 0px 4px 10px 2px gray;">

    <h4 class="p-3"><strong>🐮 CowBull 🐂</h4></strong>
    <h6 class="mt-4 mb-4">
        Enter guesses and find the secret four-digit number in less turns than your opponent. 🎯
    </h6>
    
      <ul class="mt-4 mb-4 list-unstyled">
        <li class="ps-3"> Game is  pretty simple. Find the hidden number using the position clues.</li>
         <ul>
            <li>Hidden number has four digits, <strong>no repeats</strong> </li>
            <li>Enter guesses, four digits, <strong>no repeats </strong></li>
            <li>Guesses have to be valid digits <strong>(no -ve numbers)</strong> </li>
            <li>For each guess, the number of matching number is shown as a cow or bull </li>
            <li>Exact positional match is a <strong>Bull</strong> 🐂 (digit is same position in the guess and in the hidden number), like in bulls-eye 🎯</li>
            <li>Partial match is a <strong>Cow</strong> 🐮 (digit is present in the hidden number but at a different position)  </li>
         </ul>
      </ul>    
      <ul class="mt-4 mb-4 list-unstyled"> 
        <li class="ps-3">For example, if the hidden number is <strong>4619</strong>,</li>
        <ul>
            <li> Guess <strong>3456</strong> has 2 cows and 0 bulls (<strong>4 & 6 are present but different postion </strong>) </li>
            <li> Guess <strong>1234</strong> has 2 cows and 0 bulls (<strong>1 & 4 are present but different postion </strong>)</li>
            <li>Guess <strong>4567</strong> has 1 cow and 1 bull (<strong>4 is present in correct position & 6 in different postion </strong>)</li>
            <li>Guess <strong>4901</strong> has 2 cows and 1 bulls (<strong>4 is present in correct position & 9,1 are present but different postion </strong>)</li>
            <li>Guess <strong>4619</strong> has 4 bulls (<strong>Game over!! </strong>)</li>
        </ul> 
</div>
</body>
</html>


