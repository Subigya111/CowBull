 # Guess the Number (CowBull) game
 ## Overview:
 CowBull is a number guessing game built with core PHP, Bootstrap, and JavaScript. The game is available in two modes — a solo mode where you guess a secret number set by the computer, and a multiplayer mode where two players compete against each other in real time.
## How to play:
A secret four digit number is set with no repeating digits. You guess the number by entering four digits and the game responds with:

- *Bull* — correct digit in the correct position
- *Cow* — correct digit but in the wrong position

Keep guessing until you get four Bulls,which means you have found the exact number.
### Multiplayer Mode
One player creates a game and receives a unique four digit code. They share this code with their friend who joins using it. Both players then set a secret number for each other to guess. Players take turns guessing each other's number. The first player to correctly guess their opponent's number wins. The game updates automatically using polling so no manual refreshing is needed.
#### Built With

- PHP — game logic, session management, JSON file storage
- JavaScript — auto input focus, polling for real time updates
- Bootstrap 5 — UI and layout

## Features

- Solo mode against the computer
- Real time two player mode using a shared game code
- Turn based gameplay with automatic screen updates
- Guess history tracked per player
- Input auto advances between digit boxes