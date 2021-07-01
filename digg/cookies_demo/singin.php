<?php
session_start();
require_once 'app/helpers.php';
require_once 'app/db_config.php';
$page_title = 'Sign In';
$errors = ['email'=>'','password'=>'',];
//if client press on submit button
if(isset($_POST['submit'])){

    $email = !empty($_POST['email']) ? trim($_POST['email']) : '';
    $password = !empty($_POST['password']) ? trim($_POST['password']) : '';
    $form_valid = true;

    if(! $email){

        $errors['email'] = 'A valid email is required';
        $form_valid = false;

    }   

    if(!$password || strlen($password) <6 || strlen($password)>20){
        $errors['password'] = 'Please fill your password';
        $form_valid = false;
    }

    if($form_valid){

    $link = mysqli_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PWD, MYSQL_DB);
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($link,$sql);

        if($result && mysqli_num_rows($result) > 0){
            
            $user = mysqli_fetch_assoc($result);
            //print_r($user);
        }else{
            $errors['password'] = 'Wrong email or password';
        }
        
    }

}
?>


<?php include ('tpl/header.php'); ?>

<main class="min-h-900">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 mt-3">Sign in to your account</h1>
                <p>Fill your details below and sign in.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <form action="" method="POST" autocomplete="off" novalidate="novalidate">
                    <div class="mb-3">
                        <label for="email">* Email</label>
                        <input value="<?= old('email'); ?>" type="email" name="email" id="email" class="form-control">
                        <div class="text-danger"><?= $errors['email'];?> </div>
                    </div>
                    <div class="mb-3">
                        <label for="password">* Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        <div class="text-danger"><?= $errors['password'];?> </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include ('tpl/footer.php'); ?>