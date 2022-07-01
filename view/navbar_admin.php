<nav  class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="../view/administrativo.php">SESMT</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Material Isolado</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="../controlador/cadastrar_ep.php">cadastrar</a>
          <a class="dropdown-item" href="../controlador/consultar_ep.php">listar</a>
          <a class="dropdown-item" href="../controlador/ficha.php">backup</a>
        </div>
      </li>
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Treinamentos</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="../controlador/cadastro_usuario.php">criar itens</a>
          <a class="dropdown-item" href="../controlador/consulta_usuario.php">criar tipo</a>
          <a class="dropdown-item" href="../controlador/gera_cert.php">criar</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link disabled" href="#">Informações</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <?php
		    session_start(); 
		    echo nl2br("Bem-vindo, \n". $_SESSION['usuarioNome']);  
	    ?>
    <a style='color:red' href="../controlador/sair.php">Sair</a>	
    </form>
  </div>
</nav>