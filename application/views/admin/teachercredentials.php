<div class="container">


    <?php 

        if($this->session->flashdata('scored') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Score successfully posted. 
        </div>';
            
            unset($_SESSION['scored']);
        }
    
    ?>
    <h1>Teacher Credentials</h1>

    <div class="container mt-5">
        <table class="table table-hover table-sm" id="myDatatable">
            <thead>
            <tr>
                <th>Teacher ID</th>
                <th>Name</th>
                <th>Position</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($teacher as $row){?>

                <tr>
                    <td><?= $row['TeacherID'];?></td>
                    <td><?= $row['Fullname'];?></td>
                    <td><?= $row['Position'];?></td>
                    <td><?= $row['email'];?></td>
                    <td>

                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-primary" href="viewcredentials/<?= $row['TeacherID'];?>">View</a>
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#WETPEscore<?= $row['TeacherID']?>" data-bs-toggle="tooltip" title="Work Efficiency and Teaching Performance Effectiveness">WETPE Score</button>
                        </div>

                        <!-- The Modal -->
                        <div class="modal fade" id="WETPEscore<?= $row['TeacherID']?>">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Work Efficiency and Teaching Performance Effectiveness Score</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <?= form_open("savewetpescore/".$row['TeacherID']);?>
                                        <div class="col-6">
                                            Score rate 1-100
                                            <input type="number" step=".01" maxlength="3" class="form form-control" name="wetpescore" required>
                                        </div>
                                            
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" >Save Score</button>
                                    <?= form_close();?>
                                </div>

                                </div>
                            </div>
                        </div>

                    </td>
                </tr>

            <?php }?>
            </tbody>
        </table>
    </div>


























</div>