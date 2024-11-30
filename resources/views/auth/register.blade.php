 <form action="{{ route('register_post') }}" METHOD="POST">
    @csrf
    <h1 class="d-flex justify-content-center">Criar Conta</h1>
    <div class="form-floating mb-3 col-auto">
        <input type="text" class="form-control" id="floatingName" name="name" placeholder="Senha" required>
        <label for="floatingName">Nome</label>
    </div>
    <div class="form-floating mb-3 col-auto">
        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
        <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating mb-3 col-auto">
        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
        <label for="floatingPassword">Senha</label>
    </div>

    <div class="col-auto">
        <button type="submit" class="btn btn-primary form-control">Criar Conta</button>
    </div>
</form>
