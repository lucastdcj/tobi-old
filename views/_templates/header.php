<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TOBI - Treinamento para a OBI</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/reset.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css" />
    <!-- in case you wonder: That's the cool-kids-protocol-free way to load jQuery -->
</head>
<body>

    <div class="debug-helper-box">
        DEBUG HELPER: you are in the view: <?php echo $filename; ?>
    </div>

    <div class='title-box'>    	
        <a href="<?php echo URL; ?>">TOBI - Treinamento para a OBI</a>        
    </div>

    <div class="header">
        <div class="header_left_box">
        <ul id="menu">
            <li <?php if (Session::get('user_logged_in') == true && Session::get('section_id') >= 7) { echo 'class = "finished"';} ?>>
                <a href="#" title="Introdução a Programação">Capítulo 1</a>
                <ul class="sub-menu">
                  <li <?php if (Session::get('section_id') >= 2) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/1">1.1 - Compilando Meu Código</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 3) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/2">1.2 - Estruturas Condicionais</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 4) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/3">1.3 - Estruturas de Repetição</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 5) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/4">1.4 - Vetores e Matrizes</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 6) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/5">1.5 - Funções e Recursão</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 7) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/6">1.6 - Ordenação</a>
                  </li>
                </ul>
            </li>
            
            <li>
                <a href="#" title = "Estrutura de Dados I">Capítulo 2</a>
                <ul class="sub-menu">
                  <li <?php if (Session::get('section_id') >= 8) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/7">2.1 - Pilha</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 9) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/8">2.2 - Fila</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 10) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/9">2.3 - Set</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 11) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/10">2.4 - Map</a>
                  </li>                  
                </ul>
            </li>
            
            <li>
                <a href="#" title = "Introdução a Técnicas de Algoritmos">Capítulo 3</a>
                <ul class="sub-menu">
                  <li <?php if (Session::get('section_id') >= 12) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/11">3.1 - Guloso</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 13) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/12">3.2 - Busca Binária</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 14) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/13">3.3 - Força Bruta e Backtracking</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 15) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/14">3.4 - Programação Dinâmica</a>
                  </li>                  
                </ul>
            </li>
            
            <li>
                <a href="#" title = "Grafos - Parte I">Capítulo 4</a>
                <ul class="sub-menu">
                  <li <?php if (Session::get('section_id') >= 16) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/15">4.1 - Representação e Definição de Grafos</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 17) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/16">4.2 - Busca em Largura e Profundidade</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 18) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/17">4.3 - Árvores e Suas Propriedades</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 19) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/18">4.4 - Ordenação Topológica</a>
                  </li>                  
                </ul>
            </li>
            
            <li>
                <a href="#" title = "Grafos - Parte II">Capítulo 5</a>
                <ul class="sub-menu">
                  <li <?php if (Session::get('section_id') >= 20) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/19">5.1 - Árvore Geradora Mínima</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 21) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/20">5.2 - Caminhos Mínimos em Grafos</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 22) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/21">5.3 - Caminhos e Circuitos Eulerianos</a>
                  </li>                  
                </ul>
            </li>
            
            
                        
        </ul>
        </div>
        
        <div class="header_right_box">
          <?php if (Session::get('user_logged_in') == false):?>
            <ul id="menu">              
              <li <?php if ($this->checkForActiveControllerAndAction($filename, "login/index")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>login/index">Entrar</a>
              </li>
              <li <?php if ($this->checkForActiveControllerAndAction($filename, "login/register")) { echo ' class="active" '; } ?> >
                  <a href="<?php echo URL; ?>login/register">Registrar</a>
              </li>
            </ul> 
          <?php endif; ?>
          
	  <?php if (Session::get('user_logged_in') == true):?>
	    <ul id="menu">
	        <li>
                   <a href="<?php echo URL; ?>ranking/show" title = "Ranking"> Classificação </a>
                </li>
                <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/showprofile">Minha Conta</a>
                    <ul class="sub-menu">
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/editusername">Editar Username</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/edituseremail">Editar Email</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/logout">Sair</a>
                        </li>
                    </ul>
                </li>
	      </ul>                
            <?php endif; ?>
          
        </div>
        
        <div class="clear-both"></div>
    </div>