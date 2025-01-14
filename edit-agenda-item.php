<?php
require_once 'template-parts/header.php';
// Create a new instance of the Database class
$db = new Database();

// Set the table name
$id = $_GET['id'];
// Fetch the event by ID
$tijdsloten = $db->fetchRowById('tijdsloten', $id);
?>
<form action="<?= CustomFunctions::getRootUrl(); ?>includes/handleForm.php" method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($tijdsloten['id']); ?>">

    <label for="user_id">User ID:</label>
    <input type="text" id="user_id" name="user_id" value="<?= htmlspecialchars($tijdsloten['user_id']); ?>">

    <label for="dag">Dag:</label>
    <select id="dag" name="dag">
        <option value="1" <?= $tijdsloten['dag'] == 1 ? 'selected' : ''; ?>>Maandag</option>
        <option value="2" <?= $tijdsloten['dag'] == 2 ? 'selected' : ''; ?>>Dinsdag</option>
        <option value="3" <?= $tijdsloten['dag'] == 3 ? 'selected' : ''; ?>>Woensdag</option>
        <option value="4" <?= $tijdsloten['dag'] == 4 ? 'selected' : ''; ?>>Donderdag</option>
        <option value="5" <?= $tijdsloten['dag'] == 5 ? 'selected' : ''; ?>>Vrijdag</option>
        <option value="6" <?= $tijdsloten['dag'] == 6 ? 'selected' : ''; ?>>Zaterdag</option>
        <option value="7" <?= $tijdsloten['dag'] == 7 ? 'selected' : ''; ?>>Zondag</option>
    </select>
    <label for="tijdstip_id">Tijdslot:</label>
    <select id="tijdstip_id" name="tijdstip_id">
        <option value="1" <?= $tijdsloten['tijdstip_id'] == 1 ? 'selected' : ''; ?>>08:30</option>
        <option value="2" <?= $tijdsloten['tijdstip_id'] == 2 ? 'selected' : ''; ?>>09:00</option>
        <option value="3" <?= $tijdsloten['tijdstip_id'] == 3 ? 'selected' : ''; ?>>09:30</option>
        <option value="4" <?= $tijdsloten['tijdstip_id'] == 4 ? 'selected' : ''; ?>>10:00</option>
        <option value="5" <?= $tijdsloten['tijdstip_id'] == 5 ? 'selected' : ''; ?>>10:30</option>
        <option value="6" <?= $tijdsloten['tijdstip_id'] == 6 ? 'selected' : ''; ?>>11:00</option>
        <option value="7" <?= $tijdsloten['tijdstip_id'] == 7 ? 'selected' : ''; ?>>11:30</option>
        <option value="8" <?= $tijdsloten['tijdstip_id'] == 8 ? 'selected' : ''; ?>>12:00</option>
        <option value="9" <?= $tijdsloten['tijdstip_id'] == 9 ? 'selected' : ''; ?>>12:30</option>
        <option value="10" <?= $tijdsloten['tijdstip_id'] == 10 ? 'selected' : ''; ?>>13:00</option>
        <option value="11" <?= $tijdsloten['tijdstip_id'] == 11 ? 'selected' : ''; ?>>13:30</option>
        <option value="12" <?= $tijdsloten['tijdstip_id'] == 12 ? 'selected' : ''; ?>>14:00</option>
        <option value="13" <?= $tijdsloten['tijdstip_id'] == 13 ? 'selected' : ''; ?>>14:30</option>
        <option value="14" <?= $tijdsloten['tijdstip_id'] == 14 ? 'selected' : ''; ?>>15:00</option>
        <option value="15" <?= $tijdsloten['tijdstip_id'] == 15 ? 'selected' : ''; ?>>15:30</option>
        <option value="16" <?= $tijdsloten['tijdstip_id'] == 16 ? 'selected' : ''; ?>>16:00</option>
        <option value="17" <?= $tijdsloten['tijdstip_id'] == 17 ? 'selected' : ''; ?>>16:30</option>
        <option value="18" <?= $tijdsloten['tijdstip_id'] == 18 ? 'selected' : ''; ?>>17:00</option>
        <option value="19" <?= $tijdsloten['tijdstip_id'] == 19 ? 'selected' : ''; ?>>17:30</option>
        <option value="20" <?= $tijdsloten['tijdstip_id'] == 20 ? 'selected' : ''; ?>>18:00</option>
    </select>
    <label for="papiermaten_id">Paper Size:</label>
    <select id="papiermaten_id" name="papiermaten_id">
        <option value="1" <?= $tijdsloten['papiermaten_id'] == 1 ? 'selected' : ''; ?>>A4</option>
        <option value="2" <?= $tijdsloten['papiermaten_id'] == 2 ? 'selected' : ''; ?>>SRA4</option>
        <option value="3" <?= $tijdsloten['papiermaten_id'] == 3 ? 'selected' : ''; ?>>A3</option>
        <option value="4" <?= $tijdsloten['papiermaten_id'] == 4 ? 'selected' : ''; ?>>SRA3</option>
        <option value="5" <?= $tijdsloten['papiermaten_id'] == 5 ? 'selected' : ''; ?>>Groot formaat printer tot 160cm breed en 30meter lang</option>
    </select>

    <label for="extrainfo">Extra Info:</label>
    <textarea id="extrainfo" name="extrainfo"><?= htmlspecialchars($tijdsloten['extrainfo']); ?></textarea>

    <label for="status">Status:</label>
    <select id="status" name="status">
        <option value="1" <?= $tijdsloten['status'] == 1 ? 'selected' : ''; ?>>Goedgekeurd</option>
        <option value="2" <?= $tijdsloten['status'] == 2 ? 'selected' : ''; ?>>Afgekeurd</option>
        <option value="3" <?= $tijdsloten['status'] == 3 ? 'selected' : ''; ?>>Nog niet bekeken</option>
    </select>

    <input type="submit" name="edit_agenda_item" value="Verstuur">

</form>
<?php
require_once 'template-parts/footer.php';
?>