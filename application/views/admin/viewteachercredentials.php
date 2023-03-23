<div class="container">
    <?php 

        if($this->session->flashdata('Score') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Score successfully posted. 
        </div>';
            
            unset($_SESSION['Score']);
        }
    
    ?>


    <h1><?= $teachername['Fullname'];?>'s Credentials</h1>

    <div class="container mt-5">
        <table class="table table-hover" id="myDatatable">
            <thead>
                <tr>
                    <th>Credential ID</th>
                    <th>Type</th>
                    <th>Points</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($credentials as $row){?>
                <tr>
                    <td><?= $row['CredentialID'];?></td>
                    <td><?= $row['CredentialName'];?></td>
                    <td><?= $row['Points'];?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#viewdocument<?= $row['CredentialID']?>">View</button>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#score<?= $row['CredentialID']?>">Score</button>
                        </div>
                        <!-- The Modal -->
                        <div class="modal fade" id="viewdocument<?= $row['CredentialID']?>">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Document</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <object data="<?= base_url();?>credential/<?= $row['CredentialID'];?>.pdf" type="application/pdf" width="100%" height="500">
                                                
                                    </object>
                                        
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>

                                </div>
                            </div>
                        </div>



                        <!-- The Modal -->
                        <div class="modal fade" id="score<?= $row['CredentialID']?>">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title"><?= $teachername['Fullname'];?></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                    <?= form_open("savecredentialscore/".$row['CredentialID'].'/'.$row['TeacherID']);?>
                                        <div class="col-6">
                                            Score
                                            <input type="number" step=".01" class="form form-control" name="score" required>
                                        </div>
                                            
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" >Save Score</button>
                                        <?= form_close();?>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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