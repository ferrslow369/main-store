<?php
    /*Use this URL to print data in browser
    http://127.0.0.1/main-store/src/list_users.php
    */

    include('../settings/database.php');

    //Get data from users table
    $sql="  
        SELECT	
            id,
            firstname || ' ' || lastname as fullname,
            email,
            mobile_phone,
            status,
            case when status = true then 'Active' else 'Inactive' end as status,
            url_photo
        FROM
            users
        ORDER BY id
    ";
    $res = pg_query($local_conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Store - List Users</title>
    <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>
</head>
    <body>
        <table class="table table-striped">
            <tr>
                <th>photo</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>Mobile phone</th>
                <th>Status</th>
                <th>options</th>
            </tr>
            <?php while($row =pg_fetch_assoc($res)) {?>
                <tr>
                    <!-- Here print data from database -->
                    <td>    
                        <img src="<?= $row['url_photo']?>" width="40" alt="User photo profile">
                    </td>
                    <td><?= $row['fullname']?></td>
                    <td><?= $row['email']?></td>
                    <td><?= $row['mobile_phone']?></td>
                    <td><?= $row['status']?></td>
                    <td >
                        <!-- edit user -->
                        <a href= "update_user.php?userID=<?$row['id']?>"> 
                            <img src = "icons/pencil.png" alt="Edit user" width = "20">
                        </a>
                        <!-- search user -->
                        <a href= "#">
                            <img src = "icons/search.png" alt="Search user" width = "20">
                        </a>
                        <!-- delete user -->
                        <a href= "delete_user.php.?userID=<?= $row['id']?>">
                            <img src = "icons/trash.png" alt="Delete user" width = "20">
                        </a>
                    </td>
                </tr>
            <?php } ?>
        <table>
    </body>
</html>
