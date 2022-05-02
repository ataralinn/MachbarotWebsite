<?php
    include "header.php"; 
?>
    <div class='w3-main' style='margin-left:340px;margin-right:40px'>
        <div class='w3-container' id='login' style='margin-top:75px'>
          <h1 class='w3-xxxlarge w3-text-0066cc'><b>Login</b></h1>
          <hr style='width:50px;border:5px solid #0066cc' class='w3-round'>
          <form action='login_response.php' method='post'>
            <div class='w3-section'>
                <label>Username</label>
                <input class='w3-input w3-border' type='text' name='Username' required>
            </div>
            <div class='w3-section'>
                <label>Password</label>
                <input class='w3-input w3-border' type='password' name='Password' required>
            </div>
            <button type='submit' class='w3-button w3-block w3-padding-large w3-light-grey w3-margin-bottom' name='submit' id='submitButton'>Login</button>
            </form>

<?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyInput"){
            echo "<p>Fill in all fields! </p>";
        }
        else if($_GET["error"] == "wrongLogin"){
            echo "<script>alert('Username is incorrect!') </script>";
        }
        else if($_GET["error"] == "wrongPassword"){
            echo "<script>alert('Password is incorrect!') </script>";
        }   
    }
     
?>
      </div>
    </div>

    <?php include "footer.php";