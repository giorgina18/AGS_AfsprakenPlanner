<?php
require_once 'template-parts/header.php';
$db = new Database();

// Set the table you want to query
$db->setTable('tijdstip');

// Fetch all rows from the 'evenementen' table
$rows = $db->fetchAllRows();

if (!empty($rows)):
?>

    <!-- home page -->
    <section class="agenda">
        <div class="agenda__day">
            <div class="agenda__title">
                <h3>Maandag</h3>
            </div>
            <?php
            foreach ($rows as $row):
                $id = $row['id'];
                $tijdstip = $row['tijdstip'];

            ?>
                <div class="agenda__item">
                    <span><a href="agenda-item.php?id=<?= $id; ?>&day=1"><?= $tijdstip; ?></a></span>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="agenda__day">
            <div class="agenda__title">
                <h3>Dinsdag</h3>
            </div>
            <?php
            foreach ($rows as $row):
                $id = $row['id'];
                $tijdstip = $row['tijdstip'];

            ?>
                <div class="agenda__item">
                <span><a href="agenda-item.php?id=<?= $id; ?>&day=2"><?= $tijdstip; ?></a></span>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="agenda__day">
            <div class="agenda__title">
                <h3>Woensdag</h3>
            </div>
            <?php
            foreach ($rows as $row):
                $id = $row['id'];
                $tijdstip = $row['tijdstip'];

            ?>
                <div class="agenda__item">
                <span><a href="agenda-item.php?id=<?= $id; ?>&day=3"><?= $tijdstip; ?></a></span>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="agenda__day">
            <div class="agenda__title">
                <h3>Donderdag</h3>
            </div>
            <?php
            foreach ($rows as $row):
                $id = $row['id'];
                $tijdstip = $row['tijdstip'];

            ?>
                <div class="agenda__item">
                <span><a href="agenda-item.php?id=<?= $id; ?>&day=4"><?= $tijdstip; ?></a></span>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="agenda__day">
            <div class="agenda__title">
                <h3>Vrijdag</h3>
            </div>
            <?php
            foreach ($rows as $row):
                $id = $row['id'];
                $tijdstip = $row['tijdstip'];

            ?>
                <div class="agenda__item">
                <span><a href="agenda-item.php?id=<?= $id; ?>&day=5"><?= $tijdstip; ?></a></span>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="agenda__day">
            <div class="agenda__title">
                <h3>Zaterdag</h3>
            </div>
            <?php
            foreach ($rows as $row):
                $id = $row['id'];
                $tijdstip = $row['tijdstip'];

            ?>
                <div class="agenda__item">
                <span><a href="agenda-item.php?id=<?= $id; ?>&day=6"><?= $tijdstip; ?></a></span>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="agenda__day">

            <div class="agenda__title">
                <h3>Zondag</h3>
            </div>
            <?php
            foreach ($rows as $row):
                $id = $row['id'];
                $tijdstip = $row['tijdstip'];

            ?>
                <div class="agenda__item">
                <span><a href="agenda-item.php?id=<?= $id; ?>&day=7"><?= $tijdstip; ?></a></span>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php
endif;
require_once 'template-parts/footer.php';
?>