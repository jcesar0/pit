@extends('layout')

@section('content')
    <div class="d-flex justify-content-center">
        <form action="{{ route('vehicle_put', ['id' => $vehicle->id]) }}" METHOD="POST">
            <h1>Alterar veículo {{ $vehicle->name }}</h1>
            @csrf
            @method('PUT')
            <div class="form-floating mb-3 col-auto">
                <input type="text" class="form-control" id="floatingName" name="name" value="{{ $vehicle->name }}" required>
                <label for="floatingInput">Modelo</label>
            </div>
            <div class="form-floating mb-3 col-auto">
                <input type="text" class="form-control" id="floatingBrand" name="brand"  value="{{ $vehicle->brand }}" required>
                <label for="floatingPassword">Marca</label>
            </div>
            <div class="form-floating mb-3 col-auto">
                <input type="text" class="form-control" id="floatingVersion" name="version" value="{{ $vehicle->version }}" required>
                <label for="floatingPassword">Versão</label>
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary form-control">Salvar</button>
            </div>
        </form>
    </div>
@endsection
