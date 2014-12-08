<?php

function convert_status($id) {
  switch($id) {
    case 0:
      return "Aceito";
    case 1:
      return "Código Grande";
    case 2:
      return "Erro de Compilação";
    case 3:
      return "Tempo de Limite Excedido";
    case 4:
      return "Memória Limite Excedida";
    case 5:
      return "Resposta Errada";
    case 6:
      return "Erro de Execução";
    case 7:
      return "Erro Desconhecido";
    case 8:
      return "Código Suspeito";
    default:
      return "Desconhecido";
  }	
}

function convert_language($id) {
  switch($id) {    
    case C:
      return "C";
    case CPP:
      return "C++";
    case PASCAL:
      return "Pascal";
    case PYTHON:
      return "Python";
    case JAVA:
      return "Java";
    default:
      return "Desconhecida";
  }	
}
?>

<script type="text/javascript">
  function show_code($code) {
    var window_code = window.open("", "WindowCode");
    window_code.document.write($code);  	  
  }
</script>

<div class="content">
  <!-- echo out the system feedback (error and success messages) -->  
  <?php require VIEWS_PATH . '_templates/leftmenu.php'; ?>
  <div class = "main">
    <div class = "textarea">
      <?php $this->renderFeedbackMessages();?>      
      <h1 align="center"> Últimas Submissões </h1>
      <table width ="100%">
      	<tr class="historyhead">      	  
      	  <td> Data </td>
      	  <td> Linguagem </td>
      	  <td> Resultado </td>
      	  <td> Tempo de Execução </td>      	  
      	  <td> Memória </td>
      	</tr>
      	<?php 
      	  foreach($this->submissions as $key => $value) {
      	    echo '<tr class="historytable">';
      	    
      	    echo '<td>';
      	    echo $value->submission_time;
      	    echo '</td>';
      	    
      	    echo '<td>';
      	    echo '<a href="' . URL . 'submit/show_code/' . $value->submission_id . '" target="_blank">' . convert_language($value->submission_language) . '</a>';      	    
      	    echo '</td>';
      	    
      	    echo '<td>';
      	    echo convert_status($value->submission_status);
      	    echo '</td>';
      	    
      	    echo '<td>';
      	    echo $value->submission_runtime . ' s';
      	    echo '</td>';

      	    echo '<td>';
      	    echo $value->submission_memory . ' MB';
      	    echo '</td>';      	    
      	    
      	    echo '</tr>';
      	  }
      	?>
      </table>
      
    </div>
  </div>
</div>
