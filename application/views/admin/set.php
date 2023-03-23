<div class="container">
    <h1>Sets</h1>

    
    <?php

        if($this->session->flashdata('Send') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Set questions send to the evaluators
        </div>';

            unset($_SESSION['Send']);
        }
        
    ?>






    <table class="table table-hover" id="myDatatable">
        <thead>
            <tr>
                <th>Set Name</th>
                <th>view</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($sets as $row){?>
            <tr>
                <td><?= $row['Setname']; ?></td>
                <td>


                    <div class="btn-group btn-group-sm">
                        
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#view<?=  str_replace(' ', '',$row['Setname']); ?>">View</button>
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#send<?=  str_replace(' ', '',$row['Setname']); ?>">Send</button>
                    
                    </div>

                    <!-- The Modal -->
                    <div class="modal fade" id="view<?=  str_replace(' ', '',$row['Setname']); ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Questions</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>QuestionID</th>
                                            <th>Title</th>
                                            <th>Question</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $setname = $row['Setname'];
                                            $query = $this->db->query("select q.QuestionID,q.QuestionName,q.Question
                                            from questions as q, setquestions as sq
                                            where sq.Question = q.QuestionID
                                            and Setname = '$setname'");

                                            foreach($query->result_array() as $q){
                                        ?>

                                        <tr>
                                            <td><?= $q['QuestionID']; ?></td>
                                            <td><?= $q['QuestionName']; ?></td>
                                            <td><?= $q['Question']; ?></td>
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



                    <!-- The Modal -->
                    <div class="modal fade" id="send<?=  str_replace(' ', '',$row['Setname']); ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Send to Evaluators</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <?= form_open('sendquestions');?>
                                
                                <input value="<?= $row['Setname'];?>" type="text" name="setname" hidden>
                                <label for="dpt">Department:</label>
                                <select name="dpt" class="form-control form-control" required>
                                    <option value="">Select Department</option>
                                    <option value="Seniorhigh">Senior High</option>
                                    <option value="Juniorhigh">Junior High</option>
                                    <option value="SHSTeacher">SHS-Teacher</option>
                                    <option value="JHSTeacher">JHS-Teacher</option>
                                    <option value="GSTeacher">GS-Teacher</option>
                                    <option value="SHSSupervisor">SHS-Supervisor</option>
                                    <option value="JHSSupervisor">JHS-Supervisor</option>
                                    <option value="GSSupervisor">GS-Supervisor</option>
                                </select>

                                <label for="dpt">School Year:</label>
                                <select name="sy" class="form-control form-control" required>
                                    <option value="2022-2023" selected>2022-2023</option>
                                    <option value="2023-2024">2023-2024</option>
                                    <option value="2024-2025">2024-2025</option>
                                    <option value="2025-2026">2025-2026</option>
                                </select>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                
                                    <button type="submit" class="btn btn-primary">Send</button>
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