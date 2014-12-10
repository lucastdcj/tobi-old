<div class="content">
    
    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>
    <?php require VIEWS_PATH . '_templates/leftmenu.php'; ?>
    <div class = "main">
      <div class = "textarea">
	Os editoriais de cada seção ainda estão em construção, ajude-nos editando o seguinte artigo: <br />
        <h1 align='center'>
          <a href = "http://www.ic.unicamp.br/~maratona/obi/index.php?n=Secao.<?php echo $this->section_id ?>"> Editorial </a>
        </h1>
      </div>
    </div>    
</div>
