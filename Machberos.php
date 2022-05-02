<?php include "header.php";
	require_once "db.php";
?>
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

    <!-- Header -->
    <div class="w3-container" style="margin-top:80px" id="showcase">
        <h1 class="w3-jumbo w3-text-dark-gray"><b>מחברות</b></h1>
        <h1 class="w3-xxxlarge w3-text-red"><b></b></h1>

        <!-- <hr style="width:50px;border:5px solid red" class="w3-round"> -->
    </div>

    <!--Slideshow-->
     <div class="w3-row-padding ">
       
        <ul class="rslides" id='rslides'>
          <li><img src="Pictures/slideshow1.jpg" alt=""></li>
          <li><img src="Pictures/slideshow2.jpg" alt=""></li>
        </ul>
    </div>


    <!--Carosel

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="Pictures/Picture 1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="Pictures/Picture 2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="Pictures/Picture 3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> --> 

    <!-- About  -->
    <div class="w3-container" id="designers" style="margin-top:75px">
        <h1 class="w3-xxxlarge w3-text-dark-gray"><b>About</b></h1>
        <hr style="width:50px;border:5px solid dark-gray" class="w3-round">
    </div>

    <div class="w3-row-padding w3-grayscale">
        <div class="w3-col m4 w3-margin-bottom">
            <div class="w3-light-grey">
                <img src="Pictures/male_profile.jpg" alt="John" style="width:100%">
                <div class="card-body">
                    <h3>Rabbi Dov Herzog</h3>
                </div>
            </div>
        </div>
        <div class="w3-col m6 w3-margin-bottom">
            <div >
                <h5 style ="line-height: 1.5;">
               	Dovi grew up in Brooklyn, NY, and learned in Yeshivas Rabbeinu Chaim Berlin under Rav Ahron Schechter. 
		He continued to deepen his understanding of the depth of Torah and Humanity under Rav Yonason David in Yeshivas Pachad Yitzchok. 
		There he began writing Machbarot, whose role is to process ideas and develop ideas from the cerebral realm into the heart.  
		He also studied in Mir Yerushalaim, as well as by Rav Reuven Leuchter. 
		He is currently a member of the Kollel of Manhattan Beach, in NY.
                </h5>
            </div>
        </div>
    </div>

    <!--Contact-->
    <div class="w3-container" id="contact" style="margin-top:75px">
        <h1 class="w3-xxxlarge w3-text-dark-gray"><b>Contact</b></h1>
        <hr style="width:50px;border:5px solid dark-gray" class="w3-round">
        <p>Feel free to reach out with any questions!</p>
        <form action="./mail.php" method="post">
            <div class="w3-section">
                <label>Name</label>
                <input class="w3-input w3-border" type="text" name="Name" required>
            </div>
            <div class="w3-section">
                <label>Email</label>
                <input class="w3-input w3-border" type="text" name="Email" required>
            </div>
            <div class='w3-section'>
                <label>Select Topic</label>
                <select class="w3-input w3-border" name="Topic">
                    <?php 
                        $records = mysqli_query($conn, "SELECT topic_desc FROM message_topic");
                        while($data = mysqli_fetch_array($records))
                        {
                             echo "<option value='". $data['topic_desc'] ."'>" .$data['topic_desc'] ."</option>";  // displaying data in option menu
                        }	
            
                    ?>
                </select>
            </div>
            

            <div class="w3-section">
                <label>Message</label>
                <input class="w3-input w3-border" type="textarea" name="Message" required>
            </div>
            <button type="submit" class="w3-button w3-block w3-padding-large w3-light-grey w3-margin-bottom" name="submit" id="submitButton">Send Message</button>
        </form>
         <div id = "error" >
         <?php  
            if(isset($_GET["error"])){
                if($_GET["error"] == "invalidEmail"){
                    echo "<script>alert ('Choose a proper email address!')</script>" ;
                }
                else if($_GET["error"] == "stmtFailed"){
                    echo "<script>alert('Something went wrong, try again!') </script>";
                }
              
            }
        ?>
    </div>
  

    <!-- End page content -->
</div>
</div> 
<?php include "footer.php"; ?>