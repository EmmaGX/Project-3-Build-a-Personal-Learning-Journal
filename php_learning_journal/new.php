<?php
include 'inc/functions.php';
include "inc/header.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
    $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING));
    $timeSpent = trim(filter_input(INPUT_POST,'timeSpent', FILTER_SANITIZE_NUMBER_INT));
    $whatILearned = trim(filter_input(INPUT_POST, 'whatILearned', FILTER_SANITIZE_STRING));
    $ResourcesToRemember = trim(filter_input(INPUT_POST, 'ResourcesToRemember', FILTER_SANITIZE_STRING));

    if (empty($title) || empty($date) || empty($timeSpent) || empty($whatILearned)) {
        $error_message = 'Please fill in the required fields: Title, Date, Time Spent and Learned';
    } else {
        if (add_entry($title, $date, $timeSpent, $whatILearned, $ResourcesToRemember)){
            header('Location: index.php');
            exit();
        } else {
            $error_message = 'Could not add entry';
        }
    }
}


?>
        <section>
            <div class="container">
                <div class="new-entry">
                    <h2>New Entry</h2>
                    <?php
                    if (isset($error_message)) {
                        echo "<p>$error_message</p>";
                    }
                    ?>
                    <form method="post" action="new.php">
                        <label for="title"> Title</label>
                        <input id="title" type="text" name="title"><br>
                        <label for="date">Date</label>
                        <input id="date" type="date" name="date"><br>
                        <label for="time-spent"> Time Spent</label>
                        <input id="time-spent" type="text" name="timeSpent"><br>
                        <label for="what-i-learned">What I Learned</label>
                        <textarea id="what-i-learned" rows="5" name="whatILearned"></textarea>
                        <label for="resources-to-remember">Resources to Remember</label>
                        <textarea id="resources-to-remember" rows="5" name="ResourcesToRemember"></textarea>
                        <input type="submit" value="Publish Entry" class="button">
                        <a href="#" class="button button-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </section>
<?php
include "inc/footer.php";
?>