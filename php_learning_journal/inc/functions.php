<?php
function get_journal_entries() {
    include 'connection.php';

    try {
        return $db->query('SELECT title,date FROM entries');
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "</br>";
        return false;
    }
}

