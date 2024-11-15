<?php
require_once 'db.php';

// initialize variables
$name = $email = $phone = '';
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des valeurs du formulaire
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    // Basic field validation
    if (!empty($name) && !empty($email) && !empty($phone)) {
        try {
            // Connect to the database
            $pdo = connectDB();

            // Prepare the insert query
            $req = $pdo->prepare("INSERT INTO contacts (name, email, phone) VALUES (:name, :email, :phone)");
            $req->execute([
                ':name' => $name,
                ':email' => $email,
                ':phone' => $phone
            ]);

            $message = "Contact added successfully!";
        } catch (PDOException $e) {
            $message = "Error adding contact: " . $e->getMessage();
        }
    } else {
        $message = "Please fill in all fields.";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container py-4">
    <!-- Display messages -->
    <?php if ($message): ?>
        <div class="alert alert-info">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <!-- Contact addition form -->
    <div class="container-fluid py-5">
        <h2 class="mb-3">Ajouter un contact</h2>
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
            </div>
            <button type="submit" class="btn btn-outline-secondary btn-sm">Ajouter</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
