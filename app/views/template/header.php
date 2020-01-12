<!doctype html>
<html lang="pt-br">

<head>
    <title>Revict</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Font Awesome  -->
    <script src="https://kit.fontawesome.com/ca27e18b89.js" crossorigin="anonymous"></script>
    
    <!-- Custom CSS  -->
    <link rel="stylesheet" href="assets/css/style.css">
    <?php 
      if(isset($css)){
        foreach($css as $c){
          echo '<link rel="stylesheet" href="'. $c .'"';
        }
      }
    ?>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">
            <img src="https://www.revict.com.br/wp-content/uploads/2018/07/Logo-Revict-13.png" class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Dashboard <span class="sr-only">(current)</span></a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link" href="/devedores">Devedores</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/dividas">Dividas</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="POST" action="/devedores">
                <input class="form-control mr-sm-2" type="search" placeholder="Nome do devedor" aria-label="Search" name="nome">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="pesquisa">Pesquisar</button>
            </form>
        </div>
    </nav>