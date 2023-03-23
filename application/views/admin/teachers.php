<div class="container">


    <h1>Teacher Management</h1>



    <?php
        if($this->session->flashdata('Added') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> '.$_SESSION['teachername'].' has been successfully registered. 
        </div>';
            
            unset($_SESSION['teachername']);
            unset($_SESSION['Added']);
        }

        if($this->session->flashdata('Updated') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> '.$_SESSION['teachername'].' info has been updated. 
        </div>';

            unset($_SESSION['teachername']);
            unset($_SESSION['Updated']);
        }

        if($this->session->flashdata('Deleted') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong>'.$_SESSION['dteachername'].' Has been Removed. 
        </div>';
        
            unset($_SESSION['dteachername']);
            unset($_SESSION['Deleted']);  
        }

        if($this->session->flashdata('Errorpass') != null){
            echo '<div class="alert alert-danger">
            <strong>Error! </strong> Wrong administrative password. 
        </div>';
            
            unset($_SESSION['Errorpass']);
        }
        
        
    ?>




    <div class="mt-5 col-8">
        <?= form_open('saveteacher')?>
            <div class="row">
                <div class="mb-3 mt-3 col-3">
                    <label for="lname" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname" required>
                </div>

                <div class="mb-3 mt-3 col-3">
                    <label for="fname" class="form-label">First Name:</label>
                    <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname" required>
                </div>

                <div class="mb-3 mt-3 col-3">
                    <label for="mname" class="form-label">Middle Name:</label>
                    <input type="text" class="form-control" id="mname" placeholder="Enter Middle Name" name="mname">
                </div>
            </div>
            
            <div class="row">
                <div class="mb-3 col-6">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
                </div>

                <div class="mb-3 col-3">
                    <label for="email" class="form-label">Area:</label>
                    <select name="area" class="form-control form-control form-select" required>
                        <option value="" selected>Select Area</option>
                        <option value="Teacher">Teacher</option>
                        <option value="Supervisor">Supervisor</option>
                    </select>
                </div>


                <div class="mb-3 col-3">
                    <label for="email" class="form-label">Position:</label>
                    <select name="position" class="form-control form-control form-select" required>
                        <option value="" selected>Select Position</option>
                        <option value="Teacher">Teacher</option>
                        <option value="Principal">Principal</option>
                        <option value="VPAA">VPAA</option>
                    </select>
                </div>


            </div>

            <div class="container">
                <h5>Department</h5>

                <table class="table table-borderless table-sm">
                <tbody>
                    <tr>
                        <!-- <td>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input mr-sm-2" type="hidden" id="college" name="college" value="No" />
                                    <input class="form-check-input mr-sm-2" type="checkbox" id="college" name="college" value="Yes">
                                    College
                                </label>
                            </div>
                        </td> -->
                        <td>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input mr-sm-2" type="hidden" id="shs" name="shs" value="No" />
                                    <input class="form-check-input mr-sm-2" type="checkbox" id="shs" name="shs" value="Yes">
                                    Senior High
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input mr-sm-2" type="hidden" id="jhs" name="jhs" value="No" />
                                    <input class="form-check-input mr-sm-2" type="checkbox" id="jhs" name="jhs" value="Yes">
                                    Junior High
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input mr-sm-2" type="hidden" id="gs" name="gs" value="No" />
                                    <input class="form-check-input mr-sm-2" type="checkbox" id="gs" name="gs" value="Yes">
                                    Grade School
                                </label>
                            </div>
                        </td>
                    </tr>

                </table>
            </div>

            
            <button type="submit" class="btn btn-primary btn-lg">Register</button>
        <?= form_close();?>
    </div>

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
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?= $row['TeacherID'];?>" >Edit</button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $row['TeacherID'];?>">Delete</button>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#view<?= $row['TeacherID'];?>">View</button>
                            </div>

                            <!-- The Modal Edit-->
                            <div class="modal fade" id="edit<?= $row['TeacherID'];?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit <?= $row['Fullname'];?></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <?= form_open('updateteacher/'.$row['TeacherID'])?>
                                            <div class="row">
                                                <div class="mb-3 mt-3 col-12">
                                                    <label for="lname" class="form-label">Name:</label>
                                                    <input value="<?= $row['Fullname'];?>" type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="name" required>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="mb-3 col-6">
                                                    <label for="email" class="form-label">Email:</label>
                                                    <input value="<?= $row['email'];?>" type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="mb-3 col-6">
                                                    <label for="email" class="form-label">Password:</label>
                                                    <input value="<?= $row['pass'];?>" type="password" class="form-control" id="email" placeholder="Enter Email" name="pass" required>
                                                </div>
                                            </div>

                                            <div class="container">
                                                <h5>Teaching Department</h5>

                                                <table class="table table-borderless table-sm">
                                                <tbody>
                                                    <tr>
                                                        <!-- <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input mr-sm-2" type="hidden" id="college" name="college" value="No" />
                                                                    <input class="form-check-input mr-sm-2" type="checkbox" id="college" name="college" value="Yes">
                                                                    College
                                                                </label>
                                                            </div>
                                                        </td> -->
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input mr-sm-2" type="hidden" id="shs" name="shs" value="No" />
                                                                    <input class="form-check-input mr-sm-2" type="checkbox" id="shs" name="shs" value="Yes" <?php if ($row['Seniorhigh']=='Yes'){echo 'checked';}?>>
                                                                    Senior High
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input mr-sm-2" type="hidden" id="jhs" name="jhs" value="No" />
                                                                    <input class="form-check-input mr-sm-2" type="checkbox" id="jhs" name="jhs" value="Yes" <?php if ($row['Juniorhigh']=='Yes'){echo 'checked';}?>>
                                                                    Junior High
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input mr-sm-2" type="hidden" id="gs" name="gs" value="No" />
                                                                    <input class="form-check-input mr-sm-2" type="checkbox" id="gs" name="gs" value="Yes" <?php if ($row['Gradeschool']=='Yes'){echo 'checked';}?>>
                                                                    Grade School
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                </table>
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
                            <div class="modal fade" id="delete<?= $row['TeacherID'];?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete <?= $row['Fullname'];?> ?</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Are you sure to delete  <strong><?= $row['Fullname']?></strong> on the system??
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <?= form_open('deleteteacher/'.$row['TeacherID']);?>
                                            <button type="submit" class="btn btn-primary">Confirm</button>
                                        <?= form_close();?>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                    </div>

                                    </div>
                                </div>
                            </div>


                            <!-- The Modal Delete-->
                            <div class="modal fade" id="view<?= $row['TeacherID'];?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title"><?= $row['Fullname'];?> Sections</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Level</th>
                                                    <th>Section</th>
                                                    <th>Department</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $tID = $row['TeacherID'];
                                                    $res = $this->db->query("select Year,Section,Department
                                                    from section,assign_section
                                                    where assign_section.SectionID = section.SectionID
                                                    and assign_section.TeacherID = '$tID'");

                                                    foreach($res->result_array() as $sec){
                                                ?>
                                                <tr>
                                                    <td><?= $sec['Year'];?></td>
                                                    <td><?= $sec['Section'];?></td>
                                                    <td><?= $sec['Department'];?></td>
                                                </tr>

                                                <?php }?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
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