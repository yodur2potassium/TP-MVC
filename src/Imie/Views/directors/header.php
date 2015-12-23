<header>
  <?php if(isset($_SESSION["error"])){
    echo $_SESSION["error"];unset($_SESSION["error"]);
  }else{
    if(isset($_SESSION["success"])){
      echo $_SESSION["success"];unset($_SESSION["success"]);
    }
  }
  ?>
</header>
