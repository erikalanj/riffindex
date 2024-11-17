<?php
require "top.php";
require "nav.php";
?>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles.css">

<!-- main container -->
<main class="container my-5 d-flex justify-content-center">
    <!-- carousel card container with text on top -->
    <div class="card shadow-lg rounded-lg" style="max-width: 1000px;">
        <!-- description section on top -->
        <div class="card-header text-center bg-white border-0">
            <h2 class="display-4">Rock out!</h2>
            <p class="lead">Enjoy a look at some of our favorite bands right now and their live performances!</p>
        </div>

        <!-- carousel body with padding and rounded corners -->
        <div class="card-body p-0">
            <!-- carousel component -->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner rounded">
                    <div class="carousel-item active">
                        <img src="images/nirvana1.jpg" class="d-block w-100 carousel-image" alt="Nirvana">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="text-container">
                                <h3>Nirvana</h3>
                                <p>Debatably the Best Grunge Band of the 90's!</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/qotsa2.jpg" class="d-block w-100 carousel-image" alt="Qotsa">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="text-container">
                                <h3>Queens of the Stone Age</h3>
                                <p>QOTSA touring for their newest 2023 album, "In Times New Roman..."!</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/stokes1.jpg" class="d-block w-100 carousel-image" alt="strokes">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="text-container">
                                <h3>The Strokes</h3>
                                <p>The Famous 2 Dollar MTV Strokes Performance which Revived Garage Rock in the Early 2000's!</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- controls for carousel -->
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</main>

<!-- The Band Section -->
<div class="band-section-wrapper">
    <div class="w3-container w3-content w3-center w3-padding-64 band-section" id="band">
        <h2 class="w3-wide text-center">RiffIndex</h2>
        <p class="w3-opacity text-center"><i>Your Gateway to Alterative Music</i></p>
        <div class="paragraph-container">
        Discover a haven for alternative music lovers! At RiffIndex, we bring together a passionate community of listeners who thrive on the raw energy of grunge, indie, and alternative rock. Dive into our vast database of music, explore tabs for your favorite songs, read in-depth reviews, and stay up-to-date with the latest in the alternative scene. Whether you're here to find your next obsession or relive classics, RiffIndex is your ultimate music companion.
        </p>
        <?php require "aside.php"; ?>
    </div>
</div>
</div>

<!-- The Contact Section -->


<!-- The Contact Section -->
<div class="w3-container w3-content" id="contact">
  <h2 class="w3-wide w3-center">CONTACT</h2>

  <div class="w3-row w3-padding-32">
    <div class="w3-col m6 w3-large w3-margin-bottom">
      <i class="fa fa-map-marker"></i> New Britain, CT<br>
      <i class="fa fa-phone"></i> Phone: ---- --- ---<br>
      <i class="fa fa-envelope"></i> Email: riffindex@gmail.com<br>
    </div>
    <div class="w3-col m6">
      <form action="send_email.php" method="POST">
        <div class="w3-row-padding">
          <div class="w3-half">
            <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name" aria-label="Your Name">
          </div>
          <div class="w3-half">
            <input class="w3-input w3-border" type="email" placeholder="Email" required name="Email" aria-label="Your Email">
          </div>
        </div>
        <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message" aria-label="Your Message">
        <button class="w3-button w3-black w3-section w3-right" type="submit">SEND</button>
      </form>
    </div>
  </div>
</div>





<?php require "foot.php"; ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
