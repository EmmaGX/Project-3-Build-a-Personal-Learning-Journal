<?php
include "inc/header.php";
include "inc/functions.php";
?>

        <section>
            <div class="container">
                <div class="entry-list">
                    <article>
                        <?php
                        foreach (get_journal_entries() as $entry) {

                            echo "<h2>" . $entry['title'] . "</h2>";
                            $entry_date = date("F,d,Y", strtotime($entry['date']));
                            echo "<p>" . $entry_date . "</p><br />";
                        }
                        ?>
                    </article>
                </div>
            </div>
        </section>

<?php

include "inc/footer.php";
?>