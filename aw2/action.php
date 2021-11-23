

<html>

<head>
    <meta charset="UTF-8">
    <title> Esboço do Drive</title>
    <link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
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
            
        <?php  $conteudo = file_get_contents('pasta/'.$_GET['nome']);  ?>
            <p> <?php  echo $conteudo ?> </p>
        </section>

        <footer class="footer">
            <p>
                Elaborado por: Gustavo Angelozi Frederico e Diego Giron Barbosa em 2021
            </p>
        </footer>

    </div>

</body>

</html>