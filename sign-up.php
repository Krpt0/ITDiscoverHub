<?php
  include 'backend/models.php';
  include 'backend/rules.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["Fname"];
    $lastName = $_POST["Lname"];
    $email = $_POST["emailAddress"];
    $password = $_POST["password"];
    
    if (isEmailExists($email)) {
      $error = "Username already exists.";
    }
    else {
      $result = registerUser($firstName, $lastName, $email, $password);
      if ($result) {
        header("Location: home.html");
      }
      exit; 
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="sign-up.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="container">
      <div class="left-container">
        <h2 class="text1">Sign up</h2>
        <p class="text2">
          Please enter your details to sign up <br />and be part of our great
          team.
        </p>
        <p class="text3">Already have an account?</p>
        <a href="#" target="_blank">Sign In</a>
      </div>
      <div class="right-container">
        <form method="POST" class="signIn-form">
          <div class="name-inputs">
            <div class="input-group">
              <label for="Fname-label">FIRST NAME</label>
              <input type="text" name="Fname" required />
            </div>
            <div class="input-group">
              <label for="Lname-label">LAST NAME</label>
              <input type="text" name="Lname" required />
            </div>
          </div>

          <div class="email-inputs">
            <label for="email-label">EMAIL ADDRESS</label><br />
            <div class="input-with-icons">
              <input
                type="email"
                name="emailAddress"
                class="emailAddress"
                required
              />
              <i class="bx bxs-envelope"></i><br />
            </div>
            <?php if (isset($error)): ?>
              <p style="color: red; margin-top: .5rem;"><?php echo $error; ?></p>
            <?php endif; ?>
          </div>

          <div class="password-inputs">
            <label for="password-label">PASSWORD</label><br />
            <div class="input-with-icons">
              <input
                type="password"
                name="password"
                class="password"
                id="passwordField"
                required
              />
              <i
                class="bx bxs-hide"
                id="togglePassword"
                onclick="togglePasswordVisible()"
              ></i
              ><br />
            </div>
          </div>

          <div class="button">
            <button class="signIn" type="submit">Sign Up</button>
          </div>
        </form>
      </div>
    </div>

    <script>
      function togglePasswordVisible() {
        let inputPassword = document.getElementById("passwordField");
        if (inputPassword.type === "password") {
          inputPassword.type = "text";
        } else {
          inputPassword.type = "password";
        }
      }
    </script>
  </body>
</html>
