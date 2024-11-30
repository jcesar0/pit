@extends('layout')

@section('content')
    <div class="d-flex justify-content-center">
        <form action="{{ route('maintenances_put', ['vehicleId' => $vehicle->id, 'maintenanceId' => $maintenance->id]) }}" METHOD="POST">
            @csrf
            @method('PUT')
            <h1>Alterar manutenção do veículo {{ $vehicle->name }}</h1>
            <div class="form-floating mb-3 col-auto">
                <input type="text" class="form-control" id="floatingName" name="name" value="{{ $maintenance->name }}" required>
                <label for="floatingInput">Tipo de manutençao</label>
            </div>
            <div class="form-floating mb-3 col-auto">
                <input type="number" class="form-control" id="floatingDaysRemaining" name="days_remaining" value="{{ $maintenance->days_remaining }}" required>
                <label for="floatingDaysRemaining">Tempo em dias</label>
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary form-control">Salvar</button>
            </div>
        </form>
    </div>
@endsection
