<?php
include "inc/functions.php";
include "inc/header.php";

if (isset($_POST['delete'])) {
    if (delete_entry(filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_NUMBER_INT))) {
        header('location: index.php?msg=Entry+Deleted');
        exit();
    } else {
        header('location: index.php?msg=Unable+To+Delete+Entry');
        exit();
    }
}
if (isset($_GET['msg'])) {
    $error_message = trim(filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING));
}

?>

        <section>
            <div class="container">
                <div class="entry-list">
                    <article>
                        <ul style="list-style-type: none;">
                        <?php
                        if (isset($error_message)) {
                            echo "<p>$error_message</p>";
                        }
                        ?>
                        <?php
                        foreach (get_journal_entries() as $entry) {
                            echo "<li class='none'><h2><a href='detail.php?id=" . $entry['id'] . "'>" . $entry['title'] . "</a></h2></li>";
                            $entry_date = date("F d,Y", strtotime($entry['date']));
                            echo "<p>" . $entry_date . "</p>";

                            echo "<form method='post' action='index.php'>\n";
                            echo "<input type='hidden' value='" . $entry['id'] . "' name='delete'/>";
                            echo "<input class='button' type='submit' value='Delete' /><br />";
                            echo "<br />";
                            echo "<br />";
                            echo "<br />";
                            echo "</form>";
                        }
                        ?>
                        </ul>
                    </article>
                </div>
            </div>
        </section>

<?php
include "inc/footer.php";
?>