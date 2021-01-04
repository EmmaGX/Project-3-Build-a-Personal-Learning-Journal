<?php
function get_journal_entries() {
    include 'connection.php';

    try {
        return $db->query('SELECT * FROM entries ORDER BY  date DESC');
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "</br>";
        return false;
    }
}

function add_entry($title, $date, $timeSpent, $whatILearned, $ResourcesToRemember, $id) {
    include 'connection.php';
    if (isset($id)) {
       $sql = 'UPDATE entries SET title = ?, date = ?, time_spent = ?, learned = ?, resources = ? WHERE id = ? ';
    } else {
        $sql = 'INSERT INTO entries(title, date, time_spent, learned, resources) VALUES(?, ?, ?, ?, ?)';

    }


    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $title, PDO::PARAM_STR);
        $results->bindValue(2, $date, PDO::PARAM_STR);
        $results->bindValue(3, $timeSpent, PDO::PARAM_INT);
        $results->bindValue(4, $whatILearned, PDO::PARAM_STR);
        $results->bindValue(5, $ResourcesToRemember, PDO::PARAM_STR);
        if ($id) {
            $results->bindValue(6, $id, PDO::PARAM_INT);
        }
        $results->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    return true;
}

function get_selected_entry($id) {
    include 'connection.php';

    $sql = 'SELECT * FROM entries WHERE id = ?';

    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $id, PDO::PARAM_INT);
        $results->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
       die();
    }
    return $results->fetch();
}


function delete_entry($id) {
    include 'connection.php';

    $sql = 'DELETE FROM entries WHERE id = ? ';

    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $id, PDO::PARAM_INT);
        $results->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    return true;
}