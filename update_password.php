<html>
    <head>
        <title>Update Password</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet">
        <!-- import index.css -->
        <link rel="stylesheet" href="index.css">
    </head>
    <body>

        <form style="display: flex;
    flex-direction: column;
    gap: 1rem; 
    justify-content: center;
    align-items: start;"
    action="update_password_results.php"
    method="post">
            <h1>Update Password</h1>
            
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Username">
            <label for="old_password">Old Password</label>
            <input type="text" name="old_password" id="old_password" placeholder="Old Password">
            <label for="new_password">New Password</label>
            <input type="text" name="new_password" id="new_password" placeholder="New Password">
            <button type="submit">Change Password</button>
        </form>
    </body>

</html>