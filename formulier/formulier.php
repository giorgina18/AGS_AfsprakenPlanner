<?php
require_once '../template-parts/header.php';
?>

<div class="formulier">
    <form>
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname">
        <input type="email">
        <input type="password">
    </form>
</div>

<?php
require_once '../template-parts/footer.php';
?>