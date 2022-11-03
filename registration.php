<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Registration</title>
    <link rel="stylesheet" href="./static/css/style.css" />
</head>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "dbconnect.php";

    $stdID = $_POST["studID"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $age = $_POST["age"];
    $doj = $_POST["doj"];
    $department = $_POST["department"];
    $mobileNumber = $_POST["mobno"];
    $email = $_POST["email"];

    $sql = "INSERT INTO Student VALUES
                (\"$stdID\", \"$password\", \"$name\", \"$doj\", $age, \"$department\", $mobileNumber, \"$email\");
                ";
    if (mysqli_query($conn, $sql)) {
        $inserted = TRUE;
    } else {
        echo "<script>alert(`Error: " . mysqli_error($conn) .  "`)</script>";
    }

    mysqli_close($conn);
}
?>

<body>
    <?php include "nav.php" ?>
    <script>
        document.querySelector('#register').classList.add('highlighted_link');
    </script>
    <main>
        <form action="<?php $_PHP_SELF ?>" method="POST" class="form">
            <div class="field-block">
                <label for="studID">Student ID: </label>
                <input type="text" placeholder="student ID" name="studID" id="studID" />
            </div>
            <div class="field-block">
                <label for="name">Name: </label>
                <input type="text" placeholder="name" name="name" id="name" />
            </div>
            <div class="field-block">
                <label for="password">Password: </label>
                <input type="password" placeholder="password" name="password" id="password" />
            </div>
            <div class="field-block">
                <label for="age">Age: </label>
                <input type="text" placeholder="age" name="age" id="age" />
            </div>
            <div class="field-block">
                <label for="doj">Date of Joining: </label>
                <input type="date" placeholder="DOJ" name="doj" id="doj" />
            </div>
            <div class="field-block">
                <label for="department">Department: </label>
                <input type="text" placeholder="department" name="department" id="department" />
            </div>
            <div class="field-block">
                <label for="mobile number">Mobile No.: </label>
                <input type="text" placeholder="mobile number" name="mobno" id="mobile number" />
            </div>
            <div class="field-block">
                <label for="Email">Email: </label>
                <input type="email" placeholder="email" name="email" id="Email" />
            </div>

            <input type="submit" value="Submit" class="btn" />
        </form>
        <?php if ($inserted) { ?>
            <p class="message success">CREATED NEW Student!</p>
        <?php } ?>
    </main>
</body>

</html>