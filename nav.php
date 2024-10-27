<!-- Side Navigation -->
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="index.php">Home</a>
    <a href="reviews.php">Reviews</a>
    <a href="riff.php">Riff</a>
    <a href="database.php">Database</a>
    <a href="signup.php">Sign up</a>
    <a href="login.php">Log in</a>
</div>


<!-- JavaScript for opening and closing the sidenav -->
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px"; // Set the width of the sidenav
    document.getElementById("main").style.marginLeft = "250px"; // Shift main content to the right
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0"; // Hide the sidenav
    document.getElementById("main").style.marginLeft = "0"; // Reset the main content margin
}
</script>
