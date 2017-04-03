<div class="content">

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <div class="login-default-box">
        <h1>Login</h1>
        <form action="<?php echo URL; ?>login/login" method="post">
                <label> Usuário: </label>
                <input type="text" name="user_name" required />
                <label> Senha: </label>
                <input type="password" name="user_password" required />
                <input type="checkbox" name="user_rememberme" class="remember-me-checkbox" />
                <label class="remember-me-label">Manter logado (prazo de 2 semanas)</label>
                <input type="submit" class="login-submit-button" />
        </form>
        <a href="<?php echo URL; ?>login/register">Registrar</a>
        |
        <a href="<?php echo URL; ?>login/requestpasswordreset">Esqueci minha senha</a>
    </div>

</div>
