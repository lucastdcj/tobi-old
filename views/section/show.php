<div class="content">
    
    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>
    <?php require VIEWS_PATH . '_templates/leftmenu.php'; ?>
    <div class = "main">
      <div class = "textarea">
    	<?php
    	  include SECTIONS_PATH . $this->section_id . '/index.php';    	  
    	?>
      </div>
    </div>    
</div>
