@extends('layouts.app')

@section('assets')
<link href="{{ URL::asset('/css/starter-template.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('/css/personalizado.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('/css/profile.css') }}" rel="stylesheet"/>
<script src="{{ URL::asset('/js/landlord.js') }}" type="text/javascript"></script>

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection

@section('content')
<body class="home-page">
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
          Landlord {{ config('app.name', 'shomie') }}
        </a>
      </div>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
          &nbsp;
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
          <li><a href="{{ route('login') }}">Login</a></li>
          <li><a href="{{ route('register') }}">Register</a></li>
          @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>

<!-- Contenido de la página -->
<div class="container" style="padding-top:70px;">

  <!-- Encabezado de página / Breadcrumb -->
  <div class="row">
    <div class="col-md-12">
      <h1 class="text-center page-header">Perfil do Senhorio
        <small>Detalhes</small>
      </h1>
    </div>
  </div>

  <div class="row">
    <!-- Columna de la izquierda -->
    <div class="col-md-3">
      <div class="col-md-12" align="center">
        <img class="img-responsive img-portfolio img-hover" src="img/marc.jpg">
      </div>
      <div class="col-md-12">
        <p class="text-center"><strong>{{ Auth::user()->name }}</strong></p>
        <p class="text-center"><em>Functions</em></p>
      </div>

      <div class="col-md-12 text-center">
        <!-- Redes sociales-->
        <ul class="list-unstyled list-inline list-social-icons">
          <li>
            <a href="https://www.facebook.com/SH0mie/"><i class="editIcons icon-facebook-square editSizeIcons"></i></a>
          </li>
          <li>
            <a href="#"><i class="editIcons icon-google-plus-square editSizeIcons"></i></a>
          </li>
        </ul>
        <!-- Fin redes sociales -->
      </div>

      <div id="content" class="col-md-12">
        <div id="profiletabs">
          <!-- Barra vertical de opciones del perfil de usuairo -->
          <br >
          <ul class="list-group list-primary">
            <a href="#detail"  onclick="showhide()" class="list-group-item">Detalhes Senhorio</a>
            <a href="#change_detail" onclick="showdetails()" class="list-group-item">Mudar Detalhes Senhorio</a>
            <a href="#available" onclick="showchange()"  class="list-group-item">Mudar Disponibilidade</a>
            <a href="#notification" class="list-group-item">Notificaçoes</a>
          </ul>
        </div>
      </div>
      <!-- Fin Barra vertical de opciones del perfil de usuario -->
    </div>
    <!-- Fin de Columna de la izquierda -->

    <!-- Parte central -->
    <section id="detail">
      <div id="detalhes" class="col-md-9">
        <div class="col-md-12" style="border-width: 1px 1px 0px 1px; border-style: solid; border-color: lightgrey;">
          <h3 style="text-align: center">O meu perfil <p><small>Detalhes da sua Conta</small></p></h3>
        </div>
        <!-- Se inicia el form (ojo todos los elementos de formulario deben ir dentro de esta etiqueta-->
        <form name="modifyProfile" id="profileForm" novalidate>
          <!-- Inicio del div central parte de formulario información básica -->
          <div class="col-md-12" style="border-width: 1px 1px 0px 1px; border-style: solid; border-color: lightgrey; background: #f1f3f6;">
            <div class="col-md-8 col-md-offset-2">

              <div class="control-group form-group">
                <div class="controls">
                  <br >
                  <h5 style="text-align: center">Informaçao básica</h5>
                  <br>
                  <span id="alertName" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
                    <label>Nome e Apelidos:</label>
                    <p>{{ Auth::user()->name }}</p>

                  </span>
                  <br >
                  <span id="alertSurname" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
                    <label>Numero de Telefone:</label>
                    <p>{{ Auth::user()->phone_number }}</p>

                  </span>
                  <br >
                  <span id="alertQualification" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
                    <label>Email: </label>
                    <p>{{ Auth::user()->email }}</p>
                  </span>
                  <br >
                  <p class="help-block"></p>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin del div central parte de formulario información básica -->

          <!-- Parte central - enlaces -->
          <div class="col-md-12" style="border: 1px solid lightgrey; background: #e5eaf2;">
            <!-- Parte de redes sociales en el alta de perfil -->
            <div class="col-md-8 col-md-offset-2">
              <div class="control-group form-group">
                <div class="controls">
                  <br >
                  <label>Propriedades: </label>
                  <div class="container1">
                    @foreach($properties as $key => $property)
                    <div class="col-md-6 col-sm-3">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <a href="{{ route('property', ['id'=> $property->id]) }}" target="_blank">{{ $property->id }}</a>
                          <img src="img/RoomPics/01/0101/DSC01375.jpg" alt="Room Image" class="img-responsive">
                        </div>
                        <div class="panel-footer">
                          <p>{{ $property->adress }}, {{ $property->number }}</p>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <br>
                  <br >
                </div>
              </div>
            </div>
            <!-- Fin Parte de redes sociales en el alta de perfil -->
          </div>
          <!-- Fin Parte central - enlaces -->
        </form>
        <!-- Fin del form -->
      </div>
    </section>
    <!-- Fin del div de parte central -->

    <!-- Editar Detalhes
    <div class="col-md-9">
    <div class="col-md-12" style="border-width: 1px 1px 0px 1px; border-style: solid; border-color: lightgrey;">
    <h3 style="text-align: center">O meu perfil <p><small>Editar detalhes da sua conta</small></p></h3>
  </div>
  <!-- Se inicia el form (ojo todos los elementos de formulario deben ir dentro de esta etiqueta-->
  <section id="change_detail" class="hidden">
    <div class="col-md-9">
      <div class="col-md-12" style="border-width: 1px 1px 0px 1px; border-style: solid; border-color: lightgrey;">
        <h3 style="text-align: center">O meu perfil <p><small>Editar detalhes da sua conta</small></p></h3>
      </div>
      <form method="post" action="{{ route('landlord_update') }}">
        <!-- Inicio del div central parte de formulario informaci�n b�sica -->
        {{ csrf_field() }}
        <div class="col-md-12" style="border-width: 1px 1px 0px 1px; border-style: solid; border-color: lightgrey; background: #f1f3f6;">
          <div class="col-md-8 col-md-offset-2">
            <div class="control-group form-group">
              <div class="controls">
              </br>
              <span id="alertName" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
                <input type="text" class="form-control" name="landlord_name" placeholder="Nome e apelido" required data-validation-required-message="Porfavor introduza o seu Nome.">
              </span>
              <br >
              <span id="alertQualification" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
                <input type="text" class="form-control" name="txtQualification" placeholder="Introduza um email"><!-- required data-validation-required-message="Porfavor introduza o seu Email.">-->
              </span>
              <br >
              <span id="alertEmail" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
                <input type="email" class="form-control" name="txtEmail" placeholder="Numero de telefone"> <!--required data-validation-required-message="Porfavor introduzca o seu numero de Telefone.">-->
              </span>
              <p class="help-block"></p>
            </div>
          </div>
        </div>
        <!-- Botones formulario -->
        <div class="col-md-12 container allFormButtons">
          <br >
          <div class="col-md-2 col-md-offset-2">
            <div class="form-group">
              <button type="button" id="btnCancel" class="btn btn-danger">Cancelar</button>
            </div>
          </div>
          <div class="col-md-5 col-md-offset-3">
            <div class="form-group">
              <button type="button" id="btnClean" class="btn btn-warning">Refresh</button>
              <button type="submit" id="btnEnviar" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          &nbsp;
        </div>
      </div>
      <!-- Fin del div central parte de formulario informaci�n b�sica -->
    </form>
    <!-- Fin del form -->
  </div>
</section>


<!-- prOoblem bellow -->
<section id="available" class="hidden">
  <div class="col-md-9">
    <div class="col-md-12" style="border-width: 1px 1px 0px 1px; border-style: solid; border-color: lightgrey;">
      <h3 style="text-align: center">O meu perfil <p><small>Editar detalhes da sua conta</small></p></h3>
    </div>
    <!-- Se inicia el form (ojo todos los elementos de formulario deben ir dentro de esta etiqueta-->
    <form name="modifyProfile" id="profileForm" novalidate>
      <!-- Inicio del div central parte de formulario informaci�n b�sica -->
      <!-- Parte central - enlaces -->
      <div class="col-md-12" style="border: 1px solid lightgrey; background: #e5eaf2;">
        <!-- Parte de redes sociales en el alta de perfil -->
        <div class="col-md-8 col-md-offset-2">
          <div class="control-group form-group">
            <div class="controls">
              <br>
              <label>Propriedades: </label>
              <div class="container1">
                @foreach($properties as $key => $property)
                <div class="col-md-6 col-sm-10">
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <?php
                      $image_search = $property->route. "/*.{jpg,jpeg,gif,png,JPG}";
                      $images = glob($image_search, GLOB_BRACE);
                      if(!empty($images))
                      {
                        echo "<img src='/$images[0]' alt='Room Image' class='img-responsive'>";
                      }
                      else
                      {
                        echo "<img src='' alt='Room Image' class='img-responsive'>";
                      }
                      ?>
                    </div>
                    <div class="panel-footer">
                      <p>{{ $property->adress }}, {{ $property->number }}</p>
                    </br>
                    <input type="checkbox" checked data-toggle="toggle" data-on="Disponivel" data-off="Indisponivel" data-onstyle="success" data-offstyle="danger"/>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </br>
        </br>
      </div>
    </div>
  </div>
  <div class="col-md-12 container allFormButtons">
    <br >
    <div class="col-md-2 col-md-offset-2">
      <div class="form-group">
        <button type="button" id="btnCancel" class="btn btn-danger">Cancelar</button>
      </div>
    </div>
    <div class="col-md-5 col-md-offset-3">
      <div class="form-group">
        <button type="button" id="btnClean" class="btn btn-warning">Refresh</button>
        <button type="submit" id="btnEnviar" class="btn btn-primary">Guardar</button>
      </div>
    </div>
    &nbsp;
  </div>
  <!-- Fin Parte de redes sociales en el alta de perfil -->
</form>
</div>
</section>
<!-- Botones formulario -->
</div>
</div>



<!-- Fin del div central parte de formulario informaci�n b�sica -->
<!-- Fin del form -->
<!-- Fin Campos del formulario de contacto con validación de campos -->
&nbsp;
<hr>

<!-- Footer -->
<footer>
  <div class="row">
    <div class="col-lg-12 footer-align">
      <p>Shomie &copy;</p>
    </div>
  </div>
</footer>

</div>
<!-- /.container -->
@endsection
