<form action="{{ route('login_post') }}" METHOD="POST">
    @csrf
    <h1 class="d-flex justify-content-center">Fazer Login</h1>
    <div class="form-floating mb-3 col-auto">
        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
        <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating mb-3 col-auto">
        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
        <label for="floatingPassword">Senha</label>
    </div>

    <div class="col-auto">
        <button type="submit" class="btn btn-success form-control">Entrar</button>
    </div>
</form>
