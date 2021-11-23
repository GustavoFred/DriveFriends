<?php include "head.php";?>
<head>
   
        <title> Esboço do Drive</title>
        <link rel="stylesheet" href="mystyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>

    <body>
<div class="geral">
        <header class="header">
            <a href="index.php">Drive Friends</a>
            <div class="input-wrapper">
                <div class="fa fa-search"></div>
                <input type="text" placeholder="Search.." name="search">
                <div class="fa fa-times"></div>
            </div>
                
                <!-- <button type="submit">Pesquisar</button> -->
            <nav>
                <ul class="menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="aboutus.html">Sobre nós</a></li>
                    <li><a href="#">Configurações</a></li>
                    <li><a href="#">Contato</a></li>
                </ul>

            </nav>
        </header>

        <div class="flexbox">
        <aside class="aside">
            <div class="asideoptions">
            <div class="sidenav1">
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="files">
                        <input type="submit" name="submit">
                    </form>
                  </div>

                  <div class="sidenav2">
                      <p>Criar arquivo</p>
                    <form action="index.php" method="post" enctype="multipart/form-data">
                    <textarea type="text" name="texto" style="width:100%; height:300px;"></textarea>
                        <input type="submit" name="submit2" >
                    </form>
                  </div>
                  <!-- Criacao da pasta dos arquivos de texto e do arquivo por si so -->
                  <?php
                    if (isset($_POST['submit2'])) {
                        $pasta = 'pasta';

                        if (!is_dir($pasta)) {
                            mkdir($pasta);
                        }

                        $texto = $_POST['texto'];
                        $nome_arquivo = date('Y-m-d-H-i-s') . '.txt';
                        $arquivo = fopen($nome_arquivo, 'w+');
                        fwrite($arquivo, $texto);
                        fclose($arquivo);

                        $mover_arquivo = "$pasta/$nome_arquivo";
                        rename($nome_arquivo, $mover_arquivo);
                    }

                    ?>
                <!-- <ul>
                    <li><button class="botao menu"><span class="fas fa-caret-right"></span>Minhas fotos</button></li>
                    <ul class="feat-show">
                        <button>Fotos pessoais</button></li>
                        <button>Fotos empresarias</button></li>
                        <button>Fotos aleatórias</button></li>
                    </ul>
                
                    <li><button class="botao menu">Meus documentos</button></li>
                    <li><button class="botao menu">Meus vídeos</button></li>
                </ul> -->
            </div>
        </aside>

        <section class="section">

            <h3>Meus arquivos</h3>

            <div class="principal">
                
                <!-- Criacao das divs de arquivos -->
                <?php
                    $sql="select url from filestable ";
                    $result=$conn->query($sql);
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            echo"
                            <a href='action2.php?name=".$row['url']."'>
                            <div class='semideia'>
                            <img src=./file.png>
                            <figcaption>".$row['url']."</figcaption>
                            </div>
                            </a>
                            ";
                        }
                    }
    
                    ?>

            </div>

          <!--<h3>Meus documentos</h3>
            <div class="principal">
            
            /*
                    $sql="select * from documentos ";
                    $result=$conn->query($sql);
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            echo"
                            <div class='semideia'>
                            <img src=data:image/jpeg;base64,".base64_encode($row['documento']).">
                            <figcaption>".$row['nome']."</figcaption>
                </div>
                            ";
                        }
                    }
                    */
                    ?>
            
                
                
                
            </div>-->

            <h3>Documentos criados</h3>
            <div class="principal">
                <!-- Insercao dos arquivos da pasta no array e criacao das divs -->
            <?php
                
                   $results_array = array();
                   $aux = 0;
                   if (is_dir('pasta'))
                   {
                       if ($handle = opendir('pasta'))
                       {
   
                           while(($file = readdir($handle)) !== FALSE)
                           {
                               if($aux > 1) {
                               $results_array[] = $file;

                               }
                               $aux = $aux +1;
                           }    
                           closedir($handle);
                       }
                   }

                   foreach($results_array as $value) {
                   echo
                   "<div class='semideia'>
                       <a href='action.php?nome=".$value."'><img src='arquivotxt.png'></a>
                       <figcaption> $value </figcaption>
                   </div>";
                   }
                   ?>
                      
            </div>
            <h3>Minhas fotos</h3>

<div class="principal">
    
    <!-- Criacao das divs de imagem -->
    <?php
        $sql="select url from imgTable ";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo"
            
                <div class='semideia'>
                <img src=./upload/".$row['url'].">
            
                </div>
             
                ";
            }
        }

        ?>

</div>


        </section>

        <footer class="footer">
            <p>
                Elaborado por: Gustavo Angelozi Frederico e Diego Giron Barbosa em 2021
            </p>
        </footer>

    </div>
    </body>