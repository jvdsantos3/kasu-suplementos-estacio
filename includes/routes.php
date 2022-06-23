<?php
include_once __DIR__ ."/../Classes/Routes.class.php";
include_once __DIR__ ."/../Classes/Produtos.class.php";
include_once __DIR__ ."/../Classes/Clientes.class.php";
include_once __DIR__ ."/../Classes/Pedidos.class.php";

$rota = new Routes();
$produtos = new Produtos();
$clientes = new Clientes();

// rotas 

$rota->add('/', function(){
    include_once __DIR__ . '/index/index.php';
});

$rota->add('/produtos', function(){
    include_once __DIR__ . '/produtos/index.php';
});

$rota->add('/cadastro', function(){
    include_once __DIR__ . '/auth/cadastro/index.php';
});

$rota->add('/login', function(){
    include_once __DIR__ . '/auth/login/index.php';
});

$rota->add('/cadastro-produto', function(){
    include_once __DIR__ . '/auth/cadastro_produto/index.php';
});

$rota->add('/clientes', function(){
    include_once __DIR__ . '/auth/tabela_clientes/index.php';
});

$rota->add('/carrinho', function(){
    include_once __DIR__ . '/auth/carrinho/index.php';
});

$rota->add('/pedido', function(){
    include_once __DIR__ . '/auth/cadastro_pedido/index.php';
});


$rota->submit();
