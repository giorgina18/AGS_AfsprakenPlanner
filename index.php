<?php
require_once 'template-parts/header.php';
$db = new Database();

// Fetch all rows from the 'evenementen' table
$tijdstip_rows = $db->fetchAllRows('tijdstip');

if (!empty($tijdstip_rows)):

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
                foreach ($tijdstip_rows as $tijdstip_row):
                    $id = $tijdstip_row['id'];
                    $tijdstip = $tijdstip_row['tijdstip'];
                    $current_tijdstips =  $db->fetchRowsByValue(
                        'tijdsloten',
                        [
                            [
                                'value' => 'tijdstip_id',
                                'id' => $id
                            ],
                            [
                                'value' => 'dag',
                                'id' => $weekdag_id
                            ]
                        ],

                    );
                ?>
                    <div class="agenda__item">
                        <p><a href="agenda-item.php?id=<?= $id; ?>&day=<?php echo $weekdag_id ?>"><?= $tijdstip; ?></a></p>
                        <?php
                        if (!empty($current_tijdstips)):
                            foreach ($current_tijdstips as $current_tijdstip):
                                $extrainfo = $current_tijdstip['extrainfo'];
                                // var_dump($current_tijdstip);
                        ?>
                                <p><a href="#"><?php echo $extrainfo ?></a></p>
                        <?php
                            endforeach;
                        endif; ?>

                    </div>
                <?php endforeach; ?>

            </div>
        <?php endforeach; ?>
    </section>
<?php
endif;
require_once 'template-parts/footer.php';
?>