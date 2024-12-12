<?php
require_once 'template-parts/header.php';
// Create a new instance of the Database class
$db = new Database();

// Set the table name
$id = $_GET['id'];
// Fetch the event by ID
$event = $db->fetchRowById('tijdstip', $id);
$user_id = 1;
?>
<form action="<?= CustomFunctions::getRootUrl(); ?>includes/handleForm.php" method="post">
    <input type="hidden" name="user-id" value="<?= (isset($user_id)) ? $user_id : ''; ?>">
    <input type="hidden" name="day" value="<?= (isset($_GET['day'])) ? $_GET['day'] : ''; ?>">
    <input type="hidden" name="tijdstip-id" value="<?= (isset($_GET['id'])) ? $_GET['id'] : ''; ?>">
    <select name="papiermaten">
        <option value="1">A4</option>
        <option value="2">SRA4</option>
        <option value="3">A3</option>
        <option value="4">SRA3</option>
        <option value="5">Groot formaat printer tot 160cm breed en 30meter lang</option>
    </select>

    <select name="status">
        <option value="1">Goedgekeurd</option>
        <option value="2">Afgekeurd</option>
        <option value="3">Nog niet bekeken</option>
    </select>

    <textarea name="extrainfo">

    </textarea>
    <input type="submit" value="Verstuur">
</form>
<?php
require_once 'template-parts/footer.php';
?>