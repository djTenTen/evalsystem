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


      <a type="button" class="btn" role="button" data-bs-toggle="modal" data-bs-target="#logout"><h1><?= $_SESSION['FullName'];?></h1></a>  
    <h6><?= $_SESSION['Level'].' '.$_SESSION['Section'];?></h6>
    


    <?php foreach($teach as $row){?>
        <div class="mt-4 p-5 bg-dark text-white rounded">
            <a href="<?= base_url();?>viewquestions/<?= $row['teacherID'];?>/<?= $row['SectionID'];?>"><h1><?= $row['Fullname'];?></h1></a>
        </div>
    <?php }?>





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
