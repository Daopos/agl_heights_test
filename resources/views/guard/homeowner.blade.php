@extends('layouts.guardlayout')

@section('styles')
    <link href="{{ asset('/css/adminlist.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">List of HomeOwners</h1>

        <div class="p-2 w-25">
            <form action="{{ route('admin.homeownerlist') }}" method="GET" class="d-flex mb-3">
                <input type="text" name="search" class="form-control me-2" placeholder="Search by name or email" aria-label="Search" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">HomeOwners</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Phase</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($homeowners as $homeowner)
                        <tr>
                            <td>{{ $homeowner->fname }} {{ $homeowner->lname }}</td>
                            <td>{{ $homeowner->position }}</td>
                            <td>{{ $homeowner->phase }}</td>
                            <td>{{ $homeowner->email }}</td>
                            <td>{{ $homeowner->phone }}</td>
                            <td>
                                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#vehiclesModal{{ $homeowner->id }}">Vehicles</button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#visitorsModal{{ $homeowner->id }}">Visitors</button>
                            </td>
                        </tr>

                       <!-- Modal for Vehicles -->
                       <div class="modal fade" id="vehiclesModal{{ $homeowner->id }}" tabindex="-1" aria-labelledby="vehiclesModalLabel{{ $homeowner->id }}" aria-hidden="true">
                           <div class="modal-dialog modal-dialog-centered">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <h5 class="modal-title" id="vehiclesModalLabel{{ $homeowner->id }}">Vehicles of {{ $homeowner->fname }} {{ $homeowner->lname }}</h5>
                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body">
                                       @if ($homeowner->vehicles->isEmpty())
                                           <p>No vehicles found for this homeowner.</p>
                                       @else
                                           <ul class="list-group">
                                               @foreach ($homeowner->vehicles as $vehicle)
                                                   <li class="list-group-item">
                                                       <strong>Brand:</strong> {{ $vehicle->brand ?? 'N/A' }}<br>
                                                       <strong>Model:</strong> {{ $vehicle->model ?? 'N/A' }}<br>
                                                       <strong>Color:</strong> {{ $vehicle->color ?? 'N/A' }}<br>
                                                       <strong>Plate Number:</strong> {{ $vehicle->plate_number ?? 'N/A' }}
                                                   </li>
                                               @endforeach
                                           </ul>
                                       @endif
                                   </div>
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <!-- Modal for Visitors -->
                       <div class="modal fade" id="visitorsModal{{ $homeowner->id }}" tabindex="-1" aria-labelledby="visitorsModalLabel{{ $homeowner->id }}" aria-hidden="true">
                           <div class="modal-dialog modal-dialog-centered">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <h5 class="modal-title" id="visitorsModalLabel{{ $homeowner->id }}">Visitors of {{ $homeowner->fname }} {{ $homeowner->lname }}</h5>
                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body">
                                       @if ($homeowner->visitors->isEmpty())
                                           <p>No visitors found for this homeowner.</p>
                                       @else
                                           <ul class="list-group">
                                               @foreach ($homeowner->visitors as $visitor)
                                                   <li class="list-group-item">
                                                       <strong>Name:</strong> {{ $visitor->name }}<br>
                                                       <strong>Brand:</strong> {{ $visitor->brand ?? 'N/A' }}<br>
                                                       <strong>Model:</strong> {{ $visitor->model ?? 'N/A' }}<br>
                                                       <strong>Color:</strong> {{ $visitor->color ?? 'N/A' }}<br>
                                                       <strong>Plate Number:</strong> {{ $visitor->plate_number ?? 'N/A' }}<br>
                                                       <strong>RFID:</strong> {{ $visitor->rfid ?? 'N/A' }}<br>
                                                       <strong>Relationship:</strong> {{ $visitor->relationship ?? 'N/A' }}<br>
                                                       <strong>Date of Visit:</strong> {{ $visitor->date_visit ?? 'N/A' }}<br>
                                                       <strong>Number of Visitors:</strong> {{ $visitor->number_vistiors ?? 'N/A' }}<br>
                                                       <strong>Status:</strong> {{ ucfirst($visitor->status) }}
                                                   </li>
                                               @endforeach
                                           </ul>
                                       @endif
                                   </div>
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                   </div>
                               </div>
                           </div>
                       </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection