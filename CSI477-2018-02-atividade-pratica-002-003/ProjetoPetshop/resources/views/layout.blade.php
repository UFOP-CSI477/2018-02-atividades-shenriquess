<!DOCTYPE html>
<html>
<head>
    <title>PetLovers - @yield('pagina_titulo')</title>

    <!--Import Google Icon Font-->
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css" media="screen,projection">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link href="/css/styles.css" rel="stylesheet">

</head>
<body>
    <header>
        <nav>
          <div class="nav-wrapper green row">
              <a href="{{ route('inicio.index') }}" class="brand-logo col offset-l1">PetLovers</a>
              <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
              <ul class="right hide-on-med-and-down">

                  @if (Auth::guest())
                    <li><a href="{{ route('produto.shoppingCart') }}" >
                        Meu Carrinho <span>({{ Session::has('cart') ? Session::get('cart')->quant :'0' }})</span>
                          </a>
                    </li>
                    <li><a href="{{ url('/login') }}">Entrar</a></li>
                    <li><a href="{{ url('/register') }}">Cadastre-se</a></li>
                  @else
                      @if (Auth::user()->type == 2 || Auth::user()->type == 3)

                          <li><a href="{{ url('/produtos') }}">Início</a></li>
                      @else
                      <li><a href="{{ route('produto.shoppingCart') }}" >
                            Meu Carrinho <span>({{ Session::has('cart') ? Session::get('cart')->quant :'0' }})</span>
                              </a>
                      </li>
                      @endif
                      <li>
                          <a class="dropdown-button" href="#!" data-activates="dropdown-user">
                              Olá {{ Auth::user()->name }}!<i class="material-icons right">arrow_drop_down</i>
                          </a>
                          <ul id="dropdown-user" class="dropdown-content">
                            @if (Auth::user()->type == 1)
                            <li class="divider"></li>
                            <li>
                                <a href="{{ url('/compras') }}">
                                    Meus Pedidos
                                </a>
                            </li>
                            @endif
                            <li class="divider"></li>
                            <li>
                                <a href="user/edit/{{Auth::user()->id}}">
                                    Alterar Dados
                                </a>
                            </li>
                              <li class="divider"></li>
                              <li>
                                  <a href="{{ url('/logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                      Sair
                                  </a>
                              </li>
                          </ul>

                      </li>
                  @endif
              </ul>
          </div>
      </nav>

        </nav>
    </header>
    <main>
        @yield('pagina_conteudo')

        @if(!Auth::guest())
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="hide">
                {{ csrf_field() }}
            </form>
        @endif
    </main>
    <footer class="page-footer green">
        <div class="footer-copyright">
            <div class="container">
                Desenvolvido para Disciplina  CSI477 - SISTEMAS WEB I 2018

            </div>
        </div>
    </footer>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    @stack('scripts')
    <script type="text/javascript">
        $( document ).ready(function(){
            $(".button-collapse").sideNav();
            $('select').material_select();
        });
    </script>
</body>
</html>
