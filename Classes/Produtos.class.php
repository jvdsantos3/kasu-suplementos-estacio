<?php
include_once __DIR__ ."/../database/connect.php";


class Produtos 
{
    public function indexProducts()
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbName = "kasu_project";

        //Conexão com o banco
        $conn = new mysqli($servername, $username, $password, $dbName);

        $sql = "SELECT * FROM products;";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while($pdcData = $result->fetch_assoc()) {
                $photo = '<img class="card__imagem" src="assets/img/'. $pdcData['pdc_photo'] . '" alt="' . $pdcData['pdc_name'] . '">';

                $view = "<li class='produtos__item'>
                        <div class='card__produto mb-5'>"
                            . $photo . "
                            <h2 class='card__titulo'>" . $pdcData['pdc_name'] . "</h2>
                            <h2 class='card__descricao'>" . $pdcData['pdc_desc'] . "</h2>
                            <h2 class='card__preco'> R$ " . $pdcData['pdc_price'] . "</h2>";
                
                if ($_SESSION) {
                    $view .= "<form method='post' id='my_form' action='/pedido'>
                                    <button type='submit' name='pdc_id' class='card__botao' data-bs-target='#confirmarDelete' value='" . $pdcData['pdc_id'] . "'>Comprar</button>
                            </form>";
                }
                            
                if ($_SESSION) {
                    if ($_SESSION['usr_admin'] == 1) {
                        $view .= "<form method='post' id='form'>
                                    <input type='hidden' name='pdc_name' value='" . $pdcData['pdc_name'] ."'>
                                    <button type='submit' name='delete' class='card__botao' data-bs-target='#confirmarDelete' value='" . $pdcData['pdc_id'] . "'>Remover</button>
                                </form>";
                    }
                }

                $view .= "</div>
                </li>";

                echo $view;
            }
        }

    }

    public function deleteProduct() {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbName = "kasu_project";

        //Conexão com o banco
        $conn = new mysqli($servername, $username, $password, $dbName);

        $name = $_POST['pdc_name'];
        $delete = $_POST['delete'];
        
        if (isset($delete)) {
            $sql = "DELETE FROM products WHERE (pdc_id = $delete)"; 

            
            $result = $conn->query($sql);

            if ($conn->query($sql) === TRUE) {
                echo "<script>$(document).ready(function(){ $('#confirmarDelete').modal('show'); });</script>
                    <div class='modal fade' id='confirmarDelete' role='dialog'>
                        <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-body'>
                                <p>Deseja remover o produto " . $name . " ?</p>
                            </div>
                            <div class='modal-footer'>
                                <a href='/produtos'>
                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Ok</button>
                                </a>
                            </div>
                        </div>
                    </div>";
            }
        }
    }

    public function storeProducts()
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbName = "kasu_project";

        //Conexão com o banco
        $conn = new mysqli($servername, $username, $password, $dbName);

        try {
            $name = $_POST["pdc_name"]; 
            $photo = $_POST["pdc_photo"]; 
            $price = $_POST["pdc_price"];
            $desc = $_POST["pdc_desc"];
            $created = date('Y-m-d H:i:s');

            $sql = "INSERT INTO products (pdc_name, pdc_desc, pdc_price, pdc_photo, pdc_created) VALUES ('$name', '$desc', $price, '$photo', '$created');";
    
            if ($conn->query($sql) === TRUE) {
                echo "<script>$(document).ready(function(){ $('#confirmarCadastro').modal('show'); });</script>
                        <div class='modal fade' id='confirmarCadastro' role='dialog'>
                            <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-body'>
                                <p>Produto cadastrado com sucesso!</p>
                                </div>
                                    <div class='modal-footer'>
                                        <a href='/produtos'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Ok</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>";
            } else {
                echo "Erro: " . $sql . "<br>" . $conn->error;
            }

        } catch (Throwable $th){
            echo $th;
        }
    }


}