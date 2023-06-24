

let calendarEl = document.getElementById("calendar");
let calendar = new FullCalendar.Calendar(calendarEl, {
    locale: 'es',
    themeSystem: 'bootstrap5',
    headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth"
    },
    selectable: true,
    selectMirror: true,
    // Crear un nuevo evento
    select: function (arg) {
        Swal.fire({
            html:   "<div class='mb-7'>¿Crear nuevo evento?</div>" +
                    "<div class='fw-bold mb-5'>Nombre del Evento:</div>" +
                    "<input type='text' class='form-control' name='nombre-evento'/>",
            icon: "info",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Crear",
            cancelButtonText: "Cancelar",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-active-light"
            }
        }).then(function (result) {
            if (result.value) {
                let titulo = document.querySelector("input[name='nombre-evento']").value;
                if (titulo) {
                    calendar.addEvent({
                        title: titulo,
                        start: arg.start,
                        end: arg.end,
                        allDay: arg.allDay
                    })
                }
                calendar.unselect()
            } else if (result.dismiss === "cancel") {
                Swal.fire({
                    text: "El evento no se ha creado.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Aceptar",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    }
                });
            }
        });
    },

    // evento eliminar
    eventClick: function (arg) {
        Swal.fire({
            text: "¿Seguro de que desea eliminar este evento?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Eliminar",
            cancelButtonText: "Cancelar",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-active-light"
            }
        }).then(function (result) {
            if (result.value) {
                arg.event.remove()
            } else if (result.dismiss === "cancel") {
                Swal.fire({
                    text: "¡El evento no fue eliminado!.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Aceptar",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    }
                });
            }
        });
    },
    editable: true,
    dayMaxEvents: true, // allow "more" link when too many events
    events: [
        {
            title: "Evento 1",
            start: "2023-06-24"
        }
    ]
});



calendar.render();

