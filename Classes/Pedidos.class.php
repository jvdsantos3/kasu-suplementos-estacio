<?php

class Pedidos {
    
    public function clientData() 
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbName = "kasu_project";

        //Conexão com o banco
        $conn = new mysqli($servername, $username, $password, $dbName);

        if ($_SESSION) {
            $userId = $_SESSION['usr_id'];

            $sql = "SELECT * FROM users WHERE usr_id = $userId";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($usrData = $result->fetch_assoc()) {
                    echo '
                        <input type="hidden" name="usr_id" value="' . $usrData['usr_id'] .'">
                        <div class="form-floating mb-3">
                            <input type="text" name="usr_name" id="nomeUsuario" class="form-control inputBox" value="' . $usrData['usr_name'] . '" placeholder="Nome do produto" readonly>
                            <label for="nomeProduto">Nome:</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="usr_email" id="emailUsuario" class="form-control inputBox" value="' . $usrData['usr_email'] . '" placeholder="Ex: Melhor Custo-Benefício" readonly>
                            <label for="descricaoProduto">E-mail:</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="usr_phone" id="telefoneUsuario" class="form-control inputBox" value="' . $usrData['usr_phone'] . '" placeholder="Ex: 50.00" readonly>
                            <label for="precoProduto">Telefone:</label>
                        </div>';
                }
            }
        }
    }

    public function productData() 
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbName = "kasu_project";

        //Conexão com o banco
        $conn = new mysqli($servername, $username, $password, $dbName);

        
        $pdcId = $_POST['pdc_id'];

        $sql = "SELECT * FROM products WHERE pdc_id = $pdcId";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($pdcData = $result->fetch_assoc()) {
                echo '
                    <input type="hidden" name="pdc_id" value="' . $pdcData['pdc_id'] .'">
                    <div class="form-floating mb-3">
                        <input type="text" name="pdc_name" id="nomeProduto" class="form-control inputBox" value="' . $pdcData['pdc_name'] . '" placeholder="Nome do produto" readonly>
                        <label for="nomeProduto">Nome:</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="pdc_desc" id="descProduto" class="form-control inputBox" value="' . $pdcData['pdc_desc'] . '" placeholder="Ex: Melhor Custo-Benefício" readonly>
                        <label for="descProduto">Descrição:</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="pdc_price" id="precoProduto" class="form-control inputBox" value="' . $pdcData['pdc_price'] . '" placeholder="Ex: 50.00" readonly>
                        <label for="precoProduto">Preço:</label>
                    </div>';
            }
        }
    }

    public function returnPedido ()
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbName = "kasu_project";

        //Conexão com o banco
        $conn = new mysqli($servername, $username, $password, $dbName);

        $usrId = $_SESSION['usr_id'];

        $sql = "SELECT * FROM orders 
                INNER JOIN users ON orders.ord_usr_id = users.usr_id
                INNER JOIN products ON orders.ord_pdc_id = products.pdc_id
                WHERE orders.ord_usr_id = $usrId";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while($usrData = $result->fetch_assoc()) {
                echo "<tr>
                        <th scope='row'>" . $usrData['ord_id'] . "</th>
                        <td>" . $usrData['usr_name'] . "</td>
                        <td>" . $usrData['pdc_name'] . "</td>
                        <td>" . $usrData['pdc_price'] . "</td>
                        <td>" . $usrData['usr_email'] . "</td>
                    </tr>";
            }
        }
    }
    public function insertPedido ()
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbName = "kasu_project";

        //Conexão com o banco
        $conn = new mysqli($servername, $username, $password, $dbName);

        $usrId = $_SESSION['usr_id'];
        $pdcId = $_POST['pdc_id'];

        $sql = "INSERT INTO orders (ord_pdc_id, ord_usr_id) VALUES ($pdcId, $usrId); ";

        $conn->query($sql);
    }
}