<div class="content">    
    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>
    <?php require VIEWS_PATH . '_templates/leftmenu.php'; ?>
    <div class = "main">   
      <div class = "textarea">
        <center><i>        
          <?php echo '(OBI'       . $this->problem_data->problem_year 
                     . ', Nível ' . $this->problem_data->problem_level
                     . ', Fase '  . $this->problem_data->problem_phase . ')';
          ?>
        </i></center>
        <h1 align="center"> <?php echo $this->problem_data->problem_name ?> </h1>
    	<?php
          $file_path = PROBLEMS_PATH . $this->problem_id . '/statement.php';  
          if (file_exists($file_path)) {
       	    include $file_path;
          }    	  
    	?>
      </div>
    </div>
    
</div>
