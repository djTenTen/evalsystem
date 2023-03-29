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

    <script src="https://kit.fontawesome.com/2be74ad659.js" crossorigin="anonymous"></script>
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

</head>
<body>


<div class="container">

    <?php

        if($this->session->flashdata('Success') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Success evaluation. 
        </div>';
        unset($_SESSION['Success']);
        }
        
    ?>

    <a type="button" class="btn" role="button" data-bs-toggle="modal" data-bs-target="#logout"><h1>Welcome <?= $_SESSION['FullName'];?></h1></a> 

    <?php if($pos == 'Teacher'){?>
        <?php  if(empty($transac)){?>

            <div class="mt-4 p-5 bg-secondary text-white rounded">
                <h1>Assess yourself</h1>
                <p>In this section you're going to assess yourself to see you side.</p>

                <h3>Click <a href="selfteacherquestion/<?= $_SESSION['UserID'];?>">here</a> to start your assessment</h3>
            </div>
    
        <?php }else{?>

            <div class="mt-4 p-5 bg-success text-white rounded">
                <h1>Congratulations</h1>
                <p>you have successfully assessed yourself</p>
            </div>

        <?php }?>
    <?php }elseif($pos == 'Supervisor' && $_SESSION['Seniorhigh'] == "Yes"){?>
       
            <?php if(!empty($teacherSHS)){?>
                <h3>Senior High</h3>
                <div class="row">
                <?php foreach($teacherSHS as $rowshs){?>
                    <div class="col-4">
                        <div class="mt-4 p-4 bg-primary text-white rounded ">
                            <a class="link-light" href="<?= base_url();?>teacherquestions/<?= $rowshs['Teacher'];?>/<?= $rowshs['Department'];?>"><h4><?= $rowshs['Fullname'];?></h4></a>
                        </div>
                    </div>
                <?php }?>
                </div>
            <?php }?>
        
    <?php }elseif($pos == 'Supervisor' && $_SESSION['Juniorhigh'] == "Yes"){?>
        <?php if(!empty($teacherJHS)){?>
            <h3>Junior High</h3>
            <div class="row">
            <?php foreach($teacherJHS as $rowjhs){?>
                <div class="col-4">
                    <div class="mt-4 p-4 bg-success text-white rounded">
                        <a class="link-light" href="<?= base_url();?>teacherquestions/<?= $rowjhs['Teacher'];?>/<?= $rowjhs['Department'];?>"><h4><?= $rowjhs['Fullname'];?></h4></a>
                    </div>
                </div>
            <?php }?>
            </div>
        <?php }?>
        
    <?php }elseif($pos == 'Supervisor' && $_SESSION['Gradeschool'] == "Yes"){?>

        <?php if(!empty($teacherGS)){?>
            <h3>Grade School</h3>
            <div class="row">
            <?php foreach($teacherGS as $rowgs){?>
                <div class="col-4">
                    <div class="mt-4 p-5 bg-info text-white rounded">
                        <a class="link-light" href="<?= base_url();?>teacherquestions/<?= $rowgs['Teacher'];?>/<?= $rowgs['Department'];?>"><h4><?= $rowgs['Fullname'];?></h4></a>
                    </div>
                </div>
            <?php }?>
            </div>
        <?php }?>



    <?php }?>


        <a href="mycredentials">
            <div class="mt-4 p-5 bg-primary text-white rounded">
                <h1>Update my Credentials</h1>
                <p>upload your documents like seminars, certificates, diploma, and more.
            </div>
        </a>

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





</body>
</html>
