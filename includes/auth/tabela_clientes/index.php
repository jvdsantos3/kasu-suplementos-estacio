<section class="tabela__clientes">
    <div class="mx-3">
        <table class="table table-striped bg-light">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Nascimento</th>
                    <th scope="col">Gênero</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $clientes = new Clientes();
                    $clientes->indexClients();
                ?>
            </tbody>
        </table>
    </div>
</section>