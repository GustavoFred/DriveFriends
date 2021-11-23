
<?php
include 'head.php';
?>

    <div class="geral">
        <header class="header">
            <a href="index.php">Drive Friends</a>
            <!-- <form class="pesquisa"> -->
            <!-- <div class="input-wrapper">
                <div class="fa fa-search"></div>
                <input type="text" placeholder="Search.." name="search">
                <div class="fa fa-times"></div>
            </div>

             <button type="submit">Pesquisar</button> 
            </form> -->
            <nav>
                <ul class="menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="aboutus.html">Sobre nós</a></li>
                    <li><a href="#">Configurações</a></li>
                    <li><a href="#">Contato</a></li>
                </ul>

            </nav>
        </header>

        <section>
            
        <?php 
           $name=$_GET['name'];
           $ext=explode(".",$name);

           if($ext[2]=="pdf"){
            echo "<iframe src=\"upload/".$name."\" width=\"100%\" style=\"height:600px\"></iframe>";

           }
        ?> 
        </section>

        <footer class="footer">
        <p>
                Elaborado por: Gustavo Angelozi Frederico e Diego Giron Barbosa em 2021
            </p>
        </footer>

    </div>
