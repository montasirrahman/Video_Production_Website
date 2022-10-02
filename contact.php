<?php
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Optical Legacy</title>
	<link rel="icon" type="image/x-icon" href="img/logo/favicon.png">
	<link rel="stylesheet" href="./css/w3.css">


		<link rel="stylesheet" href="./css/animation.css">
	
	<!--js-->
	
		
<!---Cursor---->	
<link rel="stylesheet" href="./css/cursor.css">
<div class="cursor_0"></div>
<script  src="./js/cursor.js"></script>

</head>
<body>











    <!-- Sidebar -->
    <div class="header-slider-background  w3-bar-block" style="display:none;z-index:5" id="mySidebar">
        <br>
        <center>
          <br><br><br>
          <a href="index.html" class="slider_link">HOME</a><br><br>
          <a href="about.html" class="slider_link">ABOUT</a><br><br>
          <a href="work.html" class="slider_link">WORK</a><br><br>
          <a href="contact.php" class="slider_link">CONTACT</a><br><br>
          <a href="#" class="slider_link">Phone : 832-786-0144</a><br><br>
          <a href="#" class="slider_link">
            Physical Address: <br>
            2601 Prospect St. Suite E <br>
            Houston, Tx 77004
          </a><br><br>
        </center>
        
    </div>
    <div class="w3-overlay" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

    <header class="header" id="header">
		<a href="index.html">
			<img src="./img/logo/gray_logo.png" class="header_logo">
		</a>
		<div class="hide_in_mobile right">
                    <a href="index.html" class="header-text">HOME</a>
                    <a href="about.html" class="header-text">ABOUT</a>
                    <a href="work.html" class="header-text">WORK</a>
                    <a href="contact.php" class="header-text">CONTACT</a>
                    <a href="#" class="header-text"></a>
                    <button  onclick="w3_open()" class="left-slidebar">&#9776;</button>
        </div>
        <div class="hide_in_pc right">
            <button  onclick="w3_open()" class="left-slidebar right2">&#9776;</button>
        </div>   
    </header>
	
	
  <div class="messenger">
    <div title="" class="messenger-btn"><img src="./img/svg/chat.svg" alt="" /><span class="tooltiptext">Message us</span></div>
    <div id="messenger-links" class="messenger-links">
      <a title="Whatsapp" target="_blank" href="https://wa.me/+18327860144"><img src="./img/svg/whatsapp2.svg" alt="Whatsapp" /></a>
      <a title="Messenger" target="_blank" href="https://www.messenger.com/t/1038075709564603"><img src="./img/svg/messenger0.svg" alt="Messenger" /></a>
    </div>
  </div>
  <script src="./js/jquery.min.js"></script>
	
	
				<video id="videoBG" poster="" autoplay muted loop>
					<source src="./files/video/01.mp4" type="video/mp4">
				</video>

								<div class="text_left ">
									<h1 class="linear-wipe-CONTACT ">WE'D LOVE TO HEAR FROM YOU</h1>
								</div>

				

                <br><br><br><br>		




<!---Contact us-->

 
<form method="POST" action="./admin/contact.php" class="contact_us_form">
    <h1>Let's discuss your project!</h1>
    <?php
        $_token = md5(time());
        $_SESSION["_token"] = $_token;
    ?>
    <input type="hidden" name="_token" value="<?php echo $_token; ?>" />
 
    <p>
        <label>Name</label>
        <input type="text" name="name" required>
    </p>
 
    <p>
        <label>Email</label>
        <input type="email" name="email" required>
    </p>
     
    <p>
        <label>Phone</label>
        <input name="phone" required></input>
    </p>
     
    <p>
        <label>Project Type</label>
        <input name="project_type" required></input>
    </p>
	 
    <p>
        <label>Message</label>
        <textarea rows="4" name="message" required></textarea>
    </p>
 
    <p>
        <input type="submit" name="contact_us" class="submit_form" value="Send a Message">
    </p>
</form>
				
<br>
				

        <div class="text_left ">
          <div class="say_hello">
            SAY HELLO
          </div>
          <div class="text_home_details-c">
            Phone : +1 (832) 786-0144 <br><br><!--
            Physical Address: <br>
            2601 Prospect St. Suite E <br>
            Houston, Tx 77004
          </div>-->
        </div>
  </div>
  

  <br><br>


<div class="footer__dashes"></div>		

<footer>
	<h1>LET'S CONNECT</h1>
	<br>

			<table class="table0" >
				<tr>
					<td class="td1">
						info@opticallegacy.com
					</td>
					<td class="td2" colspan="3">
						+1 (832) 786-0144
					</td>
				</tr>
				<tr>
					<td class="td3">
						2601 Prospect St. Suite E Houston, Tx 77004

					</td>
					<td class="td4">
						<a href="https://www.instagram.com/jomoyeni/" target="_blank">
							<img src="./img/icon/instagram.png" class="icon_footer"/>
						</a>
					</td>
					<td class="td4">
						<a href="http://facebook.com/opticallegacy" target="_blank">
							<img src="./img/icon/facebook.png" class="icon_footer"/>
						</a>
					</td>
          <td class="td4">
						<a href="https://vimeo.com/opticallegacy" target="_blank">
							<img src="./img/icon/vimeo.png" class="icon_footer"/>
						</a>
					</td>
				</tr>
			</table>
			<br><br>
			        <div class="footer_last_1 display-inline">
						<img class="footer-logo" src="./img/logo/logo2.png" />
						<p class="footer-logo-text">
										Mission Statement: We’re a full-service video production company with years of valuable,
										hands-on experience. We partner with our clients to design, produce, and execute high-quality
										videos that produce quantifiable results.
						</p>
                    </div>
					<div class="footer_last_2 float-right">


                    </div>
			<br><Br><br><br><Br>
			<p class="float-left text_home_details-f">		
				COPYRIGHT 2022 OPTICAL LEGACY / LEGAL
			</p>
			<a href="https://www.facebook.com/montasirrahmanutsho/" class="float-right" style="color: #fff;">
				<p>		
					WEBSITE BY Montasir Rahman
				</p>
			</a>

</footer>
				
 </div>  

<!-- partial -->
  <script src='./js/gsap.min.js'></script><script  src="./js/animation.js"></script>

<!-- partial -->
	<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/gsap-latest-beta.min.js?r=5426'></script>
	<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/ScrollTrigger.min.js'></script>

    <script src="./js/app.js"></script>
	<script src="./js/loader.js"></script>
	<script src="./js/slider.js"></script>

	
	
	
	
        <!---Header script-->
</body>
</html>
