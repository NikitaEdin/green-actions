@extends('layout.layout')
{{-- @section('title', 'Profile') --}}

@section('content')


    <title>Admin Panel</title>


    <body style="background-color: whitesmoke;">
       
        
        <div class="row vw-100">
            <div class="col-auto m-3">
                {{-- Admin Menu --}}
                <h5>Admin Menu</h5>
                    <ul style="list-style-type: none;" class="mx-0 px-0">
                        <li><a class="dropdown-item dropdown-item-admin" data-target="dashboard" href="#">Admin Dashboard</a></li>
                        <li><a class="dropdown-item dropdown-item-admin" data-target="users" href="#">Users</a></li>
                        <li><a class="dropdown-item dropdown-item-admin" href="#">Coming soon</a></li>
                    </ul>
            </div>

            {{-- Main content --}}
            <div class="col">
                {{-- Dashboard --}}
                <div id="dashboard" class="panel">
                    <h1>Admin Dashboard</h1>
                    <p>Welcome to the Admin Dashboard!</p>

                    {{-- Stat Sections --}}
                    <section id="greenAction">
                        <div class="row d-flex justify-content-start">
                            {{-- Stat --}}
                            <div class="col-auto me-2 mt-2" style="border-radius: 1rem; outline: 1.5px solid var(--green-accent); background-color: rgba(3, 191, 91, 0.05);">
                                <div class="container mt-2">
                                <div class="d-flex justify-content-center">
                                    <div class="col-1 d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-user" style="color:  rgba(3, 191, 91, 1); font-size: 1.5rem;"></i>    
                                    </div>
                                    <div class="col d-flex flex-column justify-content-end text-center">
                                        <h4 class="p-0 m-0">Accounts</h4>
                                        <p class="">{{ $stat_totalAccounts }}</p>
                                    </div>
                                </div>
                                </div>
                            </div>

                             {{-- Stat --}}
                             <div class="col-auto me-2 mt-2" style="border-radius: 1rem; outline: 1.5px solid var(--green-accent); background-color: rgba(3, 191, 91, 0.05);">
                                <div class="container mt-2">
                                <div class=" d-flex justify-content-center">
                                    <div class="col-1 d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-star" style="color:  rgba(3, 191, 91, 1); font-size: 1.5rem;"></i>    
                                    </div>
                                    <div class="col d-flex flex-column justify-content-end text-center">
                                        <h4 class="p-0 m-0">Green Points</h4>
                                        <p class="">{{ $stat_totalGreenPoints }}</p>
                                    </div>
                                </div>
                                </div>
                            </div>

                             {{-- Stat --}}
                             <div class="col-auto me-2 mt-2" style="border-radius: 1rem; outline: 1.5px solid var(--green-accent); background-color: rgba(3, 191, 91, 0.05);">
                                <div class="container mt-2">
                                <div class=" d-flex justify-content-center">
                                    <div class="col-1 d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-crown" style="color:  rgba(3, 191, 91, 1); font-size: 1.5rem;"></i>    
                                    </div>
                                    <div class="col d-flex flex-column justify-content-end text-center">
                                        <h4 class="p-0 m-0">Green Accounts</h4>
                                        <p class="">{{ $stat_totalGreenAccounts }}</p>
                                    </div>
                                </div>
                                </div>
                            </div>

                             {{-- Stat --}}
                             <div class="col-auto me-2 mt-2" style="border-radius: 1rem; outline: 1.5px solid var(--green-accent); background-color: rgba(3, 191, 91, 0.05);">
                                <div class="container mt-2">
                                <div class=" d-flex justify-content-center">
                                    <div class="col-1 d-flex justify-content-center align-items-center">
                                        <i class="fa-solid fa-coins" style="color:  rgba(3, 191, 91, 1); font-size: 1.5rem;"></i>    
                                    </div>
                                    <div class="col d-flex flex-column justify-content-end text-center">
                                        <h4 class="p-0 m-0">Donations</h4>
                                        <p class="">{{ $stat_totalDonations }}</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    {{-- Controls --}}
                    <section id="controls">
                        <div class="row mt-5">
                            <h5>Admin Controls</h5>
                            <div class="col mt-3">
                                <form action="{{ route('admin.reset-green-actions') }}" method="post">
                                    @csrf
                                    <p>Remove all GreenActions from all users.</p>
                                    <a class="btn btn-outline-danger" href="" data-toggle="modal" data-target="#confirmationModal">Reset ALL GreenActions</a>

                                    <div class="alert alert-warning mt-2 col-4" role="alert">
                                        Warning: Execute once a year to reset ALL progress by ALL accounts.
                                    </div>

                                     {{-- Success message --}}
                                        @if (session()->has('success'))
                                        <div class="mt-2 col-4">
                                            <div class="row">
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    {{ session('success') }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                </form>
                            </div>
                           
                        </div>
                        
                    </section>
                </div>

                {{-- Users --}}
                <div id="users" class="panel" style="display: none">
                    <h1>Users</h1>
                    @livewire('admin-user-edit')
                </div>
            </div>
        </div>

        <!-- Empty spacer -->
        <div style="padding-top: 20rem;"></div>




       <!-- Modal -->
        <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to reset ALL GreenActions?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" id="confirmResetButton" href="{{ route('admin.reset-green-actions') }}">Reset</a>
                    </div>
                </div>
            </div>
        </div>



        @livewireScripts
    </body>

    {{-- Admin menu buttons to switch panels --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuItems = document.querySelectorAll('.dropdown-item-admin');
            menuItems.forEach(item => {
                item.addEventListener('click', function (event) {
                    event.preventDefault();
                    const targetId = this.getAttribute('data-target');
                    const panels = document.querySelectorAll('.panel');
                    panels.forEach(panel => {
                        if (panel.id === targetId) {
                            panel.style.display = 'block';
                        } else {
                            panel.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>


    {{--  Confirmation message--}}
    <script>
        $('#confirmationModal').on('show.bs.modal', function (event) {
            var href = "{{ route('admin.reset-green-actions') }}"; // Get the route
            $('#confirmResetButton').attr('href', href); // Update the href of the confirmation button
        });
    </script>
@endsection
