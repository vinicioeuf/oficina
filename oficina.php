<?php

session_start();
// Configurações do banco de dados
require('conexao.php');


try
{
    $con = Conexao::getInstance();
    $query = "SELECT * FROM produtos";
    $stmt = $con->prepare($query);
    $stmt->execute();
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo("Conexão O.K");
} 
catch (PDOException $e) 
{
    echo("Erro na conexão");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <title>Oficina</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="oficina.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Oficina</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <ul style="width: 100%;" class="navbar-nav ml-auto d-flex justify-content-between">
                        <li class="nav-item">
                            <h1 class="h3 mt-4 text-gray-800">Programação Web: Autenticação, Criptografia, CRUD e
                                Hospedagem
                            </h1>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item">

                            <div class="mt-3">
                                <?php
        if(isset($_SESSION['nome'])){
?>
                                <a class="nav-link" href="login.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                        class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                    </svg>
                                    <span>Olá,
                                        <?php echo $_SESSION['nome'];  ?>
                                    </span></a>
                                <?php
        } else{
?>
                                <a style="border-radius:20px" type="button" href="login.php" class="btn btn-danger">
                                    ENTRAR
                                </a>
                                <a style="border-radius:20px" type="button" href="cadastro.php" class="btn btn-primary">
                                    CADASTRAR
                                </a>
                                <?php
        }
?>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Produtos</h1>
                    <div class="card shadow mb-4">
                    <?php
        if(isset($_SESSION['nome'])){
?>
                        <div class="card-header py-3 d-flex justify-content-between">
                            <button style="border-radius:20px" type="button" class="btn btn-primary btn-user btn-block"
                                data-bs-toggle="modal" data-bs-target="#exampleModaladdProduto">
                                Novo Produto
                            </button>

                        </div>
                        <?php
        } ?>
                        <form method="POST" action="addProduto.php" class="modal user form-produto fade"
                            id="exampleModaladdProduto" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-produto modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">NOVO PRODUTO</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input class="form-control form-control-user" type="text" id="nome"
                                                name="nome" placeholder="Nome">
                                        </div>
                                        <br>
                                        <div class=" form-group">
                                            <input class="form-control form-control-user" type="text" id="valor"
                                                name="valor" placeholder="Valor">
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start justify-content-start modal-footer">
                                        <button type="submit" name="submit"
                                            class="btn btn-primary btn-user btn-block">Adicionar Produto</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-body">
                            <div class="table-responsive">





























<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOME</th>
                                            <th>VALOR</th>
                                            <th>AÇÕES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $resultado = $con->query($query); 
                                        $index=1;
                                        while($dados = $resultado->fetch(PDO::FETCH_ASSOC))
                                        {
                                        ?>
                                        <tr>
                                            <th style="color: grey;">
                                                <?php echo $dados['id']?>
                                            </th>
                                            <th style="color: grey;">
                                                <?php echo $dados['nome']?>
                                            </th>
                                            <th style="color: grey;">R$
                                                <?php echo $dados['valor']?>
                                            </th>
                                            <th
                                                style="color: grey;">
                                                <button  style="border-radius:20px" class="btn btn-primary btn-user btn-block" type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModaleditProduto<?php echo $index; ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        fill="currentColor" class="bi bi-pencil-square text-white"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </button>
                                                <a href="deleteProduto.php?id=<?php echo $dados['id']; ?>" style="border-radius:20px" class="btn btn-danger btn-user btn-block" type="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        fill="currentColor" class=" bi bi-trash2-fill text-white"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z" />
                                                    </svg>
                                                </a>
                                            </th>
                                        </tr>
                                        <div
                                            class="modal user form-produto fade"
                                            id="exampleModaleditProduto<?php echo $index; ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel<?php echo $index; ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-produto modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">EDITAR PRODUTO - 
                                                        <?php echo $index; ?></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST" action="editProduto.php" class="modal-body user fade">
                                                        <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                                        <div  style="border-radius:20px" class="form-group ml-2 mr-2">
                                                            <input  style="border-radius:20px" class="form-control form-control-user" type="text"
                                                                id="nome" name="nome" value="<?php echo $dados['nome']; ?>" placeholder="Nome">
                                                        </div>
                                                        <br>
                                                        <div style="border-radius:20px" class=" form-group ml-2 mr-2">
                                                            <input  style="border-radius:20px" class="form-control form-control-user" type="text"
                                                                id="valor" name="valor" placeholder="Valor" value="<?php echo $dados['valor']; ?>">
                                                        </div>
                                                        <div
                                                        class="d-flex align-items-start justify-content-start modal-footer">
                                                        <button  style="border-radius:20px" type="submit" name="update"
                                                        class="btn btn-primary btn-user btn-block">Salvar Alterações
                                                        </button>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $index++;
                                        }
                                        ?>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOME</th>
                                            <th>VALOR</th>
                                            <th>AÇÕES</th>
                                        </tr>
                                    </tfoot>

                                </table>




















                                


                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>