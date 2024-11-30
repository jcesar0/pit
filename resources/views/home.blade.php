@extends('layout')

@section('content')

    <h1>MANUTENÇÕES PREVISTAS PARA OS PRÓXIMOS 7 DIAS</h1>

    @if ($weekMaintenances->count() <= 0)
        Nenhuma manutenção prevista
    @endif

    <div class="row">
        @foreach($weekMaintenances as $vehicle)
            <div class="card m-2 text-center" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"> {{ $vehicle->name }} </h5>
                    <p class="card-text">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Tipo</th>
                                <th scope="col">Dias</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vehicle->week_maintenances as $maintenance)
                                <tr>
                                    <td>{{ $maintenance->name }}</td>
                                    <td>{{ $maintenance->days_remaining }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </p>

                </div>
            </div>
        @endforeach
    </div>



@endsection
