<div class="content">

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <div class="register-default-box">
        <h1>Registrar</h1>
        <!-- register form -->
        <form method="post" action="<?php echo URL; ?>login/register_action" name="registerform">
            <!-- the user name input field uses a HTML5 pattern check -->
            <label for="login_input_username">
                Usuário:
                <span style="display: block; font-size: 14px; color: #999;">Apenas letras e números (De 2 à 64 caracteres)</span>
            </label>
            <input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
            <!-- the email input field uses a HTML5 email type check -->
            <label for="login_input_email">
                E-mail:
            </label>
            <input id="login_input_email" class="login_input" type="email" name="user_email" required />
            <label for="login_input_password_new">
                Senha:
                <span class="login-form-password-pattern-reminder">
                  (Mínimo 6 caracteres)
                </span>
            </label>
            <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
            <label for="login_input_password_repeat">Confirme a senha: </label>
            <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
            <!-- show the captcha by calling the login/showCaptcha-method in the src attribute of the img tag -->
            <!-- to avoid weird with-slash-without-slash issues: simply always use the URL constant here -->
            <img id="captcha" src="<?php echo URL; ?>login/showCaptcha" />
            <span style="display: block; font-size: 11px; color: #999; margin-bottom: 10px">
                <!-- quick & dirty captcha reloader -->
                <a href="#" onclick="document.getElementById('captcha').src = '<?php echo URL; ?>login/showCaptcha?' + Math.random(); return false">[ Outro Captcha ]</a>
            </span>
            <label>
                Entre com o texto do captcha:
            </label>
            <input type="text" name="captcha" required />
            <input type="submit"  name="register" value="Registrar" />

        </form>
    </div>

</div>
