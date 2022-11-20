<nav class="navbar container navbar-expand-lg">
    <div class="container-fluid">

      <a class="navbar-brand" href="#">Sênior Sistemas - Ifood</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link link" aria-current="page" href="{{ route('cadastro') }}">Cadastrar Credenciais</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('get.login') }}">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>