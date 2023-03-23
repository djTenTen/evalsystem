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
<body class="bg-primary">


<div class="container bg-white p-4">


    <a type="button" class="btn" href="<?= base_url();?>teacherdash"><h1><?= $teachername['Fullname'];?></h1></a> 

    <?= form_open('logmyanswer/'.$teacherID);?>
    
    <?php if(!empty($qevalshs)){?>
    <table class="table table-hover">
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

       
                
            <?php foreach($qevalshs as $shs){?>
                <div class="form-check">
                    <tr>
                        <td><?= $shs['Question'];?> <input type="text"  id="rid" name="rid[]" value="<?= $shs['resultID'];?>" hidden></td>
                        <td>
                            <input type="radio" class="form-check-input" id="ressd<?= $shs['resultID'];?>" name="ressd<?= $shs['resultID'];?>" value="1">
                            <input type="radio" class="form-check-input" id="ressd<?= $shs['resultID'];?>" name="ressd<?= $shs['resultID'];?>" value="0" hidden/>
                        </td>
                        <td>
                            <input type="radio" class="form-check-input" id="resd<?= $shs['resultID'];?>" name="resd<?= $shs['resultID'];?>" value="1">
                            <input type="radio" class="form-check-input" id="resd<?= $shs['resultID'];?>" name="resd<?= $shs['resultID'];?>" value="0" hidden/>
                        </td>
                        <td>
                            <input type="radio" class="form-check-input" id="resa<?= $shs['resultID'];?>" name="resa<?= $shs['resultID'];?>" value="1">
                            <input type="radio" class="form-check-input" id="resa<?= $shs['resultID'];?>" name="resa<?= $shs['resultID'];?>" value="0" hidden/>
                        </td>
                        <td>
                            <input type="radio" class="form-check-input" id="ressa<?= $shs['resultID'];?>" name="ressa<?= $shs['resultID'];?>" value="1">
                            <input type="radio" class="form-check-input" id="ressa<?= $shs['resultID'];?>" name="ressa<?= $shs['resultID'];?>" value="0" hidden/>
                        </td>
                    </tr>
                </div>
            <?php }?>
        </tbody>
    </table>
    <h3>Senior high</h3>
    <?php }?>





    <?php if(!empty($qevaljhs)){?>
    <table class="table table-hover">
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
                
            <?php foreach($qevaljhs as $jhs){?>
                <div class="form-check">
                    <tr>
                        
                        <td><?= $jhs['Question'];?> <input type="text"  id="rid" name="rid[]" value="<?= $jhs['resultID'];?>" hidden></td>
                        <td>
                            <input type="radio" class="form-check-input" id="ressd<?= $jhs['resultID'];?>" name="ressd<?= $jhs['resultID'];?>" value="1">
                            <input type="radio" class="form-check-input" id="ressd<?= $jhs['resultID'];?>" name="ressd<?= $jhs['resultID'];?>" value="0" hidden/>
                        </td>
                        <td>
                            <input type="radio" class="form-check-input" id="resd<?= $jhs['resultID'];?>" name="resd<?= $jhs['resultID'];?>" value="1">
                            <input type="radio" class="form-check-input" id="resd<?= $jhs['resultID'];?>" name="resd<?= $jhs['resultID'];?>" value="0" hidden/>
                        </td>
                        <td>
                            <input type="radio" class="form-check-input" id="resa<?= $jhs['resultID'];?>" name="resa<?= $jhs['resultID'];?>" value="1">
                            <input type="radio" class="form-check-input" id="resa<?= $jhs['resultID'];?>" name="resa<?= $jhs['resultID'];?>" value="0" hidden/>
                        </td>
                        <td>
                            <input type="radio" class="form-check-input" id="ressa<?= $jhs['resultID'];?>" name="ressa<?= $jhs['resultID'];?>" value="1">
                            <input type="radio" class="form-check-input" id="ressa<?= $jhs['resultID'];?>" name="ressa<?= $jhs['resultID'];?>" value="0" hidden/>
                        </td>
                        
                    </tr>
                </div>
            <?php }?>
        </tbody>
    </table>
    <h3>Junior high</h3>
    <?php }?>


    <?php if(!empty($qevalgs)){?>
    <table class="table table-hover">
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
                
            <?php foreach($qevalgs as $gs){?>
                <div class="form-check">
                    <tr>
                        
                        <td><?= $gs['Question'];?> <input type="text"  id="rid" name="rid[]" value="<?= $gs['resultID'];?>" hidden></td>
                        <td>
                            <input type="radio" class="form-check-input" id="ressd<?= $gs['resultID'];?>" name="ressd<?= $gs['resultID'];?>" value="1">
                            <input type="radio" class="form-check-input" id="ressd<?= $gs['resultID'];?>" name="ressd<?= $gs['resultID'];?>" value="0" hidden/>
                        </td>
                        <td>
                            <input type="radio" class="form-check-input" id="resd<?= $gs['resultID'];?>" name="resd<?= $gs['resultID'];?>" value="1">
                            <input type="radio" class="form-check-input" id="resd<?= $gs['resultID'];?>" name="resd<?= $gs['resultID'];?>" value="0" hidden/>
                        </td>
                        <td>
                            <input type="radio" class="form-check-input" id="resa<?= $gs['resultID'];?>" name="resa<?= $gs['resultID'];?>" value="1">
                            <input type="radio" class="form-check-input" id="resa<?= $gs['resultID'];?>" name="resa<?= $gs['resultID'];?>" value="0" hidden/>
                        </td>
                        <td>
                            <input type="radio" class="form-check-input" id="ressa<?= $gs['resultID'];?>" name="ressa<?= $gs['resultID'];?>" value="1">
                            <input type="radio" class="form-check-input" id="ressa<?= $gs['resultID'];?>" name="ressa<?= $gs['resultID'];?>" value="0" hidden/>
                        </td>
                        
                    </tr>
                </div>
            <?php }?>
        </tbody>
    </table>
    <h3>Grade school</h3>
    <?php }?>



        


    <button type="submit" class="btn btn-primary btn-lg">Save</button>

    <?= form_close();?>


    

</body>
</html>



