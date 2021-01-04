<?php
include 'inc/functions.php';
include 'inc/header.php';


if (isset($_GET['msg'])) {
    $error_message = trim(filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING));
}

if (isset($_GET['id'])) {
    list($id, $title, $date, $timeSpent, $whatILearned, $ResourcesToRemember) = get_selected_entry(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
    $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING));
    $timeSpent = trim(filter_input(INPUT_POST, 'timeSpent', FILTER_SANITIZE_STRING));
    $whatILearned = trim(filter_input(INPUT_POST, 'whatILearned', FILTER_SANITIZE_STRING));
    $ResourcesToRemember = trim(filter_input(INPUT_POST, 'ResourcesToRemember', FILTER_SANITIZE_STRING));

    if (empty($id) || empty($title) || empty($date) || empty($timeSpent) || empty($whatILearned) || empty($ResourcesToRemember)) {
        get_selected_entry($title, $date, $timeSpent, $whatILearned, $ResourcesToRemember);
        } else {
            if (add_entry($title, $date, $timeSpent, $whatILearned, $ResourcesToRemember, $id)) {
                header('Location: index.php');
                exit();
            } else {
                echo $error_message = 'Could not find entry';
            }
        }
    }


?>
<section>
    <div class="container">
        <div class="entry-list single">
            <article>
                <?php
                if (isset($error_message)) {
                    echo "<p>$error_message</p>";
                }
                ?>

                <?php
                    echo "<h1>" . $title . "</h1>";
                    echo "<time datetime=\"2016-01-31\">" . date("F d,Y", strtotime($date)) . "</time>";
                ?>

                <div class="entry">
                    <h3>Time Spent: </h3>
                    <?php
                    echo "<p>". $timeSpent . "</p>";
                    ?>
                </div>

                <div class="entry">
                    <h3>What I Learned:</h3>
                    <?php
                    echo "<p>". $whatILearned . "</p>";
                    ?>
                </div>

                <div class="entry">
                    <h3>Resources to Remember:</h3>
                    <?php
                    echo "<p>". $ResourcesToRemember . "</p>";
                    ?>
                </div>
            </article>
        </div>
    </div>
    <div class="edit">

        <?php
        echo "<p><a class='button button.icon-right' href='new.php?id=" . $id . "'>" . 'Edit Entry' . "</a></p><br />";
        ?>

        <?php
        echo "<form method='post' action='index.php' onsubmit='return confirm(\"Are you sure you want to delete this entry?\")'; >\n";
        echo "<input type='hidden' value='" . $id . "' name='delete'/>";
        echo "<input class='button button.icon-right' type='submit' value='Delete' /><br />";
        echo "</form>";
        ?>
    </div>
</section>
<?php
include 'inc/footer.php';
?>

