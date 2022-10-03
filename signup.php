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
                if (isset($_SESSION['message'])){
                  echo $_SESSION['message'];
                }
                unset($_SESSION['message']);
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
            

            <button type="submit" class="signup">Signup</button>
          </form>
        </div>
      </section>
    </main>