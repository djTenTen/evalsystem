
<!DOCTYPE html>
<html lang="en">
<head>

   
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">



    <title>EVALUATION SYSTEM - <?= $title?></title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom fonts for this template-->
    
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->

    <script src="https://kit.fontawesome.com/2be74ad659.js" crossorigin="anonymous"></script>
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">


</head>
<body style="background-image: url(<?= base_url();?>img/bghcc.jpg); height: auto; width: auto; background-attachment: fixed; background-position: center; background-size: cover; overflow-x: hidden; ">

	<div class="container" >
		<!-- Outer Row -->
        <?php
        if($this->session->flashdata('Login_Failed') != null){
            echo '<div class="alert alert-danger">
            <strong>Login Failed!</strong> Invalid Username and Password!
        </div>';

            unset($_SESSION['Login_Failed']);
        }
    ?>
		<div class="row justify-content-center  mt-5">
                <div class="col-5" style="background-color: rgba(255, 255, 255, 0.7);">
                    <div class="p-5 ">
                        <div class="text-center">
                            <h1 class="mb-4 text-black">Evaluation System</h1>
                        </div>
                        <form class="user" action="authenticate" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                    placeholder="Username"  name="un" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user"
                                    id="exampleInputPassword" placeholder="Password" name="pss" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-user btn-block" >Login</button>
                        </form>
                        <hr>
                    </div>
                </div>

                <div class="col-5" style="background-color: rgba(255,255,255,0.0);">
                    <img src="<?= base_url();?>img/logo4.png" alt="Logo" class="" style="height:450px;">
                   
                </div>	
            </div>
        </div>
    </div>



    <!-- <div class="container-fluid">
        <div class="d-flex justify-content-center" style="margin-top: 10%;">
            <div class="user_card">
                    
                
                <div class="d-flex justify-content-center form_container">
                    <div class="brand_logo_container">
                            <img src="image/logohcc.png" class="logo" alt="Logo">
                    </div>
                    <div class="mb-5">
                        <h4>Digital Enrollment System</h4>
                        <?php
                        $_SESSION['Authentication'] = 0;
                        session_destroy();
                        if($this->session->flashdata('Login_Failed') != null){
                            echo '<div class="alert alert-danger">
                            <strong>Error! </strong> Login failed. 
                        </div>';

                            unset($_SESSION['Errorpass']);
                        }
                    ?>
                    </div>
                    
                </div>
                        
                    <div class="d-flex justify-content-center">
                        
                        <?= form_open('authenticate');?>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="email" name="un" class="form-control" value="" placeholder="Username" required>
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="pss" class="form-control" value="" placeholder="Password" required>
                            </div>
                            <div class="d-flex justify-content-center mt-3 ">
                                <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                            </div>
                        <?= form_close();?>
                    </div>	          
            </div>
            
        </div>
       
    </div> -->

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url();?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url();?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url();?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url();?>js/sb-admin-2.min.js"></script>
    
</body>
</html>