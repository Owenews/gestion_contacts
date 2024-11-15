<?php
require_once 'functions.php';

// Check if the contact ID is provided
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Convert to integer for safety

    if ($id) {
        deleteContact($id);

        // Redirect back to the index page with a success message
        header("Location: index.php?message=Contact deleted successfully!");
        exit;
    } else {
        echo "ID contact missing.";
    }
}
