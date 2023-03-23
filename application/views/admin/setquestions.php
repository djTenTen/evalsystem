<div class="container">

    <h1>Set Question</h1>

    <?php

        if($this->session->flashdata('Duplicate') != null){
            echo '<div class="alert alert-danger">
            <strong>Error! </strong> Question already included. 
        </div>';
            
            unset($_SESSION['Duplicate']);
        }
        
        if($this->session->flashdata('Added') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Set questions added
        </div>';

            unset($_SESSION['Added']);
        }
        
    ?>


<div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="collegeSubject">Sections:</label>

                        <table id="myDatatable" class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Question</th>
                                    <th>Add</th>
                                </tr>                                    
                            </thead>
                            <tbody>
                                <?php foreach($quest as $row){?>
                                    <tr>
                                        <td><?= $row['QuestionName'];?></td>
                                        <td><?= $row['Question'];?></td>
                                        <td>
                                            <a class="btn btn-primary btn sm" href="addtempquestion/<?= $row['QuestionID'];?>">+</a>
                                        </td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                </div>
        
                    <!-- CURRICULUM -->
                <?= form_open('registersetquestion');?>
                    <div class="form-group row mt-5">
                        <h5>Set Settings</h5>
                        <div class="col-lg-3">
                            <label for="sy">School Year:</label>
                            <select name="sy" class="form-control form-control-sm" required>
                                <option value="">School Year</option>
                                <option value="2017-2018">2017-2018</option>
                                <option value="2018-2019">2018-2019</option>
                                <option value="2019-2020">2019-2020</option>
                                <option value="2020-2021">2020-2021</option>
                                <option value="2021-2022">2021-2022</option>
                                <option value="2022-2023" selected>2022-2023</option>
                                <option value="2023-2024">2023-2024</option>
                                <option value="2024-2025">2024-2025</option>
                                <option value="2025-2026">2025-2026</option>
                                <option value="2026-2027">2026-2027</option>
                                <option value="2027-2028">2027-2028</option>
                                <option value="2028-2029">2028-2029</option>
                                <option value="2029-2030">2029-2030</option>
                                <option value="2030-2031">2030-2031</option>
                            </select>
                        </div>


                        <div class="col-lg-3">
                            <label for="dpt">Department:</label>
                            <select name="dpt" class="form-control form-control-sm" required>
                                <option value="">Select Department</option>
                                <option value="Seniorhigh">Senior High</option>
                                <option value="Juniorhigh">Junior High</option>
                                <option value="SHSTeacher">SHS-Teacher</option>
                                <option value="JHSTeacher">JHS-Teacher</option>
                                <option value="GSTeacher">GS-Teacher</option>
                                <option value="Supervisor">Supervisor</option>
                            </select>
                        </div>
                        
                    <!-- </div>
                    
                    <div class="form-group"> -->
                    <div class="col-lg-6">
                            <label for="section">Set Name:</label>
                            <input name="setname" type="text" class="form-control form-control-sm" required>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-success mt-2" id="addcurriculum" value="addcurriculum" name="addcurriculum">Save Set Questions</button>
                <?= form_close();?>
            
            </div>

            <!-- SUBJECT TABLE -->

            <div class="col-lg 6">
                <div style="overflow-y:scroll;width:100%;height:550px">  
                    <table class="table table-bordered table-hover table-sm">  
                        <thead class="sticky-top bg-white">
                            <tr> 
                                <th>QID</th>
                                <th>Title</th>
                                <th>Question</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($tempquest as $row2){?>
                            <tr>
                                <td><?= $row2['QuestionID'];?></td>
                                <td><?= $row2['QuestionName'];?></td>
                                <td><?= $row2['Question'];?></td>
                                <td>
                                    <?= form_open('removetempquestion/'.$row2['tempquestionID']); ?>
                                        <button name="delete" class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    <?= form_close(); ?>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>  




</div>












