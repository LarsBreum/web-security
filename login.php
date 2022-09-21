<?php
        session_start();
        include 'header.php'
?>

<main>
      <!-- BANNER -->
      <section class="signUp">
        <h1>Login</h1>
        <div class="signUpContainer">
          <form action="login_submit.php" method="POST">
            <label for="name">Username</label>
            <input
              type="text"
              value="<?php if (isset($_COOKIE["user"])){echo $_COOKIE["user"];}?>"
              name="username"
              id="name"
              placeholder="Username..."
            />
            <label for="password">Password</label>
            <input
              type="password"
              value="<?php if (isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>"
              name="password"
              id="password"
              placeholder="******"
            />
            <label>
            <input 
              type="checkbox" 
              name="remember"
              id="remember"
              <?php if (isset($_COOKIE["user"]) && isset($_COOKIE["pass"])){ echo "checked";}?>
            /> 
            Remember me</label>
            <button 
              type="submit" 
              class="signup"
              value="Login"
              name="login"
              >Login
            </button>
          </form>
          <span>
            <?php
              if (isset($_SESSION['message'])){
                echo $_SESSION['message'];
              }
              unset($_SESSION['message']);
            ?>
          </span>
        </div>
      </section>
    </main>

<?php
    include 'footer.php'
?>