<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TOBI - Treinamento para a OBI</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>public/highlighter/prettify.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/codemirror/lib/codemirror.css" />
    <!-- in case you wonder: That's the cool-kids-protocol-free way to load jQuery -->
</head>
<body>
    <!--
    <div class="debug-helper-box">
        DEBUG HELPER: you are in the view: <?php echo $filename; ?>
    </div>
    -->
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
                    <a href="<?php echo URL; ?>section/show/5">1.5 - Funções e Ordenação</a>
                  </li>
                </ul>
            </li>
            
            <li <?php if (Session::get('user_logged_in') == true && Session::get('section_id') >= 10) { echo 'class = "finished"';} ?>>
                <a href="#" title = "Estrutura de Dados I"><font color="green">Capítulo 2</font></a>
               <ul class="sub-menu">
                 <li <?php if (Session::get('section_id') >= 7) { echo 'class = "finished"';} ?>>
                   <a href="<?php echo URL; ?>section/show/6">2.1 - Pilha e Fila</a>
                 </li>
                 <li <?php if (Session::get('section_id') >= 8) { echo 'class = "finished"';} ?>>
                   <a href="<?php echo URL; ?>section/show/7">2.2 -Set e Map</a>
                 </li>
                 <li <?php if (Session::get('section_id') >= 9) { echo 'class = "finished"';} ?>>
                   <a href="<?php echo URL; ?>section/show/8">2.3 - STL++</a>
                 </li>
               </ul>
           </li> 
            <li <?php if (Session::get('user_logged_in') == true && Session::get('section_id') >= 15) { echo 'class = "finished"';} ?>>
                <a href="#" title = "Introdução a Técnicas de Algoritmos"><font color="blue">Capítulo 3</font></a>
                <ul class="sub-menu">
                  <li <?php if (Session::get('section_id') >= 10) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/9">3.1 - Ad-Hoc &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 11) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/10">3.2 - Guloso</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 12) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/11">3.3 - Busca Binária</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 13) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/12">3.4 - Força Bruta e Backtracking</a>
                  </li>                 
                 <li <?php if (Session::get('section_id') >= 14) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/13">3.5 - Programação Dinâmica</a>
                  </li>                  
                
                </ul>
            </li>
            
            <li <?php if (Session::get('user_logged_in') == true && Session::get('section_id') >= 19) { echo 'class = "finished"';} ?>>
                <a href="#" title = "Grafos - Parte I"><font color="#a0a">Capítulo 4</font></a>
                <ul class="sub-menu">
                  <li <?php if (Session::get('section_id') >= 15) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/14">4.1 - Representação e Definição de Grafos</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 16) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/15">4.2 - Busca em Largura e Profundidade</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 17) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/16">4.3 - Árvores e Suas Propriedades</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 18) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/17">4.4 - Ordenação Topológica</a>
                  </li>                  
                </ul>
            </li>
            
            <li <?php if (Session::get('user_logged_in') == true && Session::get('section_id') >= 22) { echo 'class = "finished"';} ?>>
                <a href="#" title = "Grafos - Parte II"><font color="#FF8C00"> Capítulo 5</font></a>
                <ul class="sub-menu">
                  <li <?php if (Session::get('section_id') >= 19) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/18">5.1 - Árvore Geradora Mínima</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 20) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/19">5.2 - Caminhos Mínimos em Grafos</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 21) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/20">5.3 - Caminhos e Circuitos Eulerianos</a>
                  </li>                  
                </ul>
            </li>
            
             <li <?php if (Session::get('user_logged_in') == true && Session::get('section_id') >= 26) { echo 'class = "finished"';} ?>>
                <a href="#" title = "Matemática"><font color="red">Capítulo 6</font></a>
                <ul class="sub-menu">
                  <li <?php if (Session::get('section_id') >= 22) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/21">6.1 - Teoria dos Números</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 23) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/22">6.2 - Geometria Básica</a>
                  </li>
                  <li <?php if (Session::get('section_id') >= 24) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/23">6.3 - Ánalise Combinatória e Probabilidade</a>
                  </li>                 
                  <li <?php if (Session::get('section_id') >= 25) { echo 'class = "finished"';} ?>>
                    <a href="<?php echo URL; ?>section/show/24">6.3 - Matemática Geral</a>
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
                            <a href="<?php echo URL; ?>login/editusername">Alterar Usuário</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/edituseremail">Alterar E-mail</a>
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
