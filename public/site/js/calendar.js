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
        events: "/admin/appointment/consultaJson",

        displayEventTime: false,
        eventClick: function(infor) {
            alert(infor.event.extendedProps.patient_name);
          },
        themeSystem: 'bootstrap',
        locale: 'pt-BR',
    });
    calendar.render();
