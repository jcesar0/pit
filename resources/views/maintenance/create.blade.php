@extends('layout')

@section('content')
    @include('components.errors')
    @include('components.success-alert')

    <div class="d-flex justify-content-center">
        <form action="{{ route('maintenances_post', ['vehicleId' => $vehicle->id]) }}" METHOD="POST">
            <h1>Nova manutenção do veículo {{ $vehicle->name }}</h1>
            @csrf
            <div class="form-floating mb-3 col-auto">
                <input type="text" class="form-control" id="floatingName" name="name" required>
                <label for="floatingInput">Tipo de manutençao</label>
            </div>
            <div class="form-floating mb-3 col-auto">
                <input type="number" class="form-control" id="floatingDaysRemaining" name="days_remaining" required>
                <label for="floatingDaysRemaining">Tempo em dias</label>
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary form-control">Agendar</button>
            </div>
        </form>
    </div>
@endsection
