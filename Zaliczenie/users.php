<body>
<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>

  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Wyloguj się</a>
      </header>
      <div class="search">
        <span class="text">Wyszukaj użytkownika...</span>
        <input type="text" placeholder="Wpisz nazwę użytkownika...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>

  <script src="javascript/users.js"></script>
  <script src="javascript/group-chat.js"></script> 


  <!-- ///////////////////////////////////////////////MODAL////////////////////////////////////////////////////////////// -->
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
  <body onload="displayMessages()">

<div class="modal fade" id="myModal" role="dialog" enctype="multipart/form-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h2>Czat ogólny</h2>   
            </div>
            <div class="modal-body">
                <form name="frm1" method="post">
                    <div class="form-group">
                        <label for="comment">Wiadomość:</label>
                        <textarea class="form-control" rows="5" name="msg"></textarea>
                        <script src="javascript/validation.js"></script>
                    </div>
                    <!-- tutaj miało być pobieranie ale wycofałem zmiany
                    <div class="form-group">
                     <label for="file">Plik:</label>
                     <input type="file" name="file">
                     </div> 
                     -->
                    <input type="button" name="save" class="Btn send" value="Wyślij" id="butsave">
                </form>
            </div>
            <div id="messageContainer">
            <h2>Wiadomości:</h2>
            <table class="table" id="MyTable">               
            <tbody id="record">
            </tbody>
            </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-close" data-dismiss="modal">Zamknij</button>
            </div>
        </div>
          </body>