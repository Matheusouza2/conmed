var url = window.location.href;
        var absoluto = url.split("/")[url.split("/").length - 1];
        var lista = null;
        switch (absoluto) {
            case 'admin':
                lista = document.querySelector('#admin');
                lista.classList.add('active');
                break;
            case 'pacientes':
                lista = document.querySelector('#patient');
                lista.classList.add('active');
                break;
            case 'medicos':
                lista = document.querySelector('#doctor');
                lista.classList.add('active');
                break;
            case 'calendario':
                lista = document.querySelector('#calendarAnchor');
                lista.classList.add('active');
                break;
        }