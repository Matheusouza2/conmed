<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Conmed</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('site/images/brand/favicon.png') }}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- Page plugins --> 
  <!-- Argon CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ mix('site/css/style.css') }}">
</head>

<body>
  <!-- Sidenav -->
  <!-- Sidenav -->
  @include('admin.menu')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-default border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="{{ asset('site/images/theme/team-1.jpg') }}" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="{{ asset('site/images/theme/team-2.jpg') }}" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="{{ asset('site/images/theme/team-3.jpg') }}" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>5 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="{{ asset('site/images/theme/team-4.jpg') }}" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="{{ asset('site/images/theme/team-5.jpg') }}" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- View all -->
                <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                <div class="row shortcuts px-4">
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="ni ni-calendar-grid-58"></i>
                    </span>
                    <small>Calendar</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                      <i class="ni ni-email-83"></i>
                    </span>
                    <small>Email</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-credit-card"></i>
                    </span>
                    <small>Payments</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                    <small>Reports</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                      <i class="ni ni-pin-3"></i>
                    </span>
                    <small>Maps</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                    <small>Shop</small>
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{ asset('site/images/theme/team-4.jpg') }}">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">John Snow</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Olá Operador</h1>
            <p class="text-white mt-0 mb-5">Aqui você vai fazer o cadastro dos pacientes, não esqueça de preencher todos os campos importantes (*)</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--8">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
          <div class="nav-wrapper">
              <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#cadastro" role="tab" aria-controls="cadastro" aria-selected="true"><i class="ni ni-folder-17 mr-2"></i>Cadastro</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#historicomedico" role="tab" aria-controls="historicomedico" aria-selected="false"><i class="ni ni-archive-2 mr-2"></i>Histórico de Consultas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#financeiro" role="tab" aria-controls="financeiro" aria-selected="false"><i class="ni ni-money-coins mr-2"></i>Financeiro</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#receituario" role="tab" aria-controls="receituario" aria-selected="false"><i class="ni ni-align-left-2 mr-2"></i>Receituário</a>
                  </li>
              </ul>
          </div>
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h2 class="mb-0">Cadastro de paciente</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="tab-content" id="myTabContent">
                <!-- Div cadastral do paciente -->
                <div class="tab-pane fade show active" id="cadastro" role="tabpanel" aria-labelledby="cadastro">
                  <form action="{{ route('storePatient') }}" method="post" id="form" class="needs-validation" novalidate>
                    @csrf
                    @if(session('edit'))
                      @method('PUT')
                    @endif
                    <h6 class="heading-small text-muted mb-4">Informações pessoais</h6>
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="nome">Nome *</label>
                            <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome completo" required>
                            <div class="invalid-feedback">
                              Campo de preenchimento obrigatório
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="nomesocial">Nome Social</label>
                            <input type="text" id="nomesocial" name="nomesocial" class="form-control" placeholder="Como o(a) paciente prefere ser chamado(a)">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="cpf">CPF *</label>
                            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF" required>
                            <div class="invalid-feedback">
                              Campo de preenchimento obrigatório
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="datanascimento">Data de Nascimento *</label>
                            <input type="text" id="datanascimento" name="datanascimento" class="form-control" placeholder="Data de Nascimento" autocomplete="off" required>
                            <div class="invalid-feedback">
                              Campo de preenchimento obrigatório
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="idade">Idade</label>
                            <input type="text" id="idade" name="idade" class="form-control" readonly="true">
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr class="my-4" />
                    <!-- Address -->
                    <h6 class="heading-small text-muted mb-4">Informações de contato</h6>
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="cep">Cep *</label>
                            <input type="text" id="cep" name="cep" class="form-control" placeholder="Digite o cep e aguarde até o sistema preencher o endereço" required>
                            <div class="invalid-feedback">
                              Campo de preenchimento obrigatório
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-10">
                          <div class="form-group">
                            <label class="form-control-label" for="logradouro">Logradouro *</label>
                            <input id="logradouro" name="logradouro" class="form-control" placeholder="Rua Av. Tv." type="text" required>
                            <div class="invalid-feedback">
                              Campo de preenchimento obrigatório
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label class="form-control-label" for="numero">Número</label>
                            <input id="numero" name="numero" class="form-control" placeholder="Numero da casa" type="number">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="bairro">Bairro *</label>
                            <input type="text" id="bairro" name="bairro" class="form-control" placeholder="Bairro" required>
                            <div class="invalid-feedback">
                              Campo de preenchimento obrigatório
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="cidade">Cidade</label>
                            <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="uf">UF</label>
                            <input type="text" id="uf" name="uf" class="form-control" placeholder="UF">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="telefone">Telefone</label>
                            <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Número de contato">
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr class="my-4" />
                    <!-- Description -->
                    <h6 class="heading-small text-muted mb-4">Informações Extras</h6>
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="convenio">Convênio *</label>
                            <select class="form-control" name="convenio" id="convenio" required>
                              <option>Selecione um Convenio</option>
                              <option value="Particular">Particular</option>
                              <option value="UNIMED">UNIMED</option>
                              <option value="AMIL">AMIL</option>
                              <option value="GEAP">GEAP</option>
                              <option value="Bradesco">Bradesco Saúde</option>
                              <option value="SUS">SUS</option>
                            </select>
                            <div class="invalid-feedback">
                              Campo de preenchimento obrigatório
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="numeroconvenio">Número do Convênio</label>
                            <input type="text" id="numeroconvenio" name="numeroconvenio" placeholder="Digite o numero do convênio" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Observações</label>
                          <textarea rows="4" class="form-control" placeholder="Digite aqui qualquer informação sobre o paciente que você julgue nescessária"></textarea>
                        </div>
                      </div>  
                    </div>
                    <div class="text-right">
                      <button type="submit" class="btn btn-success my-4">Salvar cadastro</button>
                    </div>
                  </form>
                </div>
                <!-- Div de historico médico do paciente -->
                <div class="tab-pane fade show" id="historicomedico" role="tabpanel" aria-labelledby="historicomedico">
                  <h1>Historico Medico </h1>
                </div>
                <!-- Div de historico financeiro do paciente -->
                <div class="tab-pane fade show" id="financeiro" role="tabpanel" aria-labelledby="financeiro">
                  <h1>Historico Financeiro </h1>
                </div>
                <!-- Div de historico financeiro do paciente -->
                <div class="tab-pane fade show" id="receituario" role="tabpanel" aria-labelledby="receituario">
                  <h1>Historico Financeiro </h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <script src="{{ mix('site/js/script.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script src="{{ asset('site/js/formPatientValidation.js') }}"></script>
  <script src="{{ asset('site/js/buscarcep.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="{{ asset('site/js/menu.js') }}"></script>
  <script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
  </script>  

@if(session('mensage'))
        <script>
          Swal.fire(
            'Erro !',
            '{{session('mensage')}}',
            'error'
          );
        </script>
    @endif
  
@if(session('edit'))
  <script>
    $('#nome').val('{{ $patient->nome }}');
    $('#nomesocial').val('{{ $patient->nomesocial }}');
    $('#cpf').val('{{ $patient->cpf }}');
    $('#datanascimento').val('{{ date( 'd/m/Y' , strtotime($patient->datanascimento)) }}');
    $('#cep').val('{{ $patient->cep }}');
    $('#logradouro').val('{{ $patient->logradouro }}');
    $('#numero').val('{{ $patient->numero }}');
    $('#bairro').val('{{ $patient->bairro }}');
    $('#cidade').val('{{ $patient->cidade }}');
    $('#uf').val('{{ $patient->uf }}');
    $('#telefone').val('{{ $patient->telefone }}');
    $('#convenio').val('{{ $patient->convenio }}');
    $('#numeroconvenio').val('{{ $patient->numeroconvenio }}');
    $('#observacoes').val('{{ $patient->observacoes }}');
    $('#form').attr('action','{{ route('editPatient', ['patient' => $patient->id]) }}');
    $('#cpf').attr('readonly', true);
  </script>
@endif
</body>

</html>