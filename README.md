# TP  - Contact Manager

## Objectifs 

Développer une petite application web pour gérer une liste de contacts. On doit pouvoir
ajouter, consulter, modifier et supprimer des contacts via une interface web.

## Structure du projet

1. Création d'un dossier nommé `gestion_contacts`.
2. Création de 8 fichiers dans ce dossier :
   - `index.php` : page principale qui affiche la liste des contacts, un bouton renvoyant vers la page add_contact.php, un bouton renvoyant vers la page edit_contact.php et un bouton pour supprimer un contact via son ID.
    - `header.php` : fichier d’en-tête inclus dans toutes les pages.
    - `footer.php` : fichier de pied de page inclus dans toutes les pages.
    - `db.php` : fichier contenant les informations pour se connecter à ma base de donnée.
    - `add_contact.php` : fichier contenant un formulaire pour ajouter un contact.
    - `edit_contact.php` : fichier contenant un formulaire des informations d'un contact que l'on souhaiterait modifier.
    - `delete_contact.php` : fichier contenant les informations pour supprimer un contact via son ID.
    - `functions.php` : fichier contenant les 4  fonctionnalités CRUD.

## Contenu des Fichiers

  - **header.php**  
  L'en-tête de page affiche :
    - Une barre contenant un logo (SVG) suivi du texte Contact Manager, cliquable et dirigeant vers /gestion_contacts (page d'accueil de mon site).

  Jumbotron : 
    - Une grande bannière avec un fond doux, des coins arrondis, et un message d'accueil "Site made by Owen Iluobe" suivi d'une courte description  

```php
<!-- Header -->
<header class="pb-3 mb-4 border-bottom">
    <a href="/gestion_contacts" class="d-flex align-items-center text-body-emphasis text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img">
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"
                  fill="currentColor"></path>
        </svg>
        <span class="fs-4">Contact Manager</span>
    </a>
</header><!--./End  of Header-->

<!-- Jumbotron -->
<div class="p-5 mb-4 bg-body-tertiary rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Site made by Owen Iluobe</h1>
        <p class="col-md-8 fs-4">Welcome to my website !!!</p>
    </div>
</div><!--./End of Jumbotron-->
  ```

- **footer.php**
 
```php
<!-- Footer -->
<div class="p-2 mb-4 bg-body-tertiary rounded-3">
    <div class="container-fluid p-2">
        <p class="d-flex justify-content-center align-items-center"> &copy; <?= date('Y'); ?> by Owen Iluobe
        </p>
        <p class="d-flex justify-content-center align-items-center">
        <a href="https://github.com/Owenews/gestion_contacts.git">Link to the project on my GitHub</a>.
        </p>
    </div>
</div><!--./End of Footer-->
```
 Le pied de page affiche une ligne centrée indiquant l’année courante et le propriétaire du site mais aussi une ligne centrée contenant un lien cliquable pointant vers le projet GitHub.

- **db.php**

```php
function connectDB()
```

La fonction `connectDB` est utilisée pour créer et retourner une connexion PDO à une base de données.

      
```php
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
```
Cette partie du code sert à : 
    - PDO::ATTR_ERRMODE : Définit le mode de gestion des erreurs. Ici, PDO::ERRMODE_EXCEPTION lance des exceptions en cas d'erreur, ce qui permet de mieux les gérer.
    - PDO::ATTR_DEFAULT_FETCH_MODE : Définit le mode de récupération par défaut des résultats. Ici, PDO::FETCH_ASSOC retourne les résultats sous forme de tableaux associatifs, où les colonnes de la table deviennent les clés.

- **index.php**
  Ce fichier inclut header.php, functions.php, footer.php et traite le formulaire :
    - `<h2>` : Balise pour un titre de niveau 2.
    - `class="mb-4"` : Ajoute une marge inférieure à l'élément pour espacer visuellement le titre du tableau (grâce à Bootstrap).
    - `<table>` : Crée un tableau HTML.
    - `class="table table-bordered"` : Utilise les classes Bootstrap :
    - `table-bordered` : Ajoute des bordures autour des cellules.
    - `<thead>` : Contient l'en-tête du tableau.
    - `"#"` : Identifiant unique du contact.
    -  `"Name, Email, Phone"` : Affichent respectivement le nom, l'email, et le numéro de téléphone.
    -  `"Actions"` : Contient des boutons pour interagir avec chaque contact.
  
Voici le code `index.php` en entier : 
```php
<?phprequire_once 'functions.php';
$contacts = getContacts();?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact List - Contact Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container py-4">
    <?php require_once 'header.php'; ?>


    <h2 class="mb-4">Contact List</h2>

    <!-- Contact table -->
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($contacts)): ?>
            <?php foreach ($contacts as $contact): ?>
                <tr>
                    <td><?php echo htmlspecialchars($contact['id']); ?></td>
                    <td><?php echo htmlspecialchars($contact['name']); ?></td>
                    <td><?php echo htmlspecialchars($contact['email']); ?></td>
                    <td><?php echo htmlspecialchars($contact['phone']); ?></td>
                    <td>
                        <a href="edit_contact.php?id=<?php echo $contact['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="delete_contact.php?id=<?php echo $contact['id']; ?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Are you sure you want to delete this contact?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="text-center">No contacts found.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    <a href="add_contact.php" class="btn btn-primary">Add New Contact</a>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
<?php require_once 'footer.php'; ?>
</html>
 ```
    ```php
    <?php if (!empty($contacts)): ?>
    ```
 Vérifie si la liste $contacts contient des données.
Si elle est vide, le tableau affichera un message indiquant qu'aucun contact n'est disponible.

  - `foreach` : Parcourt chaque contact dans la liste des `$contacts`.
  - `htmlspecialchars()` : Protège contre les failles XSS en échappant les caractères spéciaux des données.
  - La fonction `confirm()` : Affiche une boîte de dialogue pour confirmer la suppression.

Le tableau contient aussi des boutons permettant de modifier et supprimer un contact.
  - `btn btn-sm btn-warning` : Ajoute un petit bouton jaune.
  - `btn btn-sm btn-danger` : Ajoute un petit bouton jaune.

Enfin, nous avons aussi la possibilité d'ajouter un nouveau contact via le bouton `Add New Contact`
  - `btn btn-primary` : Crée un bouton jaune.

- **add_contact.php**
  Ce fichier inclut function.php qui contient la fonction `addContact()` pour enregistrer un contact dans la base de données :
    `$name = $email = $phone = ''; $errors = [];;` : Variables pour stocker les données du formulaire.
    `$errors` est un tableau pour collecter les erreurs de validation.
    `($_SERVER["REQUEST_METHOD"] == "POST")` : Exécute le code de traitement du formulaire uniquement lorsque la méthode utilisée est POST.
  
```php
if (empty($name)) {
    $errors['name'] = "Name is required.";
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "A valid email is required.";
}
if (empty($phone) || !preg_match('/^[0-9+\-\s]*$/', $phone)) {
    $errors['phone'] = "A valid phone number is required.";
}
```
  Vérifie si :
    - Le champ Nom est rempli.
    - Le champ Email est valide à l'aide de FILTER_VALIDATE_EMAIL.
    - Le champ Téléphone contient uniquement des chiffres, espaces, +, ou - via une expression régulière.

 ```php
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
```
  Si des erreurs existent, elles sont affichées sous forme de liste dans une alerte rouge.

 `<div class="invalid-feedback">` : Chaque champ affiche une erreur spécifique avec la classe invalid-feedback si nécessaire.



Voici le code `add_contact.php`en entier :
  
```php
<?php
require_once 'functions.php';

// Initialize variables
$name = $email = $phone = '';
$errors = []; // Array to store validation errors

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des valeurs du formulaire
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    // Field validation
    if (empty($name)) {
        $errors['name'] = "Name is required.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "A valid email is required.";
    }
    if (empty($phone) || !preg_match('/^[0-9+\-\s]*$/', $phone)) {
        $errors['phone'] = "A valid phone number is required.";
    }

    // Si aucune erreur, ajout du contact
    if (empty($errors)) {
        addContact($name, $email, $phone);
        header("Location: index.php?message=Contact added successfully!");
        exit;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add a contact - Contact Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container py-4">
    <div class="container-fluid py-5">
        <h2 class="mb-3">Add a contact</h2>

        <!-- Affichage des erreurs globales -->
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>"
                       id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">
                <!-- Message d'erreur pour le champ name -->
                <?php if (isset($errors['name'])): ?>
                    <div class="invalid-feedback">
                        <?php echo htmlspecialchars($errors['name']); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>"
                       id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                <!-- Message d'erreur pour le champ email -->
                <?php if (isset($errors['email'])): ?>
                    <div class="invalid-feedback">
                        <?php echo htmlspecialchars($errors['email']); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control <?php echo isset($errors['phone']) ? 'is-invalid' : ''; ?>"
                       id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
                <!-- Message d'erreur pour le champ phone -->
                <?php if (isset($errors['phone'])): ?>
                    <div class="invalid-feedback">
                        <?php echo htmlspecialchars($errors['phone']); ?>
                    </div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-outline-secondary btn-sm">Add Contact</button>
            <a href="index.php" class="btn btn-sm btn-danger">Back to Contacts</a>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
```


- **delete_contact.php**
```php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Convert to integer for safety
```
Cela sert à :

		Utiliser `isset($_GET['id'])` pour s'assurer que l'ID est fourni via l'URL.
		Vérifier que l'ID est un nombre avec `is_numeric($_GET['id'])`.
		Convertir l'ID en entier avec `intval()` pour éviter les injections malveillantes ou erreurs dues à des types incorrects.

	
```php
if ($id) {
    deleteContact($id);
```
Si l'ID est valide, la fonction `deleteContact($id)` est appelée pour supprimer le contact correspondant de la base de données.

```php
header("Location: index.php?message=Contact deleted successfully!");
exit;
```
Une fois l'utilisateur supprimé, l'utilisateur est redirigé vers la page principale (index.php) à l'aide de la fonction `header()` et un message s'affiche dans l'URL.

Voici le code `delete_contact.php`en entier : 
```php
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
```


- **edit_contact.php**
```php
try {
    $pdo = connectDB(); // Connexion à la base de données
    $stmt = $pdo->prepare("SELECT * FROM contacts WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $contact = $stmt->fetch();

```
Cette partie du code permet de :
	- `connectDB()` : Fonction utilisée pour établir la connexion à la base de données (cette fonction est définie dans votre fichier functions.php). Elle renvoie un objet PDO qui permet d'exécuter des requêtes SQL.
  - Requête SQL préparée : La requête SQL utilise un paramètre `:id` pour éviter les injections SQL. La méthode preparé prépare la requête pour exécution, et execute lie l'ID et exécute la requête pour récupérer le contact correspondant.
  - `$contact = $stmt->fetch()` : Récupère le résultat de la requête sous forme de tableau associatif. Si le contact est trouvé, ses informations sont stockées dans $contact.

```
if ($contact) {
    $name = $contact['name'];
    $email = $contact['email'];
    $phone = $contact['phone'];
} else {
    $message = "Contact not found.";
}
```
Si un contact est trouvé, ses informations sont stockées dans les variables correspondantes, qui sont utilisées pour pré-remplir le formulaire. Sinon, un message d'erreur est défini.

```
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    
    if (!empty($name) && !empty($email) && !empty($phone)) {
        updateContact($id, $name, $email, $phone);
        header("Location: index.php?message=Contact modified successfully!");
        exit;
    }
}
```
Cette partie du code :
	- Vérification de la méthode HTTP : La vérification `$_SERVER["REQUEST_METHOD"] == "POST"` permet de savoir si le formulaire a été soumis.
  - Récupération des données du formulaire : Les valeurs des champs du formulaire sont récupérées via $_POST, puis nettoyées avec trim() pour supprimer les 
espaces inutiles.
  - Validation : Avant de mettre à jour le contact, il est vérifié que tous les champs sont remplis. Si un champ est vide, aucune mise à jour n'est effectuée.
  - Mise à jour du contact : Si les champs sont valides, la fonction `updateContact()` est appelée pour effectuer la mise à jour dans la base de données. Ensuite, l'utilisateur est redirigé vers la page principale avec un message de succès.


```php
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
    <button type="submit" class="btn btn-outline-secondary btn-sm">Update</button>
    <a href="index.php" class="btn btn-sm btn-danger">Back to Contacts</a>
</form>

```
Le formulaire permet à l'utilisateur de modifier les informations du contact. Les champs sont pré-remplis avec les données actuelles du contact, et les valeurs sont sécurisées avec `htmlspecialchars()` pour éviter les attaques XSS.

Voici le code `edit_contact` en entier :
```php
<?php
require_once 'functions.php';

// Initialize variables
$name = $email = $phone = '';
$message = '';

// Check if an ID is provided
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    try {
        // Connect to the database
        $pdo = connectDB();

        // Fetch the contact details
        $stmt = $pdo->prepare("SELECT * FROM contacts WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $contact = $stmt->fetch();

        if ($contact) {
            $name = $contact['name'];
            $email = $contact['email'];
            $phone = $contact['phone'];
        } else {
            $message = "Contact not found.";
        }
    } catch (PDOException $e) {
        $message = "Error fetching contact: " . $e->getMessage();
    }
} else {
    $message = "No contact ID provided.";
}

// Handle the update form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    // Basic field validation
    if (!empty($name) && !empty($email) && !empty($phone)) {
        updateContact($id, $name, $email, $phone);

        header("Location: index.php?message=Contact modified successfully!");
        exit;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Contact</title>
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

    <?php if (isset($contact) && $contact): ?>
        <!-- Contact edit form -->
        <div class="container-fluid py-5">
            <h2 class="mb-3">Edit Contact</h2>
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
                <button type="submit" class="btn btn-outline-secondary btn-sm">Update</button>
                <a href="index.php" class="btn btn-sm btn-danger">Back to Contacts</a>
            </form>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
```


- **functions.php**

```php
// Function to add a contact
function addContact($name, $email, $phone){

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
```
Cette fonction `updateContact($id, $name, $email, $phone)` permet de mettre à jour un contact existant en fonction de son ID.



```php
// Function to retrieve a contact order by ID ASC
function getContacts() {
    try {
        $pdo = connectDB();
        $req = $pdo->prepare("SELECT * FROM contacts ORDER BY id ASC");
        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return [];
    }
}
```
Cette fonction `addContact($name, $email, $phone)` permet d'ajouter un nouveau contact à la base de données.



```php
function updateContact($id, $name, $email, $phone) {
    try {
        $pdo = connectDB();

        $req = $pdo->prepare("UPDATE contacts SET name = :name, email = :email, phone = :phone WHERE id = :id");
        $req->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':id' => $id
        ]);

        return "Contact updated successfully!";
    } catch (PDOException $e) {
        return "Error updating contact: " . $e->getMessage();
    }
}
```
Cette fonction `getContacts()` récupère tous les contacts de la base de données, triés par ID croissant.



```php
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
```
Cette fonction `deleteContact($id)` permet de supprimer un contact de la base de données selon son ID.


Voici le code `functions.php`en entier : 
```php
<?php
require_once 'db.php';

// Function to add a contact
function addContact($name, $email, $phone){

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

// Function to retrieve a contact order by ID ASC
function getContacts() {
    try {
        $pdo = connectDB();
        $req = $pdo->prepare("SELECT * FROM contacts ORDER BY id ASC");
        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return [];
    }
}

function updateContact($id, $name, $email, $phone) {
    try {
        $pdo = connectDB();

        $req = $pdo->prepare("UPDATE contacts SET name = :name, email = :email, phone = :phone WHERE id = :id");
        $req->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':id' => $id
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
```

Grâce à ce fichier, il n'y a plus besoin d'appeler le base de donnée dans chaque fichier car les requête SQL préparées se trouvent dans ce fichier.


## Organisation
Pour une meilleure organisation, j'ai écris tous mes commentaire, fonctionnalités, formulaire en anglais.
J'ai aussi réalisé beaucoup de commit pour voir l'avancement du TP. 
Tous mes commit ont été fait en anglais.
J'ai créer une branche `develop` ou j'ai  pu tester le code avant de le merger sur ma branche `main`


## Capture d'écran

Voici l'interface utilisateur que l'on peut voir ci-dessous :

Interface contact :
![Interface index php](https://github.com/user-attachments/assets/8543cf86-1ce4-4933-92cd-c4f1b7a5358e)

Interface ajout contact
![Interface add_contact php](https://github.com/user-attachments/assets/64025cd7-64c1-4215-bc8d-59df1b28b81a)

Interface edit contact
![Interface edit php](https://github.com/user-attachments/assets/492addb7-c7c0-4467-a502-39397d525f27)

Pour la suppréssion, lorsqu'on cliquera sur `Delete`, il y aura un message de vérification pour être sûr que l'on veut vraiment supprimé ce contact.
![Message de suppession](https://github.com/user-attachments/assets/6c9e2192-effc-4509-b705-2f39c2c6b599)


  




  
