<div class="content">    
    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>
    <?php require VIEWS_PATH . '_templates/leftmenu.php'; ?>
    <?php 
      $file_path = PROBLEMS_PATH . $this->problem_id . '/index.php';   
       if (file_exists($file_path)) {
         echo '<div style="float: left; width: 700px;  margin-left: 120px; padding-left: 10px; padding-right:10px; ">'; 
         include $file_path; 
         echo '</div>';
       } else {
         $address = "http://www.ic.unicamp.br/~maratona/obi/index.php?n=Problemas." . $this->problem_id;
         echo '
          <div class = "main">
            <div class = "textarea">
                Os editoriais de cada problema ainda estão em construção, caso deseje ajudar entre em contato com lucastdcj [at] gmail [dot] com e edite o seguinte artigo:
              <h1 align="center">
                <a href = ' . $address . '> Editorial </a>
              </h1>
          </div>
      </div>    ';
      }?>


</div>
