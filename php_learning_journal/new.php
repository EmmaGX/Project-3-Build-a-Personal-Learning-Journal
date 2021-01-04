<?php
include 'inc/functions.php';
include 'inc/header.php';

$title = $date = $timeSpent = $whatILearned = $ResourcesToRemember = '';
if (isset($_GET['id'])) {
    list($id, $title, $date, $timeSpent, $whatILearned, $ResourcesToRemember) = get_selected_entry(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
        $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING));
        $timeSpent = trim(filter_input(INPUT_POST,'timeSpent', FILTER_SANITIZE_NUMBER_INT));
        $whatILearned = trim(filter_input(INPUT_POST, 'whatILearned', FILTER_SANITIZE_STRING));
        $ResourcesToRemember = trim(filter_input(INPUT_POST, 'ResourcesToRemember', FILTER_SANITIZE_STRING));
    if (empty($title) || empty($date) || empty($timeSpent) || empty($whatILearned)) {
        $error_message = 'Please fill in the required fields: Title, Date, Time Spent and Learned';
    } else {

        if(isset($id)) {
            $passId = $id;
        } else {
            $passId = NULL;
        }
        if (add_entry($title, $date, $timeSpent, $whatILearned, $ResourcesToRemember, $passId)){
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
                    <h2><?php
                    if (!empty($id)) {
                        echo 'Update';
                    } else {
                        echo 'New';
                    }
                    ?> Entry</h2>
                    <?php
                    if (isset($error_message)) {
                        echo "<p>$error_message</p>";
                    }
                    ?>
                    <form method="post" action="new.php">
                        <label for="title"> Title</label>
                        <input id="title" type="text" name="title" value="<?php echo $title ?>" ><br>
                        <label for="date">Date</label>
                        <input id="date" type="date" name="date" value="<?php  echo $date ?>"><br>
                        <label for="timeSpent"> Time Spent</label>
                        <input id="timeSpent" type="text" name="timeSpent" value="<?php echo $timeSpent ?>"><br>
                        <label for="whatILearned">What I Learned</label>
                        <textarea id="whatILearned" rows="5" name="whatILearned" ><?php echo $whatILearned ?></textarea>
                        <label for="ResourcesToRemember">Resources to Remember</label>
                        <textarea id="ResourcesToRemember" rows="5" name="ResourcesToRemember" ><?php echo $ResourcesToRemember ?></textarea>
                        <?php
                        if (!empty($id)) {
                            echo '<input type="hidden" name="id" value= "' . $id . '" />';
                        }
                        ?>
                        <input type="submit" value="<?php
                            if (!empty($id)) {
                                echo 'Update';
                            } else {
                                echo 'New';
                            }
                            ?> Entry" class="button">
                        <a href="#" class="button button-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </section>
<?php
include "inc/footer.php";
?>