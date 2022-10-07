<?php
  $activePage = "Signup";
  include 'header.php';
?>
 <!-- MAIN -->
 <main>
      <!-- BANNER -->
      <section class="signUp">

        <h1>SignUp</h1>
        <div class="signUpContainer">
          <form action="register.php" method="post">
            <label for="username">Username</label>
            <input
              type="text"
              name="username"
              id="username"
              placeholder="Username..."
            />
            <span>
            <?php
                if (isset($_SESSION['user_message'])){
                  echo $_SESSION['user_message'];
                }
                unset($_SESSION['user_message']);
                ?>
          </span>
            <input
              type="text"
              name="address"
              id="address"
              placeholder="address..."
            />
            <label for="password">Password</label>
            <input
              type="password"
              name="password"
              id="password"
              placeholder="******"
            />
            <span>
            <?php
                if (isset($_SESSION['pass_message'])){
                  echo $_SESSION['pass_message'];
                }
                unset($_SESSION['pass_message']);
                ?>
            </span>
            <button type="submit" class="signup">Signup</button>
          </form>
        </div>
      </section>
    </main>
<?php 
  include 'footer.php';
?>