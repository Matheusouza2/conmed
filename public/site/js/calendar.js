let eventos;
$.ajax({
    url: "/admin/calendario/consultaJson",
    dataType: "json",
    success: function (data) {
        eventos = JSON.stringify(data);
        console.log(JSON.stringify(data));
    },
    error: function(data){
        console.log(data);
        alert("Erro")
    }
});

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        timeZone: 'america/recife',
        dayMaxEvents: true,
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
          },
        events: "/admin/calendario/consultaJson",

        displayEventTime: false,
        eventClick: function(infor) {
            alert(infor.event.extendedProps.description);
          },
        themeSystem: 'bootstrap',
        locale: 'pt-BR',
    });
    calendar.render();
