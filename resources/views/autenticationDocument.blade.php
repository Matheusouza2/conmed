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
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>ConMed</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('site/images/brand/favicon.png') }}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ mix('site/css/style.css') }}">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.2/css/all.css"/>
</head>

<body class="bg-default">
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-5 pt-lg-9">
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--9 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-3">
              <div class="text-center text-muted mb-4">
                <small>Digite a chave e clique em consultar</small>
              </div>
            
                <div class="form-group mb-1">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-qrcode"></i></span>
                    </div>
                    <input class="form-control" placeholder="Chave de autenticação" id="hash" name="hash" type="text" onkeydown="upperCaseF(this)">
                  </div>
                </div>
                <div class="text-center">
                  <a id="consultar" class="btn btn-primary my-4">Consultar Chave</a>
                </div>
            
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-md-12" id="infos" hidden>
          <div class="card bg-secondary mt-3">
            <div class="card-body px-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Informações</small>
              </div>
              <form role="form">
                <div class="form-group">
                  <label for="doctor">Médico</label>
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                    </div>
                    <input class="form-control" placeholder="" id="doctor" type="text" readonly>
                  </div>

                  <label for="crm">CRM</label>
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                    </div>
                    <input class="form-control" placeholder="" id="crm" type="text" readonly>
                  </div>

                  <label for="patient">Paciente</label>
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user-injured"></i></span>
                    </div>
                    <input class="form-control" placeholder="" id="patient" type="text" readonly>
                  </div>

                  <label for="date">Data</label>
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input class="form-control" placeholder="" id="date" type="text" readonly>
                  </div>

                  <label for="rel">Prescrição médica</label>
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-files-medical"></i></span>
                    </div>
                    <textarea class="form-control" id="meds" cols="40" rows="4" readonly></textarea>
                  </div>

                  <label for="rel">Requisição de Exames</label>
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-files-medical"></i></span>
                    </div>
                    <textarea class="form-control" id="exams" cols="40" rows="4" readonly></textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
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
    </div>
  </footer>
  <!-- Argon Scripts -->
  <!-- Argon JS -->
  <script src="{{ mix('site/js/script.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    $('#hash').mask('AAAAAAAA-AAAAAAAA');
    function upperCaseF(a){
      setTimeout(function(){
          a.value = a.value.toUpperCase();
          $('#consultar').attr('href', '/autenticacao/'+$('#hash').val());
      }, 1);
    }
  </script>
@if($attendance ?? '' != null)
<script>

$('#doctor').val(' {{ $attendance[0]->doctor_name }}');
$('#crm').val(' {{ $attendance[0]->crm }}');
$('#patient').val(' {{ $attendance[0]->patient_name }}');
$('#date').val(' {{ date( 'd/m/Y' , strtotime($attendance[0]->data)) }}');
var meds = "{{ $attendance[0]->medicines }}";
var newmeds = meds.replace(/@/g, '\n');
$('#meds').text(newmeds);
var exams = "{{ $attendance[0]->exams }}";
var newexams = exams.replace(/@/g, '\n');
$('#exams').text(newexams);
$('#infos').attr('hidden', false);
</script>
@else
<script>Swal.fire('Não encontrado', 'Essa receita ou requisição de exame não foi encontrada no nosso sistema, por favor procure o médico que deu a prescrição.', 'warning');</script>
@endif


</body>

</html>