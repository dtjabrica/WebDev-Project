<?php
include 'connection.php';
?>
<!-- Bootstrap Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="login.php">ICpEP.se - NCR Membership</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <!-- Add the Logout button here -->
                <a class="nav-link" href="admin-logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Approval</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add your CSS styles for the modal here */
        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            z-index: 1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Pending User Register</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    $query = "SELECT * FROM tbl_users WHERE status = 'pending' ORDER BY id ASC";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email_address']; ?></td>
                            <td>
                                <form action="admin-approval.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                    <input type="submit" name="approve" value="Approve" class="btn btn-success" />
                                    <input type="submit" name="deny" value="Deny" class="btn btn-danger" />
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <h1>Approved User Register</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    $query = "SELECT * FROM tbl_users WHERE status = 'approved' ORDER BY id ASC";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email_address']; ?></td>
                            <td>
                                <form action="admin-approval.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                    <input type="submit" name="delete" value="Delete" class="btn btn-danger" />
                                    <button type="button" onclick="openEditModal('<?php echo $row['id']; ?>', '<?php echo $row['email_address']; ?>')" class="btn btn-primary">Edit</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    if (isset($_POST['deny'])) {
                        $id = $_POST['id'];
                        $deleteQuery = "DELETE FROM tbl_users WHERE id = '$id'";
                        mysqli_query($conn, $deleteQuery);
                        echo '<script type="text/javascript">';
                        echo 'alert("User Denied!");';
                        echo 'window.location.href = "admin-approval.php";';
                        echo '</script>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
<div id="editModal" class="modal">
    <div class="container">
        <h2>Edit User Information</h2>
        <form action="admin-approval.php" method="POST">
            <input type="hidden" id="editUserId" name="id" value="" />
            <div class="form-group">
                <label for="new_email">New Email Address:</label>
                <input type="email" id="new_email" name="new_email" required class="form-control" />
            </div>
            <div class="form-group">
                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required class="form-control" />
            </div>
            <input type="submit" name="update_info" value="Update Information" class="btn btn-primary" />
            <button type="button" onclick="closeEditModal()" class="btn btn-secondary">Close</button>
        </form>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function openEditModal(userId, currentEmail) {
            document.getElementById('editUserId').value = userId;
            document.getElementById('new_email').value = currentEmail;
            document.getElementById('editModal').style.display = 'block';
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }
    </script>

    <?php
    // Handle approval
    if (isset($_POST['approve'])) {
        $id = $_POST['id'];
        $updateQuery = "UPDATE tbl_users SET status = 'approved' WHERE id = '$id'";
        $result = mysqli_query($conn, $updateQuery);
        echo '<script type="text/javascript">';
        echo 'alert("User Approved!");';
        echo 'window.location.href = "admin-approval.php";';
        echo '</script>';
    }

    // Handle denial
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $deleteQuery = "DELETE FROM tbl_users WHERE id = '$id'";
        mysqli_query($conn, $deleteQuery);
        echo '<script type="text/javascript">';
        echo 'alert("User Delete!");';
        echo 'window.location.href = "admin-approval.php";';
        echo '</script>';
    }

    // Handle email and password update
if (isset($_POST['update_info'])) {
    $id = $_POST['id'];
    $newEmail = $_POST['new_email'];
    $newPassword = $_POST['new_password'];

    $updateInfoQuery = "UPDATE tbl_users SET email_address = '$newEmail', password = '$newPassword' WHERE id = '$id'";
    $result = mysqli_query($conn, $updateInfoQuery);

    if (!$result) {
        die('Error updating user information: ' . mysqli_error($conn));
    }

    echo '<script type="text/javascript">';
    echo 'alert("User Information Updated!");';
    echo 'window.location.href = "admin-approval.php";';
    echo '</script>';
}
    ?>
</body>
</html>
