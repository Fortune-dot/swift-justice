<?php 

//home.php

session_start();

if(!isset($_SESSION['user_session_id']))
{
    header('location:index.php');
}

?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>How to stop Multiple Logins from the same user in PHP</title>
    </head>
    <body>

        <div class="container">
            <h1 class="mt-5 mb-5 text-center text-primary">How to stop Multiple Logins from the same user in PHP</h1>
            
            <h2>Welcome User</h2>
            <p><a href="logout.php">Logout</a></p>
            <?php 
            echo '<pre>';
            print_r($_SESSION);
            echo '</pre>';
            ?>
        </div>
    </body>
</html>

<script>

function check_session_id()
{
    var session_id = "<?php echo $_SESSION['user_session_id']; ?>";

    fetch('check_login.php').then(function(response){

        return response.json();

    }).then(function(responseData){

        if(responseData.output == 'logout')
        {
            window.location.href = 'logout.php';
        }

    });
}

setInterval(function(){

    check_session_id();
    
}, 10000);

</script>