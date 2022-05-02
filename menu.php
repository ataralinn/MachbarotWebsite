   
        
    <!--<script src= "//code.jquery.com/jquery-1.11.3.min.js"></script>--> 


<!-- Sidebar/menu -->
  
<nav class="w3-sidebar w3-blue w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;background: linear-gradient(to bottom, #0066cc 0%, #ffffff 100%);" id="mySidebar">
        <br>
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
        <div class="w3-container" >
            <img src="Pictures\Machbarot.png">
       
        </div>
        <ul class = "slimmenu" style="list-style-type: none;">
            <li><a href="./Machberos.php"  class="w3-bar-item w3-button w3-hover-white">Home</a></li>
            <li><a href="./publications.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Publications</a></li>
            <li>
                <a class="w3-bar-item w3-button w3-hover-white ">Shiurim</a>
                <ul  class = "slimmenu2"  style="list-style-type: none;" >
                    <li><a href="./shiurim - Video.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Video</a></li>
                    <li><a href="./shiurim - Audio.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Audio</a></li>
                </ul>
            </li>
            
            <li><a href="./subscription.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Subsciptions</a><li>
            <li><a href="./Machberos.php#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Contact</a></li>
        </ul>
</nav>
    <script src="jquery.slimmenu.min.js"></script>
    <script> 
        $('.slimmenu').slimmenu(
        {
            resizeWidth: '800',
           
            collapserTitle: 'Main Menu',
            animSpeed: 'medium',
            easingEffect: null,
            childrenIndenter: '&nbsp; ',
            expandIcon:'<i>&#9660;</i>',
            collapseIcon:'<i>&#9650;</i>'
        });

    </script>


    <!-- Top menu on small screens -->
    <header class="w3-container w3-top w3-hide-large w3-#0066cc w3-xlarge w3-padding" >

        <a href="javascript:void(0)" class="w3-button w3-#0066cc w3-margin-right" id ="mySidebar" onclick="w3_open()">☰</a>
        <span>Machbarot</span>

    </header>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!--Top menubar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
        <?php
            if($_SESSION['loggedin'] === false){ 
            echo "<ul class='navbar-nav ml-auto'>
                    <li class='nav-item'>
                        <a class='nav-link' href='./login_form.php'>
                            Login 
                        </a>
                    </li>
                    <li class=nav-item>
                        <a class='nav-link' href='./sign_up_form.php' >
                            Create Account
                        </a>
                    </li>   
                </ul>";    
            }
            else{
                echo "<ul class='navbar-nav ml-auto'>
                    <li class='nav-item'>
                        <a class='nav-link' href=''>
                            Hello " . strtoupper( $_COOKIE['username']);
                        echo "</a>
                    </li>
                    <li class=nav-item>
                        <a class='nav-link' href='./log_out.php' >
                            Log Out 
                        </a>
                    </li>   
                </ul>";
            } 
        ?>
    </div>
</nav>

