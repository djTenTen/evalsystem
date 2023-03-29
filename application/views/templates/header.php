<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Evaluation System - <?= $title?></title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom fonts for this template-->
    
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

    
    <script src="https://kit.fontawesome.com/2be74ad659.js" crossorigin="anonymous"></script>

    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    
    <script src="https://silviomoreto.github.io/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <link href="https://silviomoreto.github.io/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <!-- for data table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    




    <script>
        $(document).ready(function () {
            $('#myDatatable').DataTable();
        });

        $(document).ready(function () {
            $('#myDatatable1').DataTable();
        });

        $(document).ready(function () {
            $('#myDatatable2').DataTable();
        });

        $(document).ready(function () {
            $('#myDatatable3').DataTable();
        });
    </script>

    

</head>
<body>



<nav class="navbar navbar-expand-sm bg-dark navbar-dark">


    
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url();?>dashboard"> <img src="<?= base_url();?>img/logo3.png" alt="" srcset="" style="height: 30px;"> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>

            <?php
                if($this->session->flashdata('resetfailed') != null){
                    echo '<div class="alert alert-info">
                    <strong>Reset failed!</strong> Invalid administrator password!
                </div>';

                    unset($_SESSION['resetfailed']);
                }
            ?>
       
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">

            
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url();?>dashboard"">Dashboard</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Teacher</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url();?>teacher">Teacher Management</a></li>
                        <li><a class="dropdown-item" href="<?= base_url();?>sectionassignment">Section Assignment</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Question</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url();?>questions">Questionaires</a></li>
                        <li><a class="dropdown-item" href="<?= base_url();?>setquestions">Set Questions</a></li>
                        <li><a class="dropdown-item" href="<?= base_url();?>sets">Sets</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Evaluation</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url();?>results">Results Evaluation</a></li>
                        <li><a class="dropdown-item" href="<?= base_url();?>resultscredentials">Results Credentials</a></li>
                        <li><a class="dropdown-item" href="<?= base_url();?>teachercredentials">Teacher Credentials</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Admin</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url();?>users">Users</a></li>
                        <li><a class="dropdown-item" role="button" data-bs-toggle="modal" data-bs-target="#reset">Reset System</a></li>
                    </ul>
                </li>
             
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><?= $_SESSION['FullName']?></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" role="button" data-bs-toggle="modal" data-bs-target="#logout" >Logout</a></li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </div>

    


    <!-- The Modal -->
    <div class="modal fade" id="logout">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Confirmation</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Are you sure to logout?
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <?= form_open('logout');?>
                    <button type="submit" class="btn btn-primary">Logout</button>
                <?= form_close();?>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>

            </div>
        </div>
    </div>


    

    <!-- The Modal -->
    <div class="modal fade" id="reset">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Confirmation</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                This action will remove all the sent questions to students and teachers and resetting all de evaluation scores <br>
                please type the administrator password to proceed this action.
                <br>
                <strong>Note:</strong> make sure you have back-up database before doing this action.
                <br>
                <?= form_open("resetsystem");?>
                <div class="col-5">
                    Administrator password:
                    <input type="password" class="form form-control" name="addpass" required>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Confirm</button>
                <?= form_close();?>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
            </div>

            </div>
        </div>
    </div>


</nav>

