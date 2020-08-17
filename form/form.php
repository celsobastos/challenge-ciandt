<?php
    session_start();
    $_SESSION['token'] = md5(time());
    $_SESSION['alert'] = $_SESSION['alert'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <title>Location</title>
    </head>
    <body>
        <header>
        </header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="../location.php"> Atividade 1 </a>
            <a class="navbar-brand" href="../joaozinho.php"> Atividade 2</a>
            <a class="navbar-brand" href="../files.php">Atividade 3</a>
            <a class="navbar-brand" href="form.php">Atividade 4</a>
            <a class="navbar-brand" href="../xml/parsexml.php"> Atividade 5</a>
            <a class="navbar-brand" href="../formselectfield.php">Atividade 6</a>
            <a class="navbar-brand" href="../apirest.php">Atividade 7</a>
        </nav>
        <section class="container p-3 my-3 text-center">
            <div class="container">
                <h2>Form</h2>
                <p>Create Login</p>
            </div>
            <div class="container w-50">
                <?php if (!empty($_SESSION['alert'])): ?>
                    <?=$_SESSION['alert']?>
                <?php endif; ?>
                <form action="controller.php" method="post" novalidate>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" name="nome" id="inputName" placeholder="Nome" required />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sobrenome">Sobrenome</label>
                            <input type="text" class="form-control" name="sobrenome" id="inputLastName"
                                placeholder="Sobrenome" required />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email" required />
                            <small id="emailHelp" class="form-text text-muted">Required a valid email</small>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="telefone">Telefone</label>
                            <input type="tel" maxlength="15" class="form-control" name="telefone" id="inputTelefone"
                                placeholder="Telefone" required />
                            <small id="phoneHelp" class="form-text text-muted">(99) 99999-9999</small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputLogin">Login</label>
                            <input type="text" class="form-control" name="login" id="inputLogin" placeholder="Login" required />
                            <small id="passHelp" class="form-text text-muted">The Login must be between 5 and 20 characters</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <input type="password" class="form-control" name="password" id="inputPassword4"
                                placeholder="Password" required/>
                            <small id="passHelp" class="form-text text-muted">The password must be between 6 and 8 characters</small>
                                
                        </div>
                        <div class="form-group col-md-12">
                            <input type="hidden" class="form-control" name="token" value="<?=$_SESSION['token']?>" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Form</button>
                </form>
            </div>
        </section>
    </body>
</html>