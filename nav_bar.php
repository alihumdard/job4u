<?php


?>
<!-- ===============navbar============== -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand text-white" href="index.php">logo</a>
      <form class="form-inline ml-auto">
       <?php 
        if(isset($_SESSION['login']) && !empty($_SESSION['login']))
          {echo '<a href="profile.php" class="btn m-1 px-4 py-2" role="button" aria-pressed="true"> Proflie </a> <a href="signout.php" class="btn m-1 px-4 py-2" role="button" aria-pressed="true"> Sign Out </a>';
          }
        else{ echo'<a href="register.php" class="btn m-1 px-4 py-2" role="button" aria-pressed="true"> Register </a><a href="login.php" class="btn m-1 px-4 py-2" role="button" aria-pressed="true"> Login </a>';
        }   ?> 
        
      </form>
      
    </div>
  </nav>