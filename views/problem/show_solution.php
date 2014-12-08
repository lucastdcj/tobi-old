<div class="content">    
    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>
    <?php require VIEWS_PATH . '_templates/leftmenu.php'; ?>
    <div class = "main">   
      <div class = "textarea">
       
        <h1 align="center">
        <a href = "http://www.ic.unicamp.br/~maratona/obi/index.php?n=Problemas.<?php echo $this->problem_id ?>">
          Link para o Editorial
        </a>
        </h1>    	
    	<!-- include PROBLEMS_PATH . $this->problem_id . '/solution.php'; -->
      </div>
    </div>
    
</div>
