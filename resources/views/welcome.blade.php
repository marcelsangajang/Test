<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Webagenda 2.0
                </div>
                
                <h1>INITIALIZATION</h1>
                <div class="links">
                    <a href="/Test">Setup initial data</a>
                </div>

                <h1>EMPLOYEES</h1>
                <div class="links">
                
                    <a href="/EmployeeView">Create Employee</a>
                </div>
                <br>
                <h1>CHAIRS</h1>
                <div class="links">
                    <a href="/ChairView">Create chair</a>
                </div>
                
                <h1>PATIENTS</h1>
                <br>

                <div class="links">
                    <a href="/PatientView">Create patient</a>
                    <a href="/PatientAppointmentView">Create Appointment</a>
                    <a href="/PatientGroupView">Create Patient Group</a>
                </div>
                <br>
                <h1>SCHEDULES</h1>
                <div class="links">
                    <a href="/ScheduleView">Create Schedule</a>
                    <a href="/AgendaPersonalOverview">Get workday schedule</a>
                </div>
            </div>
        </div>
    </body>
</html>
