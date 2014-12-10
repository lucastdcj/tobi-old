<div class="content">
    <h1 align="center"> Classificação </h1>
      <table class="ranking">
      	<tr class="historyhead">      	  
      	  <td> Usuário </td>
      	  <td> Seção </td>
      	  <td> Problemas </td>      	  
      	</tr>
      	<?php 
      	  foreach($this->users as $key => $value) {
      	    echo '<tr class="historytable">';
      	    
      	    echo '<td>';
      	    echo $value['user_name'];
      	    echo '</td>';
      	    
      	    echo '<td>';
      	    echo $value['section_id'];
      	    echo '</td>';

      	    echo '<td>';
      	    echo $value['problems'];
      	    echo '</td>';      	    
      	    
      	    echo '</tr>';
      	  }
      	?>
      </table>
</div>
