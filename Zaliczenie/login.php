<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header>Komunikator szkolny - logowanie</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Adres email</label>
          <input type="email" name="email" placeholder="Podaj adres email" required>
        </div>
        <div class="field input">
          <label>Hasło</label>
          <input type="password" name="password" placeholder="Podaj hasło" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Zaloguj się">
        </div>
      </form>
      <div class="link">Nie masz konta? <a href="index.php">Zarejestruj się!</a></div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>
</html>
