<?php include "includes/header.php"; ?>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <h3 class="text-center">Login</h3>
            <form action="actions/login.php" method="POST">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                <p class="text-center mt-3">
                    <a href="register.php">Criar uma conta</a>
                </p>
            </form>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>
