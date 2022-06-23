<?php

$pedidos = new Pedidos();

if (isset($_POST['submit'])) {
    $pedidos->insertPedido();
}
?>

<section>
        <form method="post" id="form" action="/carrinho">
            <fieldset class="cadastro mb-3">
                <legend class=" mb-2"><strong>Pedido</strong></legend>
                <?php 
                    $pedidos = new Pedidos();
                    $pedidos->productData();
                ?>
                <br>
                <?php 
                    $pedidos = new Pedidos();
                    $pedidos->clientData();
                ?>
            </fieldset>
            <button type="submit" name="submit" data-bs-target="#confirmarCadastro" class="btn btn-primary float-end">Salvar produto</button>
        </form>
</section>