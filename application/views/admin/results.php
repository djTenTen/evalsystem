<div class="container">


    <h1>Results</h1>

        <div class="col-6 bg-secondary">
            <h2>Senior High</h2>
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                    
                    $this->db->query("delete from summary");
                    foreach($shs as $rowshs){
                        $summ1 = 0;?>
                    <tr>
                        <td><?= $rowshs['Fullname'];?></td>
                        <td>
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewresultshs<?= $rowshs['TeacherID'];?>">Result</button>

                            <!-- The Modal -->
                            <div class="modal fade" id="viewresultshs<?= $rowshs['TeacherID'];?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title"><?= $rowshs['Fullname'];?></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Section</th>
                                                    <th>Strongly Disagree</th>
                                                    <th>Disagree</th>
                                                    <th>Agree</th>
                                                    <th>Strongly Agree</th>
                                                    <th>Rating</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                        <?php 

                                            $shstid = $rowshs['TeacherID'];
                                            $query1 = $this->db->query("select Section,section.SectionID
                                            from section,assign_section
                                            where assign_section.SectionID = section.SectionID
                                            and Department = 'Seniorhigh'
                                            and assign_section.teacherID = $shstid");

                                            foreach($query1->result_array() as $sec1){

                                                
                                                $sectionshs = $sec1['SectionID'];

                                                $sdisagree1 = $this->db->query("select sum(sdisagree) as sda
                                                from evaluations
                                                where Section = $sectionshs
                                                and Teacher = $shstid
                                                and Department = 'Seniorhigh'"); 
                                                $sda1 = $sdisagree1->row_array();

                                                $disagree1 = $this->db->query("select sum(disagree) as da
                                                from evaluations
                                                where Section = $sectionshs
                                                and Teacher = $shstid
                                                and Department = 'Seniorhigh'"); 
                                                $da1 = $disagree1->row_array();


                                                $agree1 = $this->db->query("select sum(agree) as ag
                                                from evaluations
                                                where Section = $sectionshs
                                                and Teacher = $shstid
                                                and Department = 'Seniorhigh'"); 
                                                $ag1 = $agree1->row_array();

                                                $sagree1 = $this->db->query("select sum(sagree) as sag
                                                from evaluations
                                                where Section = $sectionshs
                                                and Teacher = $shstid
                                                and Department = 'Seniorhigh'"); 
                                                $sag1 = $sagree1->row_array();

                                                $count1 = $this->db->query("select count(evaluator) as studcount
                                                from evaluation_transaction
                                                where section = $sectionshs
                                                and teacher = $shstid"); 
                                                $studcount1 = $count1->row_array();




                                                // teacher
                                                $Tsdisagree1 = $this->db->query("select sum(sdisagree) as sda
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $shstid
                                                and Department = 'SHSTeacher'"); 
                                                $Tsda1 = $Tsdisagree1->row_array();

                                                $Tdisagree1 = $this->db->query("select sum(disagree) as da
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $shstid
                                                and Department = 'SHSTeacher'"); 
                                                $Tda1 = $Tdisagree1->row_array();

                                                $Tagree1 = $this->db->query("select sum(agree) as ag
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $shstid
                                                and Department = 'SHSTeacher'"); 
                                                $Tag1 = $Tagree1->row_array();

                                                $Tsagree1 = $this->db->query("select sum(sagree) as sag
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $shstid
                                                and Department = 'SHSTeacher'"); 
                                                $Tsag1 = $Tsagree1->row_array();



                                                // SuperVisor
                                                $Supsdisagree1 = $this->db->query("select sum(sdisagree) as sda
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $shstid
                                                and Department = 'SHSSupervisor'"); 
                                                $Supsda1 = $Supsdisagree1->row_array();

                                                $Supdisagree1 = $this->db->query("select sum(disagree) as da
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $shstid
                                                and Department = 'SHSSupervisor'"); 
                                                $Supda1 = $Supdisagree1->row_array();

                                                $Supagree1 = $this->db->query("select sum(agree) as ag
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $shstid
                                                and Department = 'SHSSupervisor'"); 
                                                $Supag1 = $Supagree1->row_array();

                                                $Supsagree1 = $this->db->query("select sum(sagree) as sag
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $shstid
                                                and Department = 'SHSSupervisor'"); 
                                                $Supsag1 = $Supsagree1->row_array();




                                                if(empty($studcount1['studcount'])){
                                                    $divider1 = 1;
                                                }else{
                                                    $divider1 = $studcount1['studcount'];
                                                }
                                        
                                                // result based on the score per question
                                                $resultStudentSHS = (($sda1['sda'] * 2) + ($da1['da'] * 3) + ($ag1['ag'] * 4) + ($sag1['sag'] * 5)) / $divider1;
                                                
                                                // result from teachers
                                                $resultTeacherSHS = (($Tsda1['sda'] * 2) + ($Tda1['da'] * 3) + ($Tag1['ag'] * 4) + ($Tsag1['sag'] * 5));

                                                // result from supervisors
                                                $resultSupervisorSHS = (($Supsda1['sda'] * 2) + ($Supda1['da'] * 3) + ($Supag1['ag'] * 4) + ($Supsag1['sag'] * 5));
                                                
                                                // 40% of supervisor, 40% of Students and 20% of Teachers
                                                $result1 = ($resultSupervisorSHS * .40) + ($resultTeacherSHS * .20) + ($resultStudentSHS * .40);
                                        
                                        
                                        ?>
                                    
                                            <tr>
                                                <td><?= $sec1['Section'];?></td>
                                                <td><?= $sda1['sda'];?></td>
                                                <td><?= $da1['da'];?></td>
                                                <td><?= $ag1['ag'];?></td>
                                                <td><?= $sag1['sag'];?></td>
                                                <td><?= $result1;?></td>
                                            </tr>
                                        
                                                <?php
                                                              
                                                    $summ1 = $summ1 + $result1;
                                                    
                                                ?>
                                    
                                        <?php  } 
                                            
                                                
                                                $data1 = array(
                                                    'Teacher' => $shstid,
                                                    'Summ' => $summ1,
                                                    'dpt' => 'shs'
                                                );
                                                $this->db->insert("summary", $data1);
                                        
                                        
                                        ?>  
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
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="col-6 bg-primary">
            <h2>Junior High</h2>
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                    

                    foreach($jhs as $rowjhs){
                        $summ2 = 0;?>
                    <tr>
                        <td><?= $rowjhs['Fullname'];?></td>
                        <td>
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewresultjhs<?= $rowjhs['TeacherID'];?>">Result</button>

                            <!-- The Modal -->
                            <div class="modal fade" id="viewresultjhs<?= $rowjhs['TeacherID'];?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title"><?= $rowjhs['Fullname'];?></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Section</th>
                                                    <th>Strongly Disagree</th>
                                                    <th>Disagree</th>
                                                    <th>Agree</th>
                                                    <th>Strongly Agree</th>
                                                    <th>Rating</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                        <?php 

                                            $jhstid = $rowjhs['TeacherID'];
                                            $query2 = $this->db->query("select Section,section.SectionID
                                            from section,assign_section
                                            where assign_section.SectionID = section.SectionID
                                            and Department = 'Juniorhigh'
                                            and assign_section.teacherID = $jhstid");

                                            foreach($query2->result_array() as $sec2){

                                                
                                                $sectionjhs = $sec2['SectionID'];

                                                $sdisagree2 = $this->db->query("select sum(sdisagree) as sda
                                                from evaluations
                                                where Section = $sectionjhs
                                                and Teacher = $jhstid
                                                and Department = 'Juniorhigh'"); 
                                                $sda2 = $sdisagree2->row_array();

                                                $disagree2 = $this->db->query("select sum(disagree) as da
                                                from evaluations
                                                where Section = $sectionjhs
                                                and Teacher = $jhstid
                                                and Department = 'Juniorhigh'"); 
                                                $da2 = $disagree2->row_array();


                                                $agree2 = $this->db->query("select sum(agree) as ag
                                                from evaluations
                                                where Section = $sectionjhs
                                                and Teacher = $jhstid
                                                and Department = 'Juniorhigh'"); 
                                                $ag2 = $agree2->row_array();

                                                $sagree2 = $this->db->query("select sum(sagree) as sag
                                                from evaluations
                                                where Section = $sectionjhs
                                                and Teacher = $jhstid
                                                and Department = 'Juniorhigh'"); 
                                                $sag2 = $sagree2->row_array();

                                                $count2 = $this->db->query("select count(evaluator) as studcount
                                                from evaluation_transaction
                                                where section = $sectionjhs
                                                and teacher = $jhstid"); 
                                                $studcount2 = $count2->row_array();




                                                // teacher
                                                $Tsdisagree2 = $this->db->query("select sum(sdisagree) as sda
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $jhstid
                                                and Department = 'JHSTeacher'"); 
                                                $Tsda2 = $Tsdisagree2->row_array();

                                                $Tdisagree2 = $this->db->query("select sum(disagree) as da
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $jhstid
                                                and Department = 'JHSTeacher'"); 
                                                $Tda2 = $Tdisagree2->row_array();

                                                $Tagree2 = $this->db->query("select sum(agree) as ag
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $jhstid
                                                and Department = 'JHSTeacher'"); 
                                                $Tag2 = $Tagree2->row_array();

                                                $Tsagree2 = $this->db->query("select sum(sagree) as sag
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $jhstid
                                                and Department = 'JHSTeacher'"); 
                                                $Tsag2 = $Tsagree2->row_array();



                                                // SuperVisor
                                                $Supsdisagree2 = $this->db->query("select sum(sdisagree) as sda
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $jhstid
                                                and Department = 'JHSSupervisor'"); 
                                                $Supsda2 = $Supsdisagree2->row_array();

                                                $Supdisagree2 = $this->db->query("select sum(disagree) as da
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $jhstid
                                                and Department = 'JHSSupervisor'"); 
                                                $Supda2 = $Supdisagree2->row_array();

                                                $Supagree2 = $this->db->query("select sum(agree) as ag
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $jhstid
                                                and Department = 'JHSSupervisor'"); 
                                                $Supag2 = $Supagree2->row_array();

                                                $Supsagree2 = $this->db->query("select sum(sagree) as sag
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $jhstid
                                                and Department = 'JHSSupervisor'"); 
                                                $Supsag2 = $Supsagree2->row_array();




                                                if(empty($studcount2['studcount'])){
                                                    $divider2 = 1;
                                                }else{
                                                    $divider2 = $studcount2['studcount'];
                                                }

                                                // result based on the score per question
                                                $resultStudentJHS = (($sda2['sda'] * 2) + ($da2['da'] * 3) + ($ag2['ag'] * 4) + ($sag2['sag'] * 5)) / $divider2;
                                                
                                                // result from teachers
                                                $resultTeacherJHS = (($Tsda2['sda'] * 2) + ($Tda2['da'] * 3) + ($Tag2['ag'] * 4) + ($Tsag2['sag'] * 5));

                                                // result from supervisors
                                                $resultSupervisorJHS = (($Supsda2['sda'] * 2) + ($Supda2['da'] * 3) + ($Supag2['ag'] * 4) + ($Supsag2['sag'] * 5));
                                                
                                                // 40% of supervisor, 40% of Students and 20% of Teachers
                                                $result2 = ($resultSupervisorJHS * .40) + ($resultTeacherJHS * .20) + ($resultStudentJHS * .40);
                                        ?>
                                    
                                            <tr>
                                                <td><?= $sec2['Section'];?></td>
                                                <td><?= $sda2['sda'] + $Tsda2['sda'] + $Supsda2['sda'];?></td>
                                                <td><?= $da2['da'] + $Tda2['da'] + $Supda2['da'];?></td>
                                                <td><?= $ag2['ag'] + $Tag2['ag'] + $Supag2['ag'];?></td>
                                                <td><?= $sag2['sag'] + $Tsag2['sag'] + $Supsag2['sag'];?></td>
                                                <td><?= $result2;?></td>
                                            </tr>
                                        
                                                <?php
                                                              
                                                    $summ2 = $summ2 + $result2;
                                                    
                                                ?>
                                    
                                        <?php  } 
                                            
                                                
                                                $data2 = array(
                                                    'Teacher' => $jhstid,
                                                    'Summ' => $summ2,
                                                    'dpt' => 'jhs'
                                                );
                                                $this->db->insert("summary", $data2);
                                        
                                        
                                        ?>  
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
                    <?php } ?>
                </tbody>
            </table>

        </div>

        <div class="col-6 bg-success">
            <h2>Grade School</h2>
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($gs as $rowgs){?>
                    <tr>
                        <td><?= $rowgs['Fullname'];?></td>
                        <td>
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewresultgs<?= $rowgs['TeacherID'];?>">
                            View
                            </button>

                            <!-- The Modal -->
                            <div class="modal fade" id="viewresultgs<?= $rowgs['TeacherID'];?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title"><?= $rowgs['Fullname'];?></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <table class="table table-hover table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Strongly Disagree</th>
                                                    <th>Disagree</th>
                                                    <th>Agree</th>
                                                    <th>Strongly Agree</th>
                                                    <th>Rating</th>
                                                </tr>
                                            </thead>
                                           

                                            <tbody>
                                            <?php
                                               
                                                $gstid = $rowgs['TeacherID'];

                                                // TEACHER
                                                $sdisagree3 = $this->db->query("select sum(sdisagree) as sda
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $gstid
                                                and Department = 'GSTeacher'"); 
                                                $sda3 = $sdisagree3->row_array();

                                                $disagree3 = $this->db->query("select sum(disagree) as da
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $gstid
                                                and Department = 'GSTeacher'"); 
                                                $da3 = $disagree3->row_array();


                                                $agree3 = $this->db->query("select sum(agree) as ag
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $gstid
                                                and Department = 'GSTeacher'"); 
                                                $ag3 = $agree3->row_array();

                                                $sagree3 = $this->db->query("select sum(sagree) as sag
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $gstid
                                                and Department = 'GSTeacher'"); 
                                                $sag3 = $sagree3->row_array();

                                                // $rescountteacher = $this->db->query("select Count(resultID) as rescount
                                                // from evaluations
                                                // where Section = 'none'
                                                // and Teacher = $gstid
                                                // and Department = 'GSTeacher'"); 
                                                // $resqteacher = $rescountteacher->row_array();



                                                // SUPERVISOR
                                                $Supsdisagree3 = $this->db->query("select sum(sdisagree) as sda
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $gstid
                                                and Department = 'GSSupervisor'"); 
                                                $Supsda3 = $Supsdisagree3->row_array();

                                                $Supdisagree3 = $this->db->query("select sum(disagree) as da
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $gstid
                                                and Department = 'GSSupervisor'"); 
                                                $Supda3 = $Supdisagree3->row_array();


                                                $Supagree3 = $this->db->query("select sum(agree) as ag
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $gstid
                                                and Department = 'GSSupervisor'"); 
                                                $Supag3 = $Supagree3->row_array();

                                                $Supsagree3 = $this->db->query("select sum(sagree) as sag
                                                from evaluations
                                                where Section = 'none'
                                                and Teacher = $gstid
                                                and Department = 'GSSupervisor'"); 
                                                $Supsag3 = $Supsagree3->row_array();



                                                // $rescountsup = $this->db->query("select Count(resultID) as rescount
                                                // from evaluations
                                                // where Section = 'none'
                                                // and Teacher = $gstid
                                                // and Department = 'GSSupervisor'"); 
                                                // $resqsup = $rescountsup->row_array();


                                                $resultteacher = (($sda3['sda'] * 5) + ($da3['da'] * 10) + ($ag3['ag'] * 15) + ($sag3['sag'] * 20));

                                                $resultsupervisor = (($Supsda3['sda'] * 10) + ($Supda3['da'] * 20) + ($Supag3['ag'] * 30) + ($Supsag3['sag'] * 40));

                                                $result3 = ($resultteacher * .20) + ($resultsupervisor * .80);
                                               

                                                $data3 = array(
                                                    'Teacher' => $gstid,
                                                    'Summ' => $result3,
                                                    'dpt' => 'gs'
                                                );
                                                $this->db->insert("summary", $data3);
                                                

                                            ?>
                                                <tr>
                                                    <td><?= $sda3['sda'] + $Supsda3['sda'];?></td>
                                                    <td><?= $da3['da'] + $Supda3['da'];?></td>
                                                    <td><?= $ag3['ag'] + $Supag3['ag'];?></td>
                                                    <td><?= $sag3['sag'] + $Supsag3['sag'];?></td>
                                                    <td><?= $result3;?></td>
                                                </tr>
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
                    <?php } 
                    
                    
                    
                    ?>
                </tbody>
            </table>

        </div>






</div>