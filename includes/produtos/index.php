

<main>
    <section class='produtos'>
        <div class='container bg-white mb-4'>
            <div class='row'>
                <ul class='produtos__lista mt-5 mb-5'>
                    <?php
                        $produtos = new Produtos();

                        $produtos->indexProducts();

                        if (isset($_POST['delete']) || isset($_POST['confirm'])) {
                            $produtos->deleteProduct();
                        }     
                    ?>
                </ul>
            </div>
        </div>
    </section>
</main>
<script>

</script>