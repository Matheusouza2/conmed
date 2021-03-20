<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<meta charset="utf-8" />
</head>

<body style="margin: 0;">

<div id="p1" style="overflow: hidden; position: relative; background-color: white; width: 909px; height: 1286px;">

<!-- Begin shared CSS values -->
<style class="shared-css" type="text/css" >
.t {
	transform-origin: bottom left;
	z-index: 2;
	position: absolute;
	white-space: pre;
	overflow: visible;
	line-height: 1.5;
}
</style>
<!-- End shared CSS values -->


<!-- Begin inline CSS -->
<style type="text/css" >

#t1_1{left:60px;bottom:1084px;}
#t2_1{left:400px;bottom:1185px;letter-spacing:-0.18px;}
#t3_1{left:481px;bottom:1156px;letter-spacing:0.05px;}
#t4_1{left:517px;bottom:1134px;letter-spacing:0.08px;}
#t5_1{left:283px;bottom:93px;letter-spacing:0.06px;word-spacing:-0.5px;}
#t6_1{left:348px;bottom:70px;letter-spacing:0.12px;}
#t7_1{left:398px;bottom:48px;letter-spacing:0.12px;}
#t8_1{left:197px;bottom:220px;letter-spacing:-0.12px;}
#t9_1{left:197px;bottom:205px;letter-spacing:-0.11px;}
#ta_1{left:236px;bottom:205px;letter-spacing:-0.15px;}
#tb_1{left:197px;bottom:190px;letter-spacing:-0.11px;}
#tb_2{left:197px;bottom:175px;letter-spacing:-0.12px;}
#tc_1{left:197px;bottom:160px;letter-spacing:-0.12px;}
#td_1{left:245px;bottom:935px;letter-spacing:0.18px;}
#qr{left:57px;bottom:140px;}

.s1{font-size:127px;font-family:Arial-Black_i;color:#6EBCD2;}
.s2{font-size:37px;font-family:ArialMT_r;color:#231F20;}
.s3{font-size:19px;font-family:ArialMT_r;color:#231F20;}
.s4{font-size:20px;font-family:ArialMT_r;color:#231F20;}
.s5{font-size:14px;font-family:ArialMT_r;color:#231F20;}
.s6{font-size:14px;font-family:ArialMT_r;color:#1E3E94;}
.s7{font-size:18px;font-family:ArialMT_r;color:#231F20;}
.s8{font-size:17px;font-family:ArialMT_r;color:#231F20;}
.t.v0_1{transform:scaleX(1.108);}
</style>
<!-- End inline CSS -->

<!-- Begin embedded font definitions -->
<style id="fonts1" type="text/css" >

@font-face {
	font-family: Arial-Black_i;
	src: url("{{ asset('site/fonts/Arial-Black_i.woff') }}") format("woff");
}

@font-face {
	font-family: ArialMT_r;
	src: url("{{ asset('fonts/ArialMT_r.woff') }}") format("woff");
}

</style>
<!-- End embedded font definitions -->

<!-- Begin page background -->
<div id="pg1Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
<div id="pg1" style="-webkit-user-select: none;"><object width="909" height="1286" data="{{ asset('site/images/1.svg') }}" type="image/svg+xml" id="pdf1" style="width:909px; height:1286px; -moz-transform:scale(1); z-index: 0;"></object></div>
<!-- End page background -->


<div id="t1_1" class="t v0_1 s1">+</div>
<div id="t2_1" class="t s2">{{ $attendance[0]->doctor_name }}</div>
<div id="t3_1" class="t s3">{{ $attendance[0]->especialidade }}</div>
<div id="t4_1" class="t s3">CRM {{ $attendance[0]->crm }}</div>
<div id="t5_1" class="t s4">Av. Antônio Angelim, 488 - Santo Antônio</div>
<div id="t6_1" class="t s4">Salgueiro - PE, 56000-000</div>
<div id="t7_1" class="t s4">(87) 3871-4144</div>
<div id="t8_1" class="t s5">Para autenticar este documento</div>
<div id="t9_1" class="t s5">acesse:</div>
<div id="ta_1" class="t s6">http://conmed.herokuapp.com/autenticacao</div>
<div id="tb_1" class="t s5">e informe a chave a baixo. </div>
<div id="tb_2" class="t s5">Chave: {{ $attendance[0]->hash }}</div>
<div id="tc_1" class="t s5">Ou leia o Qrcode com o seu celular</div>
<div id="qr" class="t s5"><img src="https://chart.googleapis.com/chart?chs=140x140&cht=qr&chl=http://conmed.herokuapp.com/autenticacao/{{ $attendance[0]->hash }}"></div>
@if($attendance[0]->type == 'meds')
<div id="td_1" class="t s7">{{ $attendance[0]->medicines }}</div>
@else
<div id="td_1" class="t s7">{{ $attendance[0]->exams }}</div>
@endif


</div>
</body>
</html>