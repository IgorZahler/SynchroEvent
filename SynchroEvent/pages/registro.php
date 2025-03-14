<?php include "includes/header.php"; ?>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <h3 class="text-center">Criar Conta</h3>
            <form action="actions/register.php" method="POST">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Tipo de Conta</label>
                    <select name="type" class="form-control">
                        <option value="organizer">Organizador</option>
                        <option value="participant">Participante</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success btn-block">Registrar</button>
                <p class="text-center mt-3">
                    <a href="login.php">Já tem uma conta? Faça login</a>
                </p>
            </form>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>
