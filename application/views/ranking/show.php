<div class="content">
    <h1 align="center"> Classificação </h1>
      <table class="ranking">
      	<tr class="historyhead">      	  
      	  <td> # </td>
      	  <td> Usuário </td>
      	  <td> Seção </td>
      	  <td> Problemas </td>      	  
      	</tr>
      	<?php 
      	  foreach($this->users as $key => $value) {
      	    echo '<tr class="historytable">';
            
            echo '<td>';
      	    echo $value['ranking'];
      	    echo '</td>';
      	    
      	    echo '<td>';
            if ($value['section_id'] >= 25) {
              echo '<font color="#cc0000"><b>' . $value['user_name'] . '</b></font>';
            } else if ($value['section_id'] >= 21) {
              echo '<font color="red">' . $value['user_name'] . '</font>';
            } else if ($value['section_id'] >= 18) {
              echo '<font color="#FF8C00">' . $value['user_name'] . '</font>';
            } else if ($value['section_id'] >= 14) {
              echo '<font color="#a0a">' . $value['user_name'] . '</font>';
            } else if ($value['section_id'] >= 9) {
              echo '<font color="blue">' . $value['user_name'] . '</font>';
            } else if ($value['section_id'] >= 6) {
              echo '<font color="green">' . $value['user_name'] . '</font>';
            } else {
              echo $value['user_name'];
            }
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
