<?php

$clientes = new Clientes();

if (isset($_POST['login'])) {
    $clientes->usrLogin();
}
?>

<section class="row d-flex justify-content-center align-items-center">
    <div class="col-6">
        <div class="row d-flex justify-content-center p-5">
            <p class="title">Kasu Suplementos</p>
            <h3>A Kasu Suplementos é uma loja focada na venda de suplementos, medicamentos, e assesorios da melhor
                qualidade. Sempre visando o melhor para <b>VOCÊ</b>.</h3>
        </div>
    </div>
    <div class="col-6 d-flex justify-content-center">
        <form method="post" class="formulario_login bg-white rounded modal-body p-5">
            <fieldset class="formulario__area">
                <br>
                <div class="form-floating">
                    <input type="email" name="email" id="email" class="form-control inputBox" required>
                    <label class="labelInput" for="email">E-mail</label>
                </div>
                <br>
                <div class="form-floating">
                    <input type="password" name="password" id="password" class="form-control inputBox" required>
                    <label class="labelInput" for="password">Senha</label>
                </div>
                <br>
                <button id="submit" type="submit" name="login" class="btn btn-success btn-lg form-control">Entrar</button>
            </fieldset>
            <hr class="opacity-25 mt-4">
            <div class="d-flex justify-content-center">
                <a href="" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalCadastro">Criar
                    nova conta</a>
            </div>
        </form>
    </div>
</section>

<div class="modal fade" id="modalCadastro" tabindex="-1" aria-labelledby="labelModalCadastro" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="labelModalCadastro">Cadastre-se</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <section id="#cadastro">
                    <div class="d-flex col-12 justify-content-center">
                        <form id="form">
                            <fieldset class="cadastro mb-3">
                                <legend class=" mb-1"><strong>Cadastro</strong></legend>

                                <div class="form-floating mb-3">
                                    <input type="text" name="usr_name" id="usr_name" class="form-control inputBox"
                                        placeholder="Nome Completo">
                                    <label for="usr_name">Nome completo</label>
                                    <i class="fa fa-remove" hidden></i>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="usr_email" id="usr_email" class="form-control inputBox"
                                        placeholder="name@example.com">
                                    <label class="labelInput" for="usr_email">E-mail</label>
                                    <i class="fa" hidden></i>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" name="usr_password" id="usr_password"
                                        class="form-control inputBox" placeholder="Ex: 123441">
                                    <label class="labelInput" for="usr_password">Senha</label>
                                    <i class="fa" hidden></i>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" name="ConfirmSenha" id="confirmSenha"
                                        class="form-control inputBox" placeholder="Confirme senha">
                                    <label class="labelInput" for="ConfirmSenha">Confirme sua senha</label>
                                    <i class="fa" hidden></i>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="tel" name="usr_phone" id="usr_phone" class="form-control inputBox"
                                        placeholder="(99) 99999-9999">
                                    <label class="labelInput" for="usr_phone">Telefone</label>
                                    <i class="fa" hidden></i>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="usr_birthdate">Data de nascimento</label>
                                    <input type="date" name="usr_birthdate" id="usr_birthdate"
                                        class="form-control inputBox" placeholder="DD/MM/YYYY">
                                    <i class="fa" hidden></i>
                                </div>

                                <label for="usr_gender" class="mr-3">Sexo</label>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" id="feminino" class="btn-check" name="usr_gender"
                                        value="Feminino" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="feminino">Feminino</label>

                                    <input type="radio" id="masculino" class="btn-check" name="usr_gender"
                                        value="Masculino" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="masculino">Masculino</label>

                                    <input type="radio" id="outro" class="btn-check" name="usr_gender" value="Outro"
                                        autocomplete="off">
                                    <label class="btn btn-outline-primary" for="outro">Outro</label>
                                </div>

                            </fieldset>
                            <input type="button" value="Cadastrar-se" name="signup" id="sigup" onclick="enviarDados()" class="btn btn-success float-end">
                        </form>
                    </div>
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Criar</button>
            </div>
        </div>
    </div>
</div>

<?php const SCRIPT ="<script src='assets/js/cadastro.js'></script>";?>