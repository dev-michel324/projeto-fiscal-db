<nav class="navbar py-2 shadow-1 --bg-gradient-primary">
  <div class="container display-flex align-items-center">
      <div class="navbar-brand">
        <a href="/">CUPOM FISCAL</a>
      </div>
      <div class="navbar-options">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('empresas.index') }}">Empresas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('instituicoes.index') }}">Instituição</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('produtos.index') }}">Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('vendas.index') }}">Vendas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('cupons.index') }}">Cupons</a>
          </li>
        </ul>
      </div>
  </div>
</nav>