<h1 class="text-center">Registro</h1>
<div class="d-flex justify-content-center text-center">
    <form action="registrarUsuario" class="p-5 bg-light" method="POST" id="guardar-registro">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
                <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre" required>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </span>
                </div>
                <input type="email" class="form-control" placeholder="Email" id="email" name="email" required>
            </div>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>   
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
                <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
