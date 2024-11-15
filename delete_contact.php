<?php
require_once 'db.php';

// Check if the contact ID is provided
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $contactId = intval($_GET['id']); // Convert to integer for safety

    try {
        // Connect to the database
        $pdo = connectDB();

        // Prepare the DELETE query
        $stmt = $pdo->prepare("DELETE FROM contacts WHERE id = :id");
        $stmt->execute([':id' => $contactId]);

        // Redirect back to the index page with a success message
        header("Location: index.php?message=Contact deleted successfully!");
        exit();
    } catch (PDOException $e) {
        // Redirect back to the index page with an error message
        header("Location: index.php?message=Error deleting contact: " . $e->getMessage());
        exit();
    }
} else {
    // Redirect back to the index page if no valid ID is provided
    header("Location: index.php?message=No contact ID provided.");
    exit();
}
