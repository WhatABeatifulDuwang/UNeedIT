<!-- Gebruikt een layout component en geeft de paginatitel 'Account' door -->
<x-layout title="Account">
    <!-- Koptekst van de pagina -->
    <section class="container">
        <section class="error">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $errorTextTag = "<div></div>";
                $email = $_POST["email"];
                $password = $_POST["password"];
                $user[] = url('/accounts/');
                $checkedEmail = $user->email;

                if ($checkedEmail &&password_verify($password, $user['password'])) {
                    $userId = $user->id;
                    $_SESSION["user"]["id"] = $userId;
                    header("Location: home.blade.php");
                    exit();
                } else {
                    $errorTextTag = "<div style='color:red' id='errorTextTag'>There is no account like this in our records. Please re-check the password and username and try again</div>";
                    echo $errorTextTag;
                }
            }
            ?>
        </section>
        <section class="form">
            <form method="post">
                <input type="email" id="email" name="email" placeholder="Enter your email">
                <br>
                <input type="password" id="password" name="password" placeholder="Enter your password">
                <br>
                <input id="postButton" type="submit" value="Login" name="Submit">
            </form>
            <a href="forgot-password.php">I forgot my password</a>
            <section class="bottom">
                <p class="sign-up"> Don't have an account?<br>
                    <a href="{{url('/accounts/create')}}">Sign Up</a></p>
            </section>
            <section id="confirmationMessage"></section>
            <section id="errorTextTag"></section>
        </section>
    </section>
</x-layout>
