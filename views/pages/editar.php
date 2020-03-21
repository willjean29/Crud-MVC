<?php 
    if(isset($_GET['id'])){
        $item = 'id';
        $valor = $_GET['id'];
        $usuario = FormController::obtenerUsuario($item,$valor);
    }
?>

<h1 class="text-center">Editar</h1>
<div class="d-flex justify-content-center text-center">
    <form action="actualizarUsuario" class="p-5 bg-light" method="POST" id="guardar-registro">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
                <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre" value="<?php echo $usuario['nombre'] ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </span>
                </div>
                <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="<?php echo $usuario['correo'] ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
                <input type="password" class="form-control" placeholder="Password" id="password" name="password" value="<?php echo $usuario['password'] ?>">
                <input type="hidden" name="id" value="<?php echo $usuario['id'] ?>">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
