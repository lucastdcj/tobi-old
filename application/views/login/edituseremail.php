<div class="content">
    <h1>Alteração de E-mail</h1>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <form action="<?php echo URL; ?>login/edituseremail_action" method="post">
        <label>Novo e-mail:</label>
        <input type="text" name="user_email" required />
        <input type="submit" value="Submeter" />
    </form>
</div>
