<section class="carrinho">
    <div class="table-responsive">
        <table id="table" class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Número do pedido</th>
                    <th scope="col">Nome do usuario</th>
                    <th scope="col">Nome do produto</th>
                    <th scope="col">Preço</th>
                    <th scope="col">E-mail</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $pedido = new Pedidos();
                    $pedido->returnPedido();
                ?>
            </tbody>
        </table>
    </div>
</section>

<script src="../../../assets/js/produtosTable.js"></script>