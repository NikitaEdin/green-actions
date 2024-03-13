@extends('layout.layout')

@section('content')


    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Leaderboards - GreenActions</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


        <style>
            .section-padding {
                padding: 100px 0;
            }
        </style>

    </head>

    <body>

        

        <!-- leaderboards Section -->
        <section id="leaderboards" class="section-padding text-center" style="margin-bottom:4rem;">
            <div class="container">
                <h2 class="green-line">GreenAction Leaderboards</h2>
                <p>Top Performing Users</p>
                <div class="mt-5">

                    {{-- Leaderboards Table --}}
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">User</th>
                            <th scope="col">GreenPoints</th>
                            <th scope="col">GreenStatus</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($topTen as $key => $user)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td><span>{{ $user->displayName() }}</span><a class="ms-2" href="{{ route('user.show', ['id' => $user->id]) }}">(view)</a></td>
                                <td>{{ $user->getGreenPoints() }}</td>
                                <td>
                                    @if($user->hasGreenStatus())
                                        <img src="{{ asset('images/badges/badge-leaf.png') }}" style="width: 30px;" alt="">
                                    @endif
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </section>

        {{-- Stats: total account, total green, total points accumulated --}}
        <section id="greenAction" class="mt-5 py-5 text-center ">
            <div class="container">
                <h2 class="green-line">Green Statistics</h2>

                <div class="row mt-5 py-5">
                    {{-- Left --}}
                    <div class="col-md-4">
                        <div class="p-3" style="border-radius: 1rem; outline: 1.5px solid var(--green-accent);">
                            <h4>Total Accounts</h4>
                            <p class="fs-3">{{ $stat_users }}</p>

                        </div>
                    </div>

                    {{-- Middle --}}
                    <div class="col-md-4">
                        <div class="p-3" style="border-radius: 1rem; outline: 1.5px solid var(--green-accent);">
                            <h4>Accumulated Green Points</h4>
                            <p class="fs-3">{{ $stat_total }}</p>

                        </div>
                    </div>

                    {{-- Right --}}
                    <div class="col-md-4">
                        <div class="p-3" style="border-radius: 1rem; outline: 1.5px solid var(--green-accent);">
                            <h4>Total Green Accounts</h4>
                            <p class="fs-3">{{ $stat_totalStatus }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    </body>

    </html>

@endsection
