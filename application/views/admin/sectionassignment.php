<div class="container">

    <h1>Section Assignment</h1>

    <?php

        if($this->session->flashdata('Duplicate') != null){
            echo '<div class="alert alert-danger">
            <strong>Error! </strong> Duplication Detected. 
        </div>';
        }
        
        if($this->session->flashdata('Added') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Teacher Assign to the Sections 
        </div>';
        }
        
    ?>


<div class="container" style="margin-top:5%">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="collegeSubject">Sections:</label>

                        <table id="myDatatable">
                            <thead>
                                <tr>
                                    <th>Sections</th>
                                </tr>                                    
                            </thead>
                            <tbody>
                                <?php foreach($sec as $row){?>
                                    <tr>
                                        <td>
                                            <a href="addtempsection/<?= $row['SectionID'];?>"><?= $row['Year'] .' - '. $row['Section'];?></a>
                                        </td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                </div>
        
                    <!-- CURRICULUM -->
                <?= form_open('assignsections');?>
                    <div class="form-group row mt-5">
                        <h5>Assigned Teacher</h5>
                        <div class="col-lg-4">
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
                    <!-- </div>
                    
                    <div class="form-group"> -->

                        <div class="col-lg-6">
                            <label for="section">Teacher:</label>
                            <select name="teacher" class="form-control form-control-sm" required>
                                <option value="">Teacher</option>
                                <?php foreach($teacher as $row){?>
                                    <option value="<?= $row['TeacherID'];?>"><?= $row['Fullname'];?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-success mt-2" id="addcurriculum" value="addcurriculum" name="addcurriculum"> Assign Sections</button>
                <?= form_close();?>
            
            </div>

            <!-- SUBJECT TABLE -->

            <div class="col-lg 6">
                <div style="overflow-y:scroll;width:100%;height:550px">  
                    <table class="table table-bordered table-hover table-sm">  
                        <thead class="sticky-top bg-white">
                            <tr> 
                                <th>Section ID</th>
                                <th>Year & Section</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($tempsec as $row2){?>
                            <tr>
                                <td><?= $row2['ssi'];?></td>
                                <td><?= $row2['Year'].' - '.$row2['Section'];?></td>
                                <td><?= $row2['Department'];?></td>
                                <td>
                                    <?= form_open('removetempsection/'.$row2['ssid']); ?>
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


        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Teacher ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($teacher as $teach){?>
                        <tr>
                            <td><?= $teach['TeacherID'];?></td>
                            <td><?= $teach['Fullname'];?></td>
                            <td>
                                <a href="editsectionassignment/<?= $teach['TeacherID'];?>" class="btn btn-sm btn-primary">Edit</a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>

            </table>

        </div>




</div>












