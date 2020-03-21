<h1 class="text-center">Ingreso</h1>
<div class="d-flex justify-content-center text-center">
    <form action="#" class="p-5 bg-light" method="POST" id="loguin-registro">
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
