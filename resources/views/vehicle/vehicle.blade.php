@extends('layout')

@section('content')
    @include('components.success-alert')
    @include('components.errors')

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newVehicleModal">
        + Adicionar novo veículo
    </button>


    <div class="modal fade" id="newVehicleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newVehicleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newVehicleModalLabel">Novo veículo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('vehicle.create')
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3 justify-content-center">
        @foreach($vehicles as $vehicle)
            <div class="card m-2 text-center" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $vehicle->name }} <span class="badge rounded-circle bg-primary">{{ $vehicle->maintenances->count() }}</span>
                    </h5>
                    <p class="card-text">
                        <b>Marca: </b> {{ $vehicle->brand }}
                        <b>Versão: </b> {{ $vehicle->version }}
                    </p>

                    <a href="{{ route('maintenances', ['vehicleId' => $vehicle->id]) }}" class="btn btn-outline-primary form-control mb-2"> Agendar manutenção </a>
                    <a href="{{ route('vehicleEdit',  $vehicle->id) }}" class="btn btn-outline-warning form-control mb-2"> Editar </a>
                    <form action="{{ route('vehicle_delete', ['id' => $vehicle->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger form-control mb-2"> Excluir </button>
                    </form>
                    <a class="btn btn-outline-dark form-control" data-bs-toggle="collapse" href="#collapseCard-{{$vehicle->id}}" role="button" aria-expanded="false" aria-controls="collapseCard-{{$vehicle->id}}">
                        Ver manutenções
                    </a>
                </div>
                <hr>
                <div class="collapse" id="collapseCard-{{$vehicle->id}}">
                    @if($vehicle->maintenances->count() <= 0)
                        Nenhuma manutenção prevista
                    @else
                        <table class="table table-striped">
                            <thead>
                            <th>Tipo</th>
                            <th>Dias</th>
                            <th>Ações</th>
                            </thead>

                            <tbody>
                            @foreach($vehicle->maintenances as $maintenance)
                                <tr>
                                    <td> {{ \Illuminate\Support\Str::limit($maintenance->name, 15) }} </td>
                                    <td> {{ $maintenance->days_remaining }} </td>
                                    <td>
                                        <form action="{{ route('maintenances_delete', ['vehicleId' => $vehicle->id, 'maintenanceId' => $maintenance->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger mb-1">EXCLUIR</button>
                                        </form>
                                        <a href="{{ route('maintenancesEdit', ['vehicleId' => $vehicle->id, 'maintenanceId' => $maintenance->id]) }}" class="text-decoration-none btn btn-sm btn-outline-warning">EDITAR</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

@endsection
