<div class="content">
  <!-- echo out the system feedback (error and success messages) -->  
  <?php require VIEWS_PATH . '_templates/leftmenu.php'; ?>
  <div class = "main">
    <div class = "textarea">
      <?php $this->renderFeedbackMessages(); ?>     
      <h1 align="center"> Hora da verdade! </h1>
      <form action="<?php echo URL; ?>submit/test_code/<?php echo $this->section_id . '/' . $this->problem_id ?>"
        method="POST" enctype="multipart/form-data">
        <h2> Linguagem: </h2>
        <select name="language" size="1">
          <option value="0" selected>Selecione... </option>
          <option value="1">C</option>
          <option value="2">C++</option>
          <option value="3">Pascal</option>
          <option value="4">Python</option>
         <option value="5">Java</option>
        </select>
        <h2> Código:</h2>
        <textarea rows="20" cols="70" name="code_source" style="width: 600px"></textarea>        
        <br/>
        Obs: Para programas em Java, utilize "solucao" como nome da classe principal.
        <input type="hidden" name="problem_id" value="<?php echo $this->problem_id?>">
        <p align="center">          
          <input type="submit" name="submit" value="Submeter">
        </p>
      </form>
    </div>
  </div>
</div>