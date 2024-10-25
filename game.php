<!DOCTYPE html>
<html>
<head>
    <title>c4422e2c</title>
</head>
<body>
    <h1>Rock Paper Scissors Game</h1>
    
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }

    $username = $_SESSION['username'];
    echo "<h2>Welcome, $username!</h2>";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_choice = $_POST['choice'];
        $choices = ['rock', 'paper', 'scissors'];
        $computer_choice = $choices[array_rand($choices)];
        
        echo "<p>You chose: $user_choice</p>";
        echo "<p>Computer chose: $computer_choice</p>";

        if ($user_choice == $computer_choice) {
            echo "<p>It's a tie!</p>";
        } elseif (
            ($user_choice == 'rock' && $computer_choice == 'scissors') ||
            ($user_choice == 'paper' && $computer_choice == 'rock') ||
            ($user_choice == 'scissors' && $computer_choice == 'paper')
        ) {
            echo "<p>You win!</p>";
        } else {
            echo "<p>You lose!</p>";
        }
    }
    ?>

    <form method="POST">
        <label for="choice">Choose:</label>
        <select name="choice" id="choice" required>
            <option value="rock">Rock</option>
            <option value="paper">Paper</option>
            <option value="scissors">Scissors</option>
        </select>
        <input type="submit" value="Play">
    </form>
    
    <form method="POST" action="logout.php">
        <input type="submit" value="Log Out">
    </form>
</body>
</html>
