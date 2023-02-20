

<div class="container">


    <?php
        if($this->session->flashdata('Added') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Question has been successfully added. 
        </div>';
        }

        if($this->session->flashdata('Updated') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Question has been updated. 
        </div>';
        }

        if($this->session->flashdata('Deleted') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Question has been Deleted. 
        </div>';
        }

        if($this->session->flashdata('Errorpass') != null){
            echo '<div class="alert alert-danger">
            <strong>Error! </strong> Wrong administrative password. 
        </div>';
        }
        
        
    ?>

    <h1>Question Management</h1>
    <h6>Set of questions to be used.</h6>



    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add">Add Question</button>
    <!-- The Modal Delete-->
    <div class="modal fade" id="add">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add question</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <?= form_open('savequestion')?>
            
                    <div class="mb-3 mt-3 col-12">
                        <label for="qname" class="form-label">Question Name:</label>
                        <input type="text" class="form-control" id="qname" placeholder="Question Name" name="qname" required>
                    </div>

                    <div class="mb-3 mt-3 col-12">
                        <label for="question" class="form-label">Question :</label>
                        <textarea class="form-control" rows="5" id="comment" name="question" placeholder="Question" required></textarea>
                    </div>
                
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                
                <button type="submit" class="btn btn-primary btn-lg">Save</button>
                <?= form_close();?>
                <button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Cancel</button>
            </div>

            </div>
        </div>
    </div>




    <div class="container mt-5 col-10">
        <table class="table table-hover table-sm" id="myDatatable">
            <thead>
            <tr>
                <th>Question ID</th>
                <th>Question Name</th>
                <th>Question</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($question as $row){?>

                <tr>
                    <td><?= $row['QuestionID'];?></td>
                    <td><?= $row['QuestionName'];?></td>
                    <td><?= $row['Question'];?></td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?= $row['QuestionID'];?>" >Edit</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $row['QuestionID'];?>">Delete</button>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#view<?= $row['QuestionID'];?>">View</button>
                        </div>

                        <!-- The Modal Edit-->
                        <div class="modal fade" id="edit<?= $row['QuestionID'];?>">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit <?= $row['QuestionName'];?></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <?= form_open('updatequestion/'.$row['QuestionID'])?>
                                    
                                    <div class="mb-3 mt-3 col-12">
                                        <label for="qname" class="form-label">Question Name:</label>
                                        <input value="<?= $row['QuestionName'];?>" type="text" class="form-control" id="qname" placeholder="Question Name" name="qname" required>
                                    </div>

                                    <div class="mb-3 mt-3 col-12">
                                        <label for="question" class="form-label">Question :</label>
                                        <textarea class="form-control" rows="5" id="comment" name="question" placeholder="Question" required><?= $row['Question'];?></textarea>
                                    </div>

                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <?= form_close();?>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                </div>

                                </div>
                            </div>
                        </div>

                        <!-- The Modal Delete-->
                        <div class="modal fade" id="delete<?= $row['QuestionID'];?>">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete <?= $row['QuestionName'];?> ?</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    Are you sure to delete this question <strong><?= $row['QuestionName']?></strong> on the system??
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <?= form_open('deletequestion/'.$row['QuestionID']);?>
                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                    <?= form_close();?>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
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

