<div class = "leftmenu">
  <ul>
    <?php	        
      if ($this->problems) {
          $has_extra = false;
          echo '<li class="problemtype"> Problemas Obrigatórios </li>';
          $user_problems = Session::get('user_problems');
          $user_section_id = Session::get('section_id');
          
          foreach($this->problems as $key => $value) {		    
          	if (!$value->problem_extra) {		    	  
          	  echo (isset($user_problems[$value->problem_id])) ? '<li class="finished">' : '<li>';
          	  echo '<a href="' . URL .'problem/show/' . $this->section_id . '/' . $value->problem_id . '">';
          	  echo '<img src="' . URL . 'public/img/icons/problem.png" title="Ver Problema">';
          	  echo '</a>';
          	  
          	  if ($user_section_id >= $this->section_id) {
          	    echo '<a href="' . URL .'submit/show_form/' . $this->section_id . '/' . $value->problem_id . '">';          	    
          	    echo '<img src="' . URL . 'public/img/icons/submit.png" title ="Submeter Problema">';
          	    echo '</a>';
          	    
          	    echo '<a href="' . URL .'submit/show_history/' . $this->section_id . '/' . $value->problem_id . '">';
          	    echo '<img src="' . URL . 'public/img/icons/history.png" title ="Ver Submissões">';
          	    echo '</a>';
          	  } else {
          	    echo '<img src="' . URL . 'public/img/icons/submit_gray.png" title ="Submeter Problema">';
          	    echo '<img src="' . URL . 'public/img/icons/history_gray.png" title ="Ver Submissões">';
          	  }
          	  
          	  if (isset($user_problems[$value->problem_id])) {
          	    echo '<a href="' . URL .'problem/show_solution/' . $this->section_id . '/' . $value->problem_id .'">';
          	    echo '<img src="' . URL . 'public/img/icons/solution.png" title="Solução do Problema">';
          	    echo '</a>';
          	  } else {
          	    echo '<img src="' . URL . 'public/img/icons/solution_gray.png" title="Solução do Problema">';
          	  }
                            	  
          	  echo '<a href="' . URL .'problem/show/' . $this->section_id . '/' . $value->problem_id . '">';
          	  echo $value->problem_name;			  
                  echo '</a>';
          	  echo '</li>';
              } else {
                $has_extra = true;	
              }
          }
          
          if ($has_extra) {
            echo '<li class="problemtype"> Problemas Sugeridos </li>';	    
          }
          
          foreach($this->problems as $key => $value) {
                // Skip bug problem.
                if ($value->problem_id == 102) continue;
          	if ($value->problem_extra == 1) {
          	  echo (isset($user_problems[$value->problem_id])) ? '<li class="finished">' : '<li>';
          	  echo '<a href="' . URL .'problem/show/' . $this->section_id . '/' . $value->problem_id . '">';
          	  echo '<img src="' . URL . 'public/img/icons/problem.png" title="Ver Problema">';
          	  echo '</a>';
          	  
          	  if ($user_section_id >= $this->section_id) {
          	    echo '<a href="' . URL .'submit/show_form/' . $this->section_id . '/' . $value->problem_id . '">';          	    
          	    echo '<img src="' . URL . 'public/img/icons/submit.png" title ="Submeter Problema">';
          	    echo '</a>';
          	    
          	    echo '<a href="' . URL .'submit/show_history/' . $this->section_id . '/' . $value->problem_id . '">';
          	    echo '<img src="' . URL . 'public/img/icons/history.png" title ="Ver Submissões">';
          	    echo '</a>';
          	  } else {
          	    echo '<img src="' . URL . 'public/img/icons/submit_gray.png" title ="Submeter Problema">';
          	    echo '<img src="' . URL . 'public/img/icons/history_gray.png" title ="Ver Submissões">';
          	  }
          	  
          	  if (isset($user_problems[$value->problem_id])) {
          	    echo '<a href="' . URL .'problem/show_solution/' . $this->section_id . '/' . $value->problem_id .'">';
          	    echo '<img src="' . URL . 'public/img/icons/solution.png" title="Solução do Problema">';
          	    echo '</a>';
          	  } else {
          	    echo '<img src="' . URL . 'public/img/icons/solution_gray.png" title="Solução do Problema">';
          	  }
           	  echo '<a href="' . URL .'problem/show/' . $this->section_id . '/' . $value->problem_id . '">';
          	  echo $value->problem_name;			  
                  echo '</a>';
          	  
          	  echo '</li>';
              }
          }
      }		
    ?>
  </ul>
</div>
