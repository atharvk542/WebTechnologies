<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="width: 50%; margin-left: 40%;">
    <div>
    <h1> Make a test </h1>
    <form action="Welcome2.php" method="get">
        Name: <input type="text" name="name"> <br>
        E-mail: <input type="text" name="email"><br>
        <h5>In PHP, the variable name starts with $.</h5>
        <label for="cars">Choose true or false:</label>
        <select id="answer" name="question1">
            <option value="true">True</option>
            <option value="false">False</option>
        </select><br>
    <h5>In PHP, each statement ends with a ";"</h5>
    <label for="cars">Choose true or false:</label>
        <select id="answer" name="question1">
            <option value="true">True</option>
            <option value="false">False</option>
        </select><br>
    <h5>PHP is a server side language.</h5>
    <input type="radio" name="question3" value="1">
    <label>Yes</label><br>
    <input type="radio" name="question3" value="2">
    <label>No</label><br>
    <input type="radio" name="question3" value="3">
    <label>Sometimes</label><br>
    <input type="radio" name="question3" value="4">
    <label>Only on Mondays. </label><br>
    <input type="submit" value="Submit">
    <br>
    <input type="reset" value="Reset">
    </form>
</div>
    
</body>
</html>