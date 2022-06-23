<?php
$clientes = new Clientes();

if (isset($_POST['submit'])) {
    $clientes->addUser();
}
?>

<section id="#cadastro">
    <div class="d-flex col-12 justify-content-center mb-5">
        <form id="form" method="post">
            <fieldset class="cadastro mb-3">
                <legend class=" mb-1"><strong>Cadastro</strong></legend>

                <div class="form-floating mb-3">
                    <input 
                        type="text" 
                        name="usr_name" 
                        id="usr_name" 
                        class="form-control inputBox" 
                        placeholder="Nome Completo" 
                        required
                        >
                    <label for="usr_name">Nome completo</label>
                    <i class="fa fa-remove" hidden></i>
                </div>

                <div class="form-floating mb-3">
                    <input 
                        type="text" 
                        name="usr_email" 
                        id="usr_email" 
                        class="form-control inputBox" 
                        placeholder="name@example.com" 
                        required
                        >
                    <label class="labelInput" for="usr_email">E-mail</label>
                    <i class="fa" hidden></i>
                </div>

                <div class="form-floating mb-3">
                    <input 
                        type="password" 
                        name="usr_password" 
                        id="usr_password" 
                        class="form-control inputBox" 
                        placeholder="Ex: 123441" 
                        required
                        >
                    <label class="labelInput" for="usr_password">Senha</label>
                    <i class="fa" hidden></i>
                </div>

                <div class="form-floating mb-3">
                    <input 
                        type="password" 
                        name="ConfirmSenha" 
                        id="confirmSenha" 
                        class="form-control inputBox" 
                        placeholder="Confirme senha" 
                        required
                        >
                    <label class="labelInput" for="ConfirmSenha">Confirme sua senha</label>
                    <i class="fa" hidden></i>
                </div>
                <div class="form-floating mb-3">
                    <input 
                        type="tel" 
                        name="usr_phone" 
                        id="usr_phone" 
                        class="form-control inputBox" 
                        placeholder="(99) 99999-9999"
                        required 
                        >
                    <label class="labelInput" for="usr_phone">Telefone</label>
                    <i class="fa" hidden></i>
                </div>

                <div class="form-group mb-3">
                    <label for="usr_birthdate">Data de nascimento</label>
                    <input 
                        type="date" 
                        name="usr_birthdate" 
                        id="usr_birthdate" 
                        class="form-control inputBox" 
                        placeholder="DD/MM/YYYY" 
                        required
                        >
                    <i class="fa" hidden></i>
                </div>

                <label for="usr_gender" class="mr-3">Sexo</label>
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input 
                        type="radio" 
                        id="feminino" 
                        class="btn-check"
                        name="usr_gender" 
                        value="Feminino" 
                        autocomplete="off" 
                            >
                    <label class="btn btn-outline-primary" for="feminino">Feminino</label>

                    <input 
                        type="radio" 
                        id="masculino" 
                        class="btn-check"
                        name="usr_gender" 
                        value="Masculino" 
                        autocomplete="off" 
                            >
                    <label class="btn btn-outline-primary" for="masculino">Masculino</label>

                    <input 
                    type="radio" 
                    id="outro" 
                    class="btn-check"
                    name="usr_gender" 
                    value="Outro" 
                    autocomplete="off" 
                        >
                    <label class="btn btn-outline-primary" for="outro">Outro</label>
                </div>

            </fieldset>
            <input 
            type="submit" 
            value="Cadastrar-se" 
            name="submit" 
            id="submit"
            data-bs-target="confirmarCadastroCliente"
            class="btn btn-success float-end
            ">
        </form>
    </div>
</section>

<script src="assets/js/cadastro.js"></script>