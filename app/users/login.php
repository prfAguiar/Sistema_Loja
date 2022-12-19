<?php
    require_once "../../config.php";
    include "../../public/data.php";

    if(!isset($_SESSION)){
        session_start();
    }

    include "../layouts/header.php";
    include "../layouts/menu-cliente.php";

?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Log-in</h1>
        </div>
    </div>
    <div class="mt-5">
        <form action="verify.php" method="POST">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="form2Example1" class="form-control"  name="inputEmail" id="inputEmail" required/>
                <label class="form-label" for="form2Example1">Email</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="form2Example2" class="form-control"  name="inputSenha" id="inputSenha" required/>
                <label class="form-label" for="form2Example2">Senha</label>
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <!--<div class="col d-flex justify-content-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                        <label class="form-check-label" for="form2Example31"> Lembre de mim </label>
                    </div>
                </div>-->

                <div class="col">
                    <!-- Simple link -->
                    <a href="lostpassword.php">Esqueceu a senha?</a>
                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Log-in</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Não possui uma conta? <a href="register.php">Registre-se</a></p>
            </div>
        </form>
    </div>
</div>