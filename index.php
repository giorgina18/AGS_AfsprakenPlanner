<?php
require_once 'template-parts/header.php';
$db = new Database();

// Set the table you want to query
$db->setTable('tijdstip');

// Fetch all rows from the 'evenementen' table
$rows = $db->fetchAllRows();

if (!empty($rows)):

    $weekdagen = [
        [
            'id' => '1',
            'weekdag' => 'Maandag'
        ],

        [
            'id' => '2',
            'weekdag' => 'Dinsdag'
        ],

        [
            'id' => '3',
            'weekdag' => 'Woensdag'
        ],

        [
            'id' => '4',
            'weekdag' => 'Donderdag'
        ],

        [
            'id' => '5',
            'weekdag' => 'Vrijdag'
        ],

        [
            'id' => '6',
            'weekdag' => 'Zaterdag'
        ],

        [
            'id' => '7',
            'weekdag' => 'Zondag'
        ],

    ];
?>

    <!-- home page -->
    <section class="agenda">
        <?php
        foreach ($weekdagen as $weekdag):
            $weekdag_id = $weekdag['id'];
        ?>
            <div class="agenda__day">
                <div class="agenda__title">
                    <h3><?php echo $weekdag['weekdag'] ?></h3>
                </div>
                <?php
                foreach ($rows as $row):
                    $id = $row['id'];
                    $tijdstip = $row['tijdstip'];
                ?>
                    <div class="agenda__item">
                        <span><a href="agenda-item.php?id=<?= $id; ?>&day=<?php echo $weekdag_id ?>"><?= $tijdstip; ?></a></span>
                    </div>
                <?php endforeach; ?>

            </div>
        <?php endforeach; ?>
    </section>
<?php
endif;
require_once 'template-parts/footer.php';
?>