<div class="content">
    <h1>Altere o seu usuário</h1>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <form action="<?php echo URL; ?>login/editusername_action" method="post">
        <label>Novo Usuário: </label>
        <input type="text" name="user_name" required />
        <input type="submit" value="Submeter" />
    </form>
</div>
