<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-collapse collapse" id="navigation">
          <ul class="nav navbar-nav navbar-left">
              <li class="active"><a href="#">Inicio</a></li>
              <li class="dropdown yamm-fw">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Menu <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li>
                          <div class="yamm-content">
                              <div class="row">
                                  <div class="col-sm-6">
                                      <h5>Categoria</h5>
                                      <ul>
                                          @foreach ($categories as $value)
                                              <li><a href="category.html">{{ $value->title }}</a></li>
                                          @endforeach
                                      </ul>
                                  </div>

                                  <div class="col-sm-6">
                                      <h5>Usuarios</h5>
                                      <ul>
                                          @if (Auth::guest())
                                              <li><a href="login">Iniciar Session</a>
                                              </li>
                                              <li><a href="register">Registrar</a>
                                              </li>
                                          @else
                                              <li>
                                                  Hola {{ Auth::user()->name }}
                                              </li>
                                              <li><a href="{{route('logout')}}">Cerrar Session</a></li>
                                          @endif
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </li>
                  </ul>
              </li>
          </ul>
        </div>
        <!--/.nav-collapse -->

        <div class="navbar-buttons">

        <div class="navbar-collapse collapse right" id="basket-overview">
        <a href="basket.html" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">3 items in cart</span></a>
        </div>
        <!--/.nav-collapse -->

        <div class="navbar-collapse collapse right" id="search-not-mobile">
        <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
        <span class="sr-only">Toggle search</span>
        <i class="fa fa-search"></i>
        </button>
        </div>

        </div>

        <div class="collapse clearfix" id="search">

        <form class="navbar-form" role="search">
        <div class="input-group">
        <input type="text" class="form-control" placeholder="Search">
        <span class="input-group-btn">

        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

        </span>
        </div>
        </form>

        </div>        

    </div>
    <!-- /.container -->
</div>
