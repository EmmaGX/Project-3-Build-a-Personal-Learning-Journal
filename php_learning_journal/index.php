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

                            echo "<h2><a href=\"detail.php\">" . $entry['title'] . "</a></h2>";
                            $entry_date = date("F,d,Y", strtotime($entry['date']));
                            echo "<p>" . $entry_date . "</p><br />";
                            echo "<br />";

                        }
                        ?>

<!--                        <h2><a href="detail.php">The best day I’ve ever had</a></h2><time datetime="2016-01-31">January 31, 2016</time>-->
                    </article>
<!--                    <article>-->
<!--                        <h2><a href="detail_2.html">The absolute worst day I’ve ever had</a></h2>-->
<!--                        <time datetime="2016-01-31">January 31, 2016</time>-->
<!--                    </article>-->
<!--                    <article>-->
<!--                        <h2><a href="detail_3.html">That time at the mall</a></h2>-->
<!--                        <time datetime="2016-01-31">January 31, 2016</time>-->
<!--                    </article>-->
<!--                    <article>-->
<!--                        <h2><a href="detail_4.html">Dude, where’s my car?</a></h2>-->
<!--                        <time datetime="2016-01-31">January 31, 2016</time>-->
<!--                    </article>-->

                </div>
            </div>
        </section>

<?php

include "inc/footer.php";
?>