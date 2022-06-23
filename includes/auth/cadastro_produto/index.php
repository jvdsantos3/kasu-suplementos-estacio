<?php

$produtos = new Produtos();

if (isset($_POST['submit'])) {
    $produtos->storeProducts();
}
?>

<section id="#cadastro">
    <div class="d-flex col-12 justify-content-center">
        <form method="post" id="form">
            <fieldset class="cadastro mb-3">
                <legend class=" mb-1"><strong>Cadastro de produto</strong></legend>
                <div class="form-floating mb-3">
                    <input type="text" name="pdc_name" id="nomeProduto" class="form-control inputBox" placeholder="Nome do produto">
                    <label for="nomeProduto">Nome:</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="pdc_desc" id="descricaoProduto" class="form-control inputBox" placeholder="Ex: Melhor Custo-Benefício">
                    <label for="descricaoProduto">Descrição:</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="pdc_price" id="precoProduto" class="form-control inputBox" placeholder="Ex: 50.00">
                    <label for="precoProduto">Preço:</label>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="imagemProduto" class="form-label">Imagem:</label>
                        <input type="file" class="form-control" id="imagemProduto" name="pdc_photo">
                    </div>
                </div>
            </fieldset>
            <button type="submit" name="submit" data-bs-target="#confirmarCadastro" class="btn btn-primary float-end">Salvar produto</button>
        </form>
    </div>
</section>
