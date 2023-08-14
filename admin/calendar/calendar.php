<?php include('../template/head.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <link rel="stylesheet" href="main.min.css">
     <!-- Favicon -->
     <link rel="icon" type="image/x-icon" href="../../img/logoAmarillo.png">
    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <?php include('../config/conex.php');
        $events   = ("SELECT * FROM calendar");
        $resEvents = mysqli_query($cnx, $events);
    ?>
    <br><br><br>
    <div class="container ">
        <br>
        <div class="col-md-8 offset-md-2">
            <div id='calendar'></div>
        </div>
    </div>
    
    <!-- modal new event -->
   
    <div class="modal fade" id="modalNew" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titulo"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="eventForm">
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="hidden" id="id" name="id">
                        <div class="mb-3">
                        <label for="title" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Nombre del usuario del evento" >
                        
                        </div>
                        <div class="mb-3">
                        <label for="start" class="form-label">Fecha de inicio</label>
                        <input type="datetime-local" class="form-control" id="start" name="start" placeholder="Fecha de inicio" >                     
                        </div>

                        <div class="mb-3">
                        <label for="end" class="form-label">Fecha de fin</label>
                        <input type="datetime-local" class="form-control" id="end" name="end" placeholder="Fecha de fin" >                     
                        </div>

                        <div class="mb-3">
                        <label for="color" class="form-label">Color </label>
                        <input type="color" class="form-control" id="color">                    
                        </div>

                        <div class="mb-3">
                        <label for="id_Events" class="form-label">Salón de eventos:</label>
                        <select class="form-select" name="id_events" id="id_events">
                            <option value="">Seleccionar salón</option>
                            <?php
                                include('../config/conex.php');
                                $query= "SELECT id_events, nameS FROM events";
                                $res = $cnx->query($query);
                                while ($row = $res->fetch_assoc()) {
                                    echo '<option value="'. $row['id_events'].'">'.$row['nameS'].'</option>';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                    <button type="button" class="btn btn-warning" id="editEvent">Editar</button>
                    <button type="submit" class="btn btn-primary" id="saveEvent">Registrar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Optional: Place to the bottom of scripts -->
    
    <script src="main.min.js"></script>
    <!-- <script src="calendar.js"></script> -->
    <script src="es.js"></script>
    </body>
    </html>
    <script>
            var modalNew = new bootstrap.Modal(document.getElementById('modalNew'));
            let form = document.getElementById('formEvent');

            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                editable: true,
                navLinks: true, 
                editable: true,
                eventLimit: true, 
                selectable: true,
                selectHelper: false,
                // themeSystem: 'bootstrap5',

                headerToolbar: {
                    left: 'prev, next, today',
                    center: 'title',
                    right: 'dayGridMonth, listWeek'
                },
                eventDrop: function(info){
                    var id =  info.event.id;
                    var start = info.event.startStr;
                    var end = info.event.endStr;
                    // var end = info.event.end ? event.end.format() : null;
                    console.log(id, start, end);
                    $.ajax({
                        url: 'dragDrop.php',
                        method: 'POST',
                        data:{
                        id: id,
                        start: start,
                        end: end,
                        },
                        success: function (response){
                         console.log(response);
                        },
                        error: function(error){
                        console.log(error);
                      
                        }
                    });

                },
                dateClick: function (info) {
                    // console.log(info);
                    eventForm.reset();
                    document.getElementById('btnEliminar').classList.add('d-none');
                    document.getElementById('editEvent').classList.add('d-none');
                    document.getElementById('saveEvent').classList.remove('d-none');
                    document.getElementById('id').value = '';
                    document.getElementById('start').value = info.dateStr;
                    document.getElementById('end').value = info.dateStr;
                    document.getElementById('titulo').textContent = 'Registra un evento';
                    modalNew.show();
                },
                eventClick: function (info){
                    console.log(info);
                    document.getElementById('btnEliminar').classList.remove('d-none');
                    document.getElementById('editEvent').classList.remove('d-none');
                    document.getElementById('saveEvent').classList.add('d-none');
                    document.getElementById('id').value = info.event.id;
                    document.getElementById('title').value = info.event.title;
                    document.getElementById('start').value = info.event.startStr;
                    document.getElementById('end').value = info.event.endStr;
                    document.getElementById('color').value = info.event.backgroundColor;
                    document.getElementById('titulo').textContent = 'Modifica el evento';
                    modalNew.show();
                },
                    events: {
                    url: 'selectEvents.php',
                    method: 'POST',
                    failure: function(){
                        alert('Error al cargar los eventos');
                    },
                    evenDataTransform: function(eventData){
                        return{
                        title: eventData.title,
                        start: eventData.start,
                        end: eventData.end,
                        color: eventData.color
                        };
                    }
                    }

                });
                calendar.render();
            
            });

            $('#saveEvent').on('click', function (){
            var title = $('#title').val();
            var start = $('#start').val();
            var end = $('#end').val();
            var color = $('#color').val();
            var color = $('#color').val();
            var id_events = $('#id_events').val();
            $.ajax({
                url: 'insertEvent.php',
                method: 'POST',
                data:{
                title: title,
                start: start,
                end: end,
                color: color,
                id_events: id_events
                },
                success: function (response){
                $('#calendar').fullCalendar('refetchEvents');
                },
                error: function(error){
                console.log(error);
                }
            });
            });

            $('#btnEliminar').on('click', function (){
            var id = $('#id').val();
            var title = $('#title').val();
            var start = $('#start').val();
            var end = $('#end').val();
            var color = $('#color').val();
            var id_events = $('#id_events').val();
            $.ajax({
                url: 'deleteEvent.php',
                method: 'POST',
                data:{
                id: id,
                title: title,
                start: start,
                end: end,
                color: color,
                id_events: id_events
                },
                success: function (response){
                console.log('feliz');
                },
                error: function(error){
                console.log(error);
                }
            });
            });

            $('#editEvent').on('click', function (){
            var id = $('#id').val();
            var title = $('#title').val();
            var start = $('#start').val();
            var end = $('#end').val();
            var color = $('#color').val();
            var id_events = $('#id_events').val();
            // console.log('feliz');
            $.ajax({
                url: 'editEvent.php',
                method: 'POST',
                data:{
                id: id,
                title: title,
                start: start,
                end: end,
                color: color,
                id_events: id_events
                },
                success: function (response){
                // console.log(response);
                },
                error: function(error){
                console.log(error);
                }
            });
            });

            $.ajax({
    url: 'deleteEvent.php',
    method: 'POST',
    data: {
        id: id
    },
    success: function (response) {
        var data = JSON.parse(response);
        if (data.success) {
            Swal.fire({
                title: '¡Evento eliminado!',
                text: data.message,
                icon: 'success'
            }).then(function() {
                Location('../template/dashboard.php');
            });
        } else {
            Swal.fire({
                title: 'Error',
                text: data.message,
                icon: 'error'
            });
        }
    },
    error: function (error) {
        console.log(error);
    }
});


    </script>
    <style>
        :root{
        --fc-button-text-color: white;
        --fc-button-bg-color: #000;
        --fc-button-border-color: #000;
        --fc-button-hover-bg-color: #000;
        --fc-button-hover-border-color: #000;
        --fc-button-active-bg-color: #000;
        --fc-button-active-border-color: #000;
        --fc-list-event-dot-width: 10px;
  --fc-list-event-hover-bg-color: #f5f5f5;
}
    </style>
