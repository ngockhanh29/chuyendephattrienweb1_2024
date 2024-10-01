<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; // Add new user
$_id = NULL;

if (!empty($_GET['id'])) { 
    $_id = $_GET['id']; 
    $user = $userModel->findUserById($_id);
}
$errorMessages = [];

// //cau2
// if (!empty($_GET['id'])) {
//     $encodedId = $_GET['id'];
//     $_id = decodeUserId($encodedId);

//     if ($_id === null || !is_numeric($_id)) {
//         die('Invalid user ID');
//     }
//     $user = $userModel->findUserById($_id);
// }
// function encodeUserId($id) {
//     $secret = 'khanhh';
//     return base64_encode($id . '|' . $secret); 
// }

// function decodeUserId($encodedId) {
//     $decoded = base64_decode($encodedId);
//     if ($decoded === false) {
//         return null;
//     }
//     $parts = explode('|', $decoded);
//     if (count($parts) === 2) {
//         list($id, $secret) = $parts;
        
//         if ($secret === 'khanhh') { 
//             return $id;
//         }
//     }
//     return null;
// }
// if (!empty($_id)) {
//     $encodedId = encodeUserId($_id);
//     //echo "http://localhost:80/security/form_user.php?id=".$encodedId; // Đường dẫn mã hóa
// }

//Cau 3
function validateName($name) {
    if (empty($name)) return 'Name is required.';
    if (preg_match('/^[A-Za-z0-9]{5,15}$/', $name) !== 1) {
        return 'Name must be 5-15 characters long and can only include A-Z, a-z, 0-9.';
    }
    return true;
}
function validatePassword($password) {
    if (empty($password)) return 'Password is required.';
    if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[~!@#$%^&*()]).{5,10}$/', $password) !== 1) {
        return 'Password must be 5-10 characters long, and include at least one lowercase letter, one uppercase letter, one number, and one special character.';
    }
    return true;
}
if (!empty($_POST['submit'])) {
    $nameValidation = validateName($_POST['name']);
    if ($nameValidation !== true) {
        $errorMessages[] = $nameValidation;
    }

    $passwordValidation = validatePassword($_POST['password']);
    if ($passwordValidation !== true) {
        $errorMessages[] = $passwordValidation;
    }

    if (empty($errorMessages)) {
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $_POST['id'] = $_id;

        if (!empty($_id)) {
            $result = $userModel->updateUser($_POST);
            if ($result) {
                header('location: list_users.php');
                exit();
            } else {
                $errorMessages[] = 'Failed to update user. Please try again.';
            }
        } else {
            $userModel->insertUser($_POST);
            header('location: list_users.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
    <?php include 'views/header.php'?>
    <div class="container">

        <?php if ($user || !isset($_id)) { ?>
            <div class="alert alert-warning" role="alert">
                User form
            </div>
            <form method="POST">
            <input type="hidden" name="id" value='<?php echo htmlspecialchars($user['id'] ?? ''); ?>'> <!-- ID người dùng -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name" value='<?php echo htmlspecialchars($user['name'] ?? ''); ?>' required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <?php if (!empty($errorMessages)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php foreach ($errorMessages as $message) {
                            echo htmlspecialchars($message) . '<br>';
                        } ?>
                    </div>
                <?php } ?>
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
        <?php } else { ?>
            <div class="alert alert-success" role="alert">
                User not found!
            </div>
        <?php } ?>
    </div>
</body>
</html>
