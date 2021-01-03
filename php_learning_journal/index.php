<?php
include "inc/functions.php";

include "inc/header.php";

?>

        <section>
            <div class="container">
                <div class="entry-list">
                    <article>
                        <?php
                        foreach (get_journal_entries() as $entry) {
                            echo "<h2><a href='detail.php?id=" . $entry['id'] . "'>" . $entry['title'] . "</a></h2>";
                            $entry_date = date("F d,Y", strtotime($entry['date']));
                            echo "<p>" . $entry_date . "</p><br />";

                            echo "<br />";
                        }
                        ?>
                    </article>
                </div>
            </div>
        </section>

<?php
include "inc/footer.php";
?>