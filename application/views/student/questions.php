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


    <a type="button" class="btn" href="<?= base_url();?>studentdash"><h1><?= $teachername['Fullname'];?></h1></a>  
    <h6><?= $_SESSION['Level'].' '.$_SESSION['Section'];?></h6>


    <table class="table table-hover ">
        <thead>
            <tr>
                <th>Question</th>
                <th>Strongly Disagree</th>
                <th>Disagree</th>
                <th>Agree</th>
                <th>Strongly Agree</th>

            </tr>
        </thead>
        <tbody>

        <?= form_open('loganswer/'.$teacherID.'/'.$sectionID);?>

            <?php foreach($qeval as $row){?>
                <div class="form-check">
                    <tr>
                        
                        <td><?= $row['Question'];?> <input type="text"  id="rid" name="rid[]" value="<?= $row['resultID'];?>" hidden></td>
                        <td>
                            <input type="radio" class="form-check-input" id="ressd<?= $row['resultID'];?>" name="ressd<?= $row['resultID'];?>" value="1">
                            <input type="radio" class="form-check-input" id="ressd<?= $row['resultID'];?>" name="ressd<?= $row['resultID'];?>" value="0" hidden/>
                        </td>
                        <td>
                            <input type="radio" class="form-check-input" id="resd<?= $row['resultID'];?>" name="resd<?= $row['resultID'];?>" value="1">
                            <input type="radio" class="form-check-input" id="resd<?= $row['resultID'];?>" name="resd<?= $row['resultID'];?>" value="0" hidden/>
                        </td>
                        <td>
                            <input type="radio" class="form-check-input" id="resa<?= $row['resultID'];?>" name="resa<?= $row['resultID'];?>" value="1">
                            <input type="radio" class="form-check-input" id="resa<?= $row['resultID'];?>" name="resa<?= $row['resultID'];?>" value="0" hidden/>
                        </td>
                        <td>
                            <input type="radio" class="form-check-input" id="ressa<?= $row['resultID'];?>" name="ressa<?= $row['resultID'];?>" value="1">
                            <input type="radio" class="form-check-input" id="ressa<?= $row['resultID'];?>" name="ressa<?= $row['resultID'];?>" value="0" hidden/>
                        </td>
                        
                        <script>

                            document.getElementById("ressd<?= $row['resultID'];?>").onclick = function(){
                                document.getElementById("resd<?= $row['resultID'];?>").checked = false;
                                document.getElementById("resa<?= $row['resultID'];?>").checked = false;
                                document.getElementById("ressa<?= $row['resultID'];?>").checked = false;
                            }

                            document.getElementById("resd<?= $row['resultID'];?>").onclick = function(){
                                document.getElementById("ressd<?= $row['resultID'];?>").checked = false;
                                document.getElementById("resa<?= $row['resultID'];?>").checked = false;
                                document.getElementById("ressa<?= $row['resultID'];?>").checked = false;
                            }

                            document.getElementById("resa<?= $row['resultID'];?>").onclick = function(){
                                document.getElementById("resd<?= $row['resultID'];?>").checked = false;
                                document.getElementById("ressd<?= $row['resultID'];?>").checked = false;
                                document.getElementById("ressa<?= $row['resultID'];?>").checked = false;
                            }

                            document.getElementById("ressa<?= $row['resultID'];?>").onclick = function(){
                                document.getElementById("resd<?= $row['resultID'];?>").checked = false;
                                document.getElementById("resa<?= $row['resultID'];?>").checked = false;
                                document.getElementById("ressd<?= $row['resultID'];?>").checked = false;
                            }
                         
                        </script>
                    </tr>
                </div>
            <?php }?>
        </tbody>


    </table>


    <button type="submit" class="btn btn-primary btn-lg">Save</button>

    <?= form_close();?>


    

</body>
</html>



