<?php
require "top.php"; // Include your top section (header, etc.)
require "nav.php"; // Include your navigation bar
?>

<link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->

<!-- Automatic Slideshow Images -->
<div class="mySlides w3-display-container w3-center">
    <img src="images/nirvana1.jpg" alt="Los Angeles">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>Los Angeles</h3>
      <p><b>We had the best time playing at Venice Beach!</b></p>   
    </div>
</div>
<div class="mySlides w3-display-container w3-center">
    <img src="images/qotsa1.jpg" alt="New York">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>New York</h3>
      <p><b>The atmosphere in New York is lorem ipsum.</b></p>    
    </div>
</div>
<div class="mySlides w3-display-container w3-center">
    <img src="images/stokes1.jpg" alt="Chicago">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>Chicago</h3>
      <p><b>Thank you, Chicago - A night we won't forget.</b></p>    
    </div>
</div>

<div class="container">
    <!-- The Band Section -->
    <div class="w3-container w3-content w3-center w3-padding-64" id="band">
        <h2 class="w3-wide">New Music</h2>
        <p class="w3-opacity"><i>We love music</i></p>
        <p class="w3-justify">We have created a fictional band website. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur
            adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>

    <!-- The Gallery Section -->
    <div class="gallery-container">
        <div class="gallery">
            <a target="_blank" href="img_5terre.jpg">
                <img src="images/stokes1.jpg" alt="Cinque Terre" width="600" height="400">
            </a>
            <div class="desc">Add a description of the image here</div>
        </div>

        <div class="gallery">
            <a target="_blank" href="img_forest.jpg">
                <img src="images/nirvana1.jpg" alt="Forest" width="600" height="400">
            </a>
            <div class="desc">Add a description of the image here</div>
        </div>

        <div class="gallery">
            <a target="_blank" href="img_lights.jpg">
                <img src="images/qotsa1.jpg" alt="Northern Lights" width="600" height="400">
            </a>
            <div class="desc">Add a description of the image here</div>
        </div>

        <div class="gallery">
            <a target="_blank" href="img_mountains.jpg">
                <img src="images/nirvana1.jpg" alt="Mountains" width="600" height="400">
            </a>
            <div class="desc">Add a description of the image here</div>
        </div>
    </div>
</div>

<?php require "foot.php"; // Include your footer ?>





<script>
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 4000);    
}

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>