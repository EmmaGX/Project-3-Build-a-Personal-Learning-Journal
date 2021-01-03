<?php
include 'inc/functions.php';
include 'inc/header.php';
?>
        <section>
            <div class="container">
                <div class="edit-entry">

                    <h2>Edit Entry</h2>

                    <form>
                        <php
                         ?>
                        <label for="title"> Title</label>
                        <input id="title" type="text" name="title"><br>
                        <label for="date">Date</label>
                        <input id="date" type="date" name="date"><br>
                        <label for="time-spent"> Time Spent</label>
                        <input id="time-spent" type="text" name="time_spent"><br>
                        <label for="what-i-learned">What I Learned</label>
                        <textarea id="what-i-learned" rows="5" name="learned"></textarea>
                        <label for="resources-to-remember">Resources to Remember</label>
                        <textarea id="resources-to-remember" rows="5" name="resources"></textarea>
                        <input type="submit" value="Publish Entry" class="button">
                        <a href="#" class="button button-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </section>
<?php
include "inc/footer.php";
?>