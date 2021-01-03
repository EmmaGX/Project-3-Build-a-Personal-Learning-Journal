<?php
require "inc/functions.php";

$pageTitle = "Journal Entries";
$page = "journal_entries";

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

<!--                        <h2><a href="detail.php">The best day I’ve ever had</a></h2><time datetime="2016-01-31">January 31, 2016</time>-->
                    </article>
                </div>
            </div>
        </section>

<?php
include "inc/footer.php";
?>