<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Assignment 11</title>
  <link rel="stylesheet" href="./static/css/style.css">
  <style>
    .menu {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      gap: 1rem;

      height: 200px;
    }

    .menu>a {
      vertical-align: middle;
      font-size: 2rem;
    }

    .menu>a:hover {
      text-decoration: underline;
      padding: 0;
    }

    header>h1 {
      padding: 0.75rem 0.5rem;
    }
  </style>
</head>

<body>
  <?php include "nav.php"; ?>
  <script>
    document.querySelector('#home').classList.add('highlighted_link');
  </script>
  <main>
    <div class="menu">
      <a href="./registration.php">Register</a>
      <a href="./login.php">Login</a>
      <a href="./profileupdate.php">Profile Update</a>
    </div>
  </main>
</body>

</html>