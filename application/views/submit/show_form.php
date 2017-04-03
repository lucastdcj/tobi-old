<div class="content">
  <!-- echo out the system feedback (error and success messages) -->  
  <?php require VIEWS_PATH . '_templates/leftmenu.php'; ?>
  <div class = "main">
    <div class = "textarea">
      <?php 
      	$this->renderFeedbackMessages();
      	$compilation_msg = Session::get('compilation_msg');
      	if (isset($compilation_msg)) {
      	  echo '<pre><code>' . $compilation_msg . '</code></pre>' ;
      	  Session::set('compilation_msg',null);
      	}      	
      	
      ?>     
      <h1 align="center"> Hora da verdade! </h1>
      <form action="<?php echo URL; ?>submit/test_code/<?php echo $this->section_id . '/' . $this->problem_id ?>"
        method="POST" enctype="multipart/form-data">
        <h2> Linguagem: </h2>
        <select name="language" size="1">
          <option value="0" selected>Selecione... </option>
          <option value="1">C</option>
          <option value="2">C++</option>
        </select>
        <h2> Código:</h2>
        <textarea  id ="code_source" name="code_source"></textarea>        
        <br/>

        Obs: Para programas em Java, utilize "solucao" como nome da classe principal.
        <input type="hidden" name="problem_id" value="<?php echo $this->problem_id?>">
        <p align="center">          
          <input type="submit" name="submit" value="Submeter">
        </p>
      </form>
      <script src="<?php echo URL; ?>public/codemirror/lib/codemirror.js"></script>
      <script src="<?php echo URL; ?>public/codemirror/mode/clike/clike.js"></script>
      <script src="<?php echo URL; ?>public/codemirror/addon/edit/matchbrackets.js"></script>

      <script>
        window.onload = function() {
          window.editor = CodeMirror.fromTextArea(code_source, {
            mode: "text/x-c++src",
            lineNumbers: true,
            matchBrackets: true
          });
        };
      </script> 
       
    </div>
  </div>
</div>
