<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" />

    {{--  Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

    {{-- Charts --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>


    <div class="container-fluid p-3 bg-body-tertiary" style="position: absolute; top:0; left:0; width: 100%; z-index:1;">
        <a class="nav-link" style="color: var(--green-accent);" aria-current="page" href="{{ route('profile') }}">
            <i class="fas fa-arrow-left me-1"></i>Profile</a>
    </div>


    <div class="container d-flex justify-content-center align-items-center min-vh-100 mt-5">
        <div class="border-2 rounded-3 p-3 bg-white shadow" style="min-width: 300px; ">

            <div class="col-md right-box">
                <div class="row align-items-center justify-content-center">
                    <div class="header-text align-content-between mb-4">
                        <h2 class="text-center">Your GreenActions History</h2>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <canvas id="myChart" height="300"></canvas>
                        </div>
                    </div>
                  

                    <div class="container mt-3">
                        <h3>History</h3>

                        @foreach ($actions as $action)
                        <div class="container">
                            <div class="row mb-md-3 mb-3">
                                <div class="col-lg">
                                    <p>Green Action: {{ $action->getGreenAction->action_name }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <p> Points: {{ $action->points }} <br></p>
                                </div>
                                <div class="col-lg-3">
                                    <p>Date: {{ $action->updated_at->format('H:i:s d-m-Y') }}</p>
                                </div>
                               
                            </div>
                        </div>
                    @endforeach
                    </div>
                  
                </div>
            </div>
        </div>
    </div>


    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    {{-- Chart --}}
    <script>
        var accumulatedPointsByDate = @json($accumulatedPointsByDate);

        // Extract dates and points
        var dates = Object.keys(accumulatedPointsByDate);
        var totalPoints = Object.values(accumulatedPointsByDate);


        // Chart.js config
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Accumulated Points',
                    data: totalPoints,
                    backgroundColor: 'rgba(3, 191, 91, 0.2)',
                    borderColor: 'rgba(3, 191, 91, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
        maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Total Points'
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Date'
                        }
                    }]
                }
            }
        });
    </script>
    
</body>
</html>
