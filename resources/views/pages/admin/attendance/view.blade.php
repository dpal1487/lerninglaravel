<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Calendar</title>
    <style>
        /* Set the calendar container height and width */
        #calendar {
            height: auto;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
</head>
<body>
    <div class="card h-100">
        <!--begin::Card header-->
        <div class="card-header align-items-center d-flex justify-content-between">
            <!-- Left side content -->
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <!-- Content on the left side -->
                    <span style="font-size: 20px; ">Agent Name : {{ $agent->name }}</span>
                </div>
            </div>
            <!-- Right side content -->
            <div class="card-toolbar">
                <!-- Content on the right side -->
                <a href="{{ route('attendance.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body overflow-auto h-100">
        <div id="calendar"></div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var attendanceArray = @json($attendanceArray);

            $('#calendar').fullCalendar({
                height: 'auto', // Set to 'auto' to allow the calendar to adjust its height based on its content
                events: [
                    @foreach($attendanceArray as $date => $status)
                    {
                        title: '{{ $status }}',
                        start: '{{ $date }}',
                        color: '{{ $status === "full_day" ? "#28a745" : ($status === "half_day" ? "#ffc107" : "#dc3545") }}'
                    },
                    @endforeach
                ]
            });
        });
    </script>
</body>
</html>
