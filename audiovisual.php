<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wisth=device-width, initial-escale=1.0">
    <title>Audiovisual</title>
    <!-- bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- CSS -->
    <link href="public/css/styleaudiovisual.css" rel="stylesheet">
    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <!-- Calendario -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="calendar/fonts/icomoon/style.css">
    <link href='calendar/fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='calendar/fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    <link rel="stylesheet" href="calendar/css/bootstrap.min.css">
    <link rel="stylesheet" href="calendar/css/style.css">

    </head>
    <body>
        <?php include('componentes/navbar.php');?>
        <h1>Sala Audiovisual</h1>
        <hr style="width:20%; border: 10px;">

        <div id="botones">
            <button class="button" style="vertical-align:middle" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg style="width:20%; fill:white;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg><br>Nueva cita </button>
            <button class="button" style="vertical-align:middle"><svg style="width:20%; fill:white;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.8 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg><br>Editar cita </button>
            <button id="botonEliminar"class="button" style="vertical-align:middle"><svg style="width:20%; fill:white;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/></svg><br>Eliminar cita </button>
            <?php include('componentes/Modales/modales.php');?>
        </div>

        <div id="calendario">
            <h2>Calendario</h2>
            <div id='calendar-container'>
                <div id='calendar'></div>
            </div>
        </div>

        <div id="bitacora">
            <h2>Bitacora</h2>
            <table id="bitacoraTabla" class="display">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Nombre Evento</th>
                        <th>Fecha(s)</th>
                        <th>Hora</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    require_once 'config/conexion.php';
                    $query = $conn -> query("SELECT * FROM audiovisual");
                    while($audioVisual = $query->fetch_assoc()){
                        echo "
                            <tr>
                                <td>".$audioVisual["Folio"]."</td>
                                <td>".utf8_encode($audioVisual["Titulo"])."</td>
                                <td>".$audioVisual["FechaInicio"]."/".$audioVisual["FechaFin"]."</td>
                                <td>".$audioVisual["HoraInicio"]."/".$audioVisual["HoraFin"]."</td>
                                <td><button class='Acciones'>Información <svg style='height: 25px;' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 192 512'><path d='M144 80c0 26.5-21.5 48-48 48s-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48zM0 224c0-17.7 14.3-32 32-32H96c17.7 0 32 14.3 32 32V448h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H64V256H32c-17.7 0-32-14.3-32-32z'/></svg></button>
                                <button class='Acciones'>Editar <svg style='height: 25px;' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><path d='M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.8 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z'/></svg></button>
                                <button class='Acciones'>Archivar <svg style='height: 25px;' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><path d='M32 32H480c17.7 0 32 14.3 32 32V96c0 17.7-14.3 32-32 32H32C14.3 128 0 113.7 0 96V64C0 46.3 14.3 32 32 32zm0 128H480V416c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V160zm128 80c0 8.8 7.2 16 16 16H336c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z'/></svg></button>
                                </td>
                            </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>

    <script>
    $(document).ready( function () {
        $('#bitacoraTabla').DataTable();
    } );
    </script>
    <!-- <script src="calendar/js/jquery-3.3.1.min.js"></script>
    <script src="calendar/js/popper.min.js"></script>
    <script src="calendar/js/bootstrap.min.js"></script>
    <script src='calendar/fullcalendar/packages/list/main.js'></script> -->

    <script src='calendar/fullcalendar/packages/core/main.js'></script>
    <script src='calendar/fullcalendar/packages/interaction/main.js'></script>
    <script src='calendar/fullcalendar/packages/daygrid/main.js'></script>
    <script src='calendar/fullcalendar/packages/timegrid/main.js'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
        height: 'parent',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        defaultView: 'dayGridMonth',
        defaultDate: '2023-01-25',
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: [
            <?php 
                require_once 'config/conexion.php';
                $query = $conn -> query("SELECT * FROM audiovisual");
                while($calendario = $query->fetch_assoc()){
                    echo "
                        {
                            title:'".utf8_encode($calendario["Titulo"])."',
                            start:'".$calendario["FechaInicio"]."T".$calendario["HoraInicio"]."',
                            end:'".$calendario["FechaFin"]."T".$calendario["HoraFin"]."',
                        },
                    ";
                }
            ?>
        ]
        });

        calendar.render();
        });

    </script>

    <script src="js/main.js"></script>
    
</html>