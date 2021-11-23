<?php include "head.php";?>
<head>
   
        <title> Esboço do Drive</title>
        <link rel="stylesheet" href="mystyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>

    <body>
<div class="geral">
        <header class="header">
            <a href="index.html">Drive Friends</a>
            <!-- <form class="pesquisa"> -->
            <form action="Pesquisa.php" method="POST">
            <div class="input-wrapper">
                <div class="fa fa-search"></div>
                <input type="text" placeholder="Search.." name="search">
                <div class="fa fa-times"></div>
            </div>
            </form>
                <!-- <button type="submit">Pesquisar</button> -->
            </form>
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
                <div id="mySidenav" class="sidenav">
                    <a href="#">Recentes</a>
                  </div>
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

            <h3>Fotos encontradas</h3>

            <div class="principal">
                
            <?php $search=$_POST['search'];
                $sql="select * from fotos where nome like '%$search%'";
                    $result=$conn->query($sql);

                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            echo"
                            <div class='semideia'>
                            <img src=data:image/jpeg;base64,".base64_encode($row['foto']).">
                            <figcaption>".$row['nome']."</figcaption>
                </div>
                            ";

                        }
                    }
                    else{
                        echo"Nenhuma foto encontrada";
                    }
    
                    ?>
            

            </div>

          <!--<h3>Meus documentos</h3>
            <div class="principal">
            <?php/*
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

            <h3>Videos encontrados</h3>
            <div class="principal">
            <?php
                    $sql="select * from videos ";
                    $result=$conn->query($sql);
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            echo"
                            <div class='semideia'>
                            <video width=200px height=200px src=data:video/mp4;base64,".base64_encode($row['video'])." type='video/mp4'>
                            <figcaption>".$row['nome']."</figcaption>
                </div>
                            ";
                        }
                    }
    
                    ?>
            </div>
            
        </section>

        <footer class="footer">
            <p>

                Copyright (c) 2021 by Gustavo Frederico and Diego Giron
                All Rights Reserved
                 
                This product is protected by copyright and distributed under
                licenses restricting copying, distribution, and decompilation.
            </p>
        </footer>

    </div>

    <script>
        $('.botao menu').click(function() {
            $('.aside ul .feat-show').toggleClass("show");
        })

    </script>
    </body>

<?php
                $search=$_POST['pesquisa'];
                $sql="select * from artigonoticia where a_titulo like '%$search%' or a_descricao like '%$search%'";
                    $result=$conn->query($sql);

                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            $datatime=strtotime($row['a_data']);
                            $dataformatada=date('d/m/y',$datatime);
                            echo"<div id='artigoloading'>
                            <a href='artigo2.php?tittle=".$row['a_titulo']."'>
                            <img src=data:image/jpeg;base64,".base64_encode($row['a_foto'])."  alt='Logo'> 
                            <div class='texto'>
                            <h2>".$row['a_titulo']."</h2>
                            <p>".$row['a_descricao']."></p>
                            <h5>".$dataformatada."</h5>
                            </div>
                            </a>
                            </div>
                            ";
                        }
                    }
                    else{
                        echo"Sem Resultados encontrados";
                    }
    
                    ?>