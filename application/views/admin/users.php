<div class="container">

<?php
        if($this->session->flashdata('registed') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Admin has been successfully registered. 
        </div>';

            unset($_SESSION['registed']);
        } 


        if($this->session->flashdata('updated') != null){
            echo '<div class="alert alert-success">
            <strong>Updated! </strong> Admin info has been successfully updated. 
        </div>';

            unset($_SESSION['updated']);
        }
        
    ?>

    <h1>User Management</h1>

    <div class="container mt-5">
        <?= form_open('registeradmin');?>
            <div class="row">
                <div class="col-3">
                    First Name:
                    <input type="text" class="form form-control" name="fname" required>
                </div>
                <div class="col-3">
                    Middle Name:
                    <input type="text" class="form form-control" name="mname">
                </div>
                <div class="col-3">
                    Last Name:
                    <input type="text" class="form form-control" name="lname" required>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    Username:
                    <input type="text" class="form form-control" name="un" required>
                </div>
                <div class="col-3">
                    Password:
                    <input type="password" class="form form-control" name="pss" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Register</button>
        <?= form_close();?>
    </div>

    <div class="container mt-5">
        <table class="table table-hover" id="myDatatable">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $row){?>
                <tr>
                    <td><?= $row['UserID'];?></td>
                    <td><?= $row['Lname'].', '.$row['Fname'].' '.$row['Mname'];?></td>
                    <td><?= $row['Position'];?></td>
                    <td><?= $row['un'];?></td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $row['UserID'];?>" >Edit</button>
                    
                        <!-- The Modal Edit-->
                        <div class="modal fade" id="edit<?= $row['UserID'];?>">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit <?= $row['Lname'].', '.$row['Lname'].' '.$row['Mname'];?></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <?= form_open('updateadmin/'.$row['UserID'])?>
                                        <div class="row">
                                            <div class="col-4">
                                                First Name:
                                                <input value="<?= $row['Fname'];?>" type="text" class="form form-control" name="fname" required>
                                            </div>
                                            <div class="col-4">
                                                Middle Name:
                                                <input value="<?= $row['Mname'];?>" type="text" class="form form-control" name="mname">
                                            </div>
                                            <div class="col-4">
                                                Last Name:
                                                <input value="<?= $row['Lname'];?>" type="text" class="form form-control" name="lname" required>
                                            </div>
                                        </div>
                                            <br>
                                        <div class="row">
                                            <div class="mb-3 col-6">
                                                <label for="email" class="form-label">Username:</label>
                                                <input value="<?= $row['un'];?>" type="text" class="form-control" id="email" placeholder="Enter Username" name="un" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="mb-3 col-6">
                                                <label for="email" class="form-label">Password:</label>
                                                <input value="<?= $row['pss'];?>" type="password" class="form-control" id="email" placeholder="Enter Email" name="pss" required>
                                            </div>
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
                    
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>

    </div>

</div>