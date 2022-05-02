<?php
    include "header.php"; 
    require_once "db.php";
?>
    <div class='w3-main' style='margin-left:340px;margin-right:40px'>
        <div class='w3-container' id='create_account' style='margin-top:75px'>
          <h1 class='w3-xxxlarge w3-text-0066cc'><b>Create Account</b></h1>
          <hr style='width:50px;border:5px solid #0066cc' class='w3-round'>
          <form action='sign_up_response.php' method='post' name='form1'>
             <div class='w3-section'>
                <label>Full Name</label>
                <input class='w3-input w3-border' type='text' name='name' required>
            </div>   
            <div class='w3-section'>
                <label>Email</label>
                <input class='w3-input w3-border' type='text' name='Email' required>
            </div>      
                <div class='w3-section'>
                <label>Username</label>
                <input class='w3-input w3-border' type='text' name='Username' required>
            </div>
            <div class='w3-section'>
                <label>Password</label>
                <input class='w3-input w3-border' type='password' name='Password' required>
            </div>
            <div class='w3-section'>
                <label>Confirm Password</label>
                <input class='w3-input w3-border' type='password' name='Password2' required>
            </div>
            <div class='w3-section'>
                <label>How did you hear about us?</label>
                <select class="w3-input w3-border" name="Referral">
                   <!-- <option disabled selected>-- Select --</option> --> 
                   <?php 
                        $records = mysqli_query($conn, "SELECT referral_desc FROM referral_option");
                        while($data = mysqli_fetch_array($records))
                        {
                             echo "<option value='". $data['referral_desc'] ."'>" .$data['referral_desc'] ."</option>";  // displaying data in option menu
                        }	
            
                    ?>
                </select>
            </div>

            <div class='w3-section'>
                <input type="checkbox" id="subscp" name="subscp" value="subscp">
                <label for="subscp"> I would like to receive the latest publications and media.</label><br>
            </div>
            <input type='submit' class='w3-button w3-block w3-padding-large w3-light-grey w3-margin-bottom' name='submit' id='submitButton'
                value="Create Account" />
            </form>

            <div id = "error" >

<?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyInput"){
            echo "<script>alert ('Fill in all fields!') </script>";
        }
        else if($_GET["error"] == "invalidUsername"){
            echo "<script>alert ('Choose a proper username!')</script>";
        }
        else if($_GET["error"] == "invalidEmail"){
            echo "<script>alert ('Choose a proper email address!')</script>" ;
        }
        else if($_GET["error"] == "pwdXMatch"){
            echo "<script>alert('Passwords do not match!') </script>";
        }
        else if($_GET["error"] == "stmtFailed"){
            echo "<script>alert('Something went wrong, try again!') </script>";
        }
        else if($_GET["error"] == "usernameTaken"){
            echo "<script>alert('Username currently in use!') </script>";
        }

        else if($_GET["error"] == "none"){
          header("Location: ./sign_up_response.php", false);
        }
    }
    
    ?>
            </div>
        </div>
    </div>
    <?php include "footer.php"; 
