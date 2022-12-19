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
    <!-- title -->
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Registro</h1>
        </div>
    </div>
    <div class="mt-5">
        <form action="includeregister.php" method="POST">
            <div class="form-outline mb-4">
                <input type="text" id="form2Example1" class="form-control"  name="inputNome" id="inputNome" required/>
                <label class="form-label" for="form2Example1">Nome</label>
            </div>

            <div class="form-outline mb-4">
                <input type="text" id="form2Example1" class="form-control"  name="inputTelefone" id="inputTelefone" required/>
                <label class="form-label" for="form2Example1">Telefone</label>
            </div>

            <div class="form-outline mb-4">
                <input type="text" id="form2Example1" class="form-control"  name="inputEndereco" id="inputEndereco" required/>
                <label class="form-label" for="form2Example1">Endereço</label>
            </div>

            <div class="form-outline mb-4">
                <input type="text" id="form2Example1" class="form-control"  name="inputCidade" id="inputCidade" required/>
                <label class="form-label" for="form2Example1">Cidade</label>
            </div>

            <div class="form-outline mb-4">
                <input type="email" id="form2Example1" class="form-control"  name="inputEmail" id="inputEmail" required/>
                <label class="form-label" for="form2Example1">Email</label>
            </div>

            <div class="form-outline mb-4">
                <input type="password" id="form2Example2" class="form-control"  name="inputSenha" id="inputSenha" required/>
                <label class="form-label" for="form2Example2">Senha</label>
            </div>

            <div class="form-outline mb-4">
                <input type="password" id="form2Example2" class="form-control"  name="inputConfirmSenha" id="inputConfirmSenha" required/>
                <label class="form-label" for="form2Example2">Confirme a senha</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
        </form>
    </div>
</div>