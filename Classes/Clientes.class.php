<?php
include_once __DIR__ ."/../database/connect.php";

class Clientes {
    public function usrLogin()
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbName = "kasu_project";

        //Conexão com o banco
        $conn = new mysqli($servername, $username, $password, $dbName);

        session_start([
            'cookie_lifetime' => 86400
        ]);

        $email = $_POST["email"]; 
        $password = md5($_POST["password"]);
        
        $sql = "SELECT * FROM users WHERE usr_email='$email' AND usr_password='$password';";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $usrData = $result->fetch_assoc();
            
            $_SESSION['usr_admin'] = $usrData['usr_admin'];
            $_SESSION['usr_id'] = $usrData['usr_id'];
            $_SESSION['usr_name'] = $usrData['usr_name'];
            $_SESSION['usr_email'] = $usrData['usr_email'];
            $_SESSION['usr_phone'] = $usrData['usr_phone'];

            echo "<script>$(document).ready(function(){ $('#confirmarLogin').modal('show'); });</script>
            <div class='modal fade' id='confirmarLogin' role='dialog'>
                <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-body'>
                    <p>Bem-vindo " . $_SESSION['usr_name'] . "!</p>
                    </div>
                        <div class='modal-footer'>
                            <a href='/'>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Ok</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>";
        } else {
            echo "<script>$(document).ready(function(){ $('#confirmarLogin').modal('show'); });</script>
            <div class='modal fade' id='confirmarLogin' role='dialog'>
                <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-body'>
                    <p>Usuário não encontrado!</p>
                    </div>
                        <div class='modal-footer'>
                            <a href='/login'>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Tente novamente</button>
                            </a>
                            <a href='/cadastro'>
                                <button type='button' class='btn btn-default btn-sucess' data-dismiss='modal'>Cadastre-se</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>";
        }      
    }
    
    public function addUser () {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbName = "kasu_project";

        //Conexão com o banco
        $conn = new mysqli($servername, $username, $password, $dbName);

        try {
            $name = $_POST["usr_name"]; 
            $email = $_POST["usr_email"]; 
            $password = md5($_POST["usr_password"]);
            $phone = $_POST["usr_phone"];
            $birthdate = $_POST["usr_birthdate"];
            $gender = $_POST["usr_gender"];
            $created = date('Y-m-d H:i:s');

            $sql = "INSERT INTO users (usr_name, usr_email, usr_password, usr_phone, usr_birthdate, usr_gender, usr_admin, usr_created) VALUES ('$name', '$email', '$password', '$phone', '$birthdate', '$gender', 0, '$created');";
            
            if ($conn->query($sql) === TRUE) {
                echo "<script>$(document).ready(function(){ $('#confirmarCadastroCliente').modal('show'); });</script>
                        <div class='modal fade' id='confirmarCadastroCliente' role='dialog'>
                            <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-body'>
                                <p>Cliente cadastrado com sucesso!</p>
                                </div>
                                    <div class='modal-footer'>
                                        <a href='/'>
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

    public function indexClients()
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbName = "kasu_project";

        //Conexão com o banco
        $conn = new mysqli($servername, $username, $password, $dbName);

        $sql = "SELECT * FROM users WHERE usr_admin = 0;";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while($usrData = $result->fetch_assoc()) {
                echo "<tr>
                        <th scope='row'>" . $usrData['usr_id'] . "</th>
                        <td>" . $usrData['usr_name'] . "</td>
                        <td>" . $usrData['usr_email'] . "</td>
                        <td>" . $usrData['usr_phone'] . "</td>
                        <td>" . $usrData['usr_birthdate'] . "</td>
                        <td>" . $usrData['usr_gender'] . "</td>
                    </tr>";
            }
        }

    }
}