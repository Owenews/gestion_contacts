<?php
require_once 'db.php';

// Function to add a contact
function addContact($name, $email, $phone) {
    try {
        $pdo = connectDB();
        $req = $pdo->prepare("INSERT INTO contacts (name, email, phone) VALUES (:name, :email, :phone)");
        $req->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone
        ]);
        return "Contact added successfully!";
    } catch (PDOException $e) {
        return "Error adding contact: " . $e->getMessage();
    }
}

// Function to retrieve a contact by ID
function getContact($id) {
    try {
        $pdo = connectDB();
        $req = $pdo->prepare("SELECT * FROM contacts WHERE id = :id");
        $req->execute([':id' => $id]);
        return $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return null;
    }
}

// Function to update a contact
function updateContact($id, $name, $email, $phone) {
    try {
        $pdo = connectDB();
        $req = $pdo->prepare("UPDATE contacts SET name = :name, email = :email, phone = :phone WHERE id = :id");
        $req->execute([
            ':id' => $id,
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone
        ]);
        return "Contact updated successfully!";
    } catch (PDOException $e) {
        return "Error updating contact: " . $e->getMessage();
    }
}

// Function to delete a contact
function deleteContact($id) {
    try {
        $pdo = connectDB();
        $req = $pdo->prepare("DELETE FROM contacts WHERE id = :id");
        $req->execute([':id' => $id]);
        return "Contact deleted successfully!";
    } catch (PDOException $e) {
        return "Error deleting contact: " . $e->getMessage();
    }
}
?>
