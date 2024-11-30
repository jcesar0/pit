<form action="{{ route('vehicle_post') }}" METHOD="POST">
    @csrf
    <div class="form-floating mb-3 col-auto">
        <input type="text" class="form-control" id="floatingName" name="name" required>
        <label for="floatingInput">Modelo</label>
    </div>
    <div class="form-floating mb-3 col-auto">
        <input type="text" class="form-control" id="floatingBrand" name="brand" required>
        <label for="floatingPassword">Marca</label>
    </div>
    <div class="form-floating mb-3 col-auto">
        <input type="text" class="form-control" id="floatingVersion" name="version" required>
        <label for="floatingPassword">Versão</label>
    </div>

    <div class="col-auto">
        <button type="submit" class="btn btn-primary form-control">Cadastrar</button>
    </div>
</form>
