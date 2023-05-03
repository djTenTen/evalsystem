
<div class="container">
    <h1>Evaluation and Ranking System </h1>

    <div class="row">
        <div class="col-6">
            <h2>Senior High</h2>
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                    
                    $this->db->query("delete from summary");
                    foreach($shs as $rowshs){
                        $summ1 = 0;?>
                    <tr>
                        <td> <span type="button" data-bs-toggle="modal" data-bs-target="#viewresultshs<?= $rowshs['TeacherID'];?>"><?= $rowshs['Fullname'];?></span></td>
                        <td>
                           

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
                                    
                                        <?php 

                                            $shstid = $rowshs['TeacherID'];
                                            $query1 = $this->db->query("select Section,section.SectionID
                                            from section,assign_section
                                            where assign_section.SectionID = section.SectionID
                                            and Department = 'Seniorhigh'
                                            and assign_section.teacherID = $shstid");

                                            if(empty($query1->result_array()) || $query1->result_array() == null){
                                                $resultStudentSHS = 0;
                                                $resultTeacherSHS = 0;
                                                $resultSupervisorSHS = 0;
                                                $credpointsshs = 0;
                                                $credpointsshsA = 0;
                                                $credpointsshsB = 0;
                                                $credpointsshsC = 0;
                                                $credpointsshsD = 0;
                                            }

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


                                                $shscredential = $this->db->query("select sum(Points) as points 
                                                from teacher_credentials 
                                                where TeacherID = $shstid");
                                                $points = $shscredential->row_array();
                                                $credpointsshs = $points['points'];
                                                if($points['points'] == null){
                                                    $credpointsshs = 0;
                                                }

                                                $shscredentialA = $this->db->query("select sum(Points) as points 
                                                from teacher_credentials 
                                                where TeacherID = $shstid
                                                and Category = 'A'");
                                                $pointsA = $shscredentialA->row_array();
                                                $credpointsshsA = $pointsA['points'];
                                                if($pointsA['points'] == null){
                                                    $credpointsshsA = 0;
                                                }

                                                $shscredentialB = $this->db->query("select sum(Points) as points 
                                                from teacher_credentials 
                                                where TeacherID = $shstid
                                                and Category = 'B'");
                                                $pointsB = $shscredentialB->row_array();
                                                $credpointsshsB = $pointsB['points'];
                                                if($pointsB['points'] == null){
                                                    $credpointsshsB = 0;
                                                }

                                                $shscredentialC = $this->db->query("select sum(Points) as points 
                                                from teacher_credentials 
                                                where TeacherID = $shstid
                                                and Category = 'C'");
                                                $pointsC = $shscredentialC->row_array();
                                                $credpointsshsC = $pointsC['points'];
                                                if($pointsC['points'] == null){
                                                    $credpointsshsC = 0;
                                                }


                                                $shscredentialD = $this->db->query("select sum(Points) as points 
                                                from teacher_credentials 
                                                where TeacherID = $shstid
                                                and Category = 'D'");
                                                $pointsD = $shscredentialD->row_array();
                                                $credpointsshsD = $pointsD['points'];
                                                if($pointsD['points'] == null){
                                                    $credpointsshsD = 0;
                                                }


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
                                                
                                                              
                                                $summ1 = $summ1 + $resultStudentSHS;
                                                    
                                            } 


                                                // 40% of supervisor, 40% of Students and 20% of Teachers
                                                $performanceshs = ($resultSupervisorSHS * .40) + ($resultTeacherSHS * .20) + ($summ1 * .40);
                                                
                                                $data1 = array(
                                                    'Teacher' => $shstid,
                                                    'SummPerformance' => $performanceshs,
                                                    'SummCredentials' => $credpointsshs,
                                                    'dpt' => 'shs'
                                                );
                                                $this->db->insert("summary", $data1);

                                                
                                                $rank = $this->Dashboard_model->getRank($credpointsshs);

                                                $credpointsshsB = $this->Dashboard_model->getPerformanceScore($performanceshs);

                                                
                                        ?>


                                        <table class="table table-hover table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Category</th>
                                                    <th>Score</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Academic and Professional Development</td>
                                                    <td><?= $credpointsshsA;?></td>
                                                </tr>
                                                <tr>
                                                    <td>Work Efficiency and Teaching Performance Effectiveness</td>
                                                    <td><?= $credpointsshsB['Points'];?></td>
                                                </tr>
                                                <tr>
                                                    <td>Community and Extension Service</td>
                                                    <td><?= $credpointsshsC;?></td>
                                                </tr>
                                                <tr>
                                                    <td>Work Experiences</td>
                                                    <td><?= $credpointsshsD;?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><h3>Total: <?= $credpointsshsA + $credpointsshsB['Points'] + $credpointsshsC + $credpointsshsD;?></h3></td>
                                                </tr>
                                            </tbody>
                                        </table>


                                        
                                        

                                        <?= form_open('exportresults/'.$credpointsshsA.'/'.$credpointsshsB['Points'].'/'.$credpointsshsB['Remarks'].'/'.$credpointsshsC.'/'.$credpointsshsD.'/'.$performanceshs.'/'.$resultSupervisorSHS.'/'.$resultTeacherSHS.'/'.$summ1.'/'.$rowshs['TeacherID'].'/'.'Senior_High'.'/'.$rank);?>
                                            <button type="submit" class="btn btn-success">Export Data</button>   
                                        <?= form_close();?>


                                        <div id="myPlotshs<?= $rowshs['TeacherID']?>" style="width:100%;max-width:700px"></div>

                                        <script>
                                            const xArrayshs<?= $rowshs['TeacherID']?> = ['Self Assessment', 'Supervisor Assessment', 'Student rating', 'Credential rating'];
                                            const yArrayshs<?= $rowshs['TeacherID']?> = [parseInt('<?= $resultTeacherSHS;?>'), <?= $resultSupervisorSHS;?>, parseInt('<?= $resultStudentSHS;?>'), parseInt('<?= $credpointsshs;?>')];
                                            const layoutshs<?= $rowshs['TeacherID']?> = {title:"<?= $rowshs['Fullname'];?>"};
                                            const datashs<?= $rowshs['TeacherID']?> = [{labels:xArrayshs<?= $rowshs['TeacherID']?>, values:yArrayshs<?= $rowshs['TeacherID']?>, type:"pie"}];

                                            Plotly.newPlot("myPlotshs<?= $rowshs['TeacherID']?>", datashs<?= $rowshs['TeacherID']?>, layoutshs<?= $rowshs['TeacherID']?>);
                                        </script>
                                        
                                        <?php 
                                            $resultSupervisorSHS = 0;
                                            $resultTeacherSHS = 0;
                                            $resultStudentSHS = 0;
                                            $performanceshs =0;
                                            $credpointsshs =0;
                                        ?>


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

        <div class="col-6">
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
                        <td> <span type="button" data-bs-toggle="modal" data-bs-target="#viewresultshs<?= $rowjhs['TeacherID'];?>"><?= $rowjhs['Fullname'];?></span></td>
                        <td>
                            <!-- The Modal -->
                            <div class="modal fade" id="viewresultshs<?= $rowjhs['TeacherID'];?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title"><?= $rowjhs['Fullname'];?></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">

                                        <?php 

                                            $jhstid = $rowjhs['TeacherID'];
                                            $query2 = $this->db->query("select Section,section.SectionID
                                            from section,assign_section
                                            where assign_section.SectionID = section.SectionID
                                            and Department = 'Juniorhigh'
                                            and assign_section.teacherID = $jhstid");


                                            if(empty($query2->result_array()) || $query2->result_array() == null){
                                                $resultStudentJHS = 0;
                                                $resultTeacherJHS = 0;
                                                $resultSupervisorJHS = 0;
                                                $credpointsjhs = 0;
                                                $credpointsjhsA = 0;
                                                $credpointsjhsB = 0;
                                                $credpointsjhsC = 0;
                                                $credpointsjhsD = 0;
                                            }

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



                                                $jhscredential = $this->db->query("select sum(Points) as points 
                                                from teacher_credentials 
                                                where TeacherID = $jhstid");
                                                $pointsjhs = $jhscredential->row_array();
                                                $credpointsjhs = $pointsjhs['points'];
                                                if($pointsjhs['points'] == null){
                                                    $credpointsjhs = 0;
                                                }

                                                $jhscredentialA = $this->db->query("select sum(Points) as points 
                                                from teacher_credentials 
                                                where TeacherID = $jhstid
                                                and Category = 'A'");
                                                $pointsA = $jhscredentialA->row_array();
                                                $credpointsjhsA = $pointsA['points'];
                                                if($pointsA['points'] == null){
                                                    $credpointsjhsA = 0;
                                                }

                                                $jhscredentialB = $this->db->query("select sum(Points) as points 
                                                from teacher_credentials 
                                                where TeacherID = $jhstid
                                                and Category = 'B'");
                                                $pointsB = $jhscredentialB->row_array();
                                                $credpointsjhsB = $pointsB['points'];
                                                if($pointsB['points'] == null){
                                                    $credpointsjhsB = 0;
                                                }

                                                $jhscredentialC = $this->db->query("select sum(Points) as points 
                                                from teacher_credentials 
                                                where TeacherID = $jhstid
                                                and Category = 'C'");
                                                $pointsC = $jhscredentialC->row_array();
                                                $credpointsjhsC = $pointsC['points'];
                                                if($pointsC['points'] == null){
                                                    $credpointsjhsC = 0;
                                                }


                                                $jhscredentialD = $this->db->query("select sum(Points) as points 
                                                from teacher_credentials 
                                                where TeacherID = $jhstid
                                                and Category = 'D'");
                                                $pointsD = $jhscredentialD->row_array();
                                                $credpointsjhsD = $pointsD['points'];
                                                if($pointsD['points'] == null){
                                                    $credpointsjhsD = 0;
                                                }

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
       
                                                              
                                                $summ2 = $summ2 + $resultStudentJHS;
                                                    
                                            } 
                                                // 40% of supervisor, 40% of Students and 20% of Teachers
                                                $performancejhs = ($resultSupervisorJHS * .40) + ($resultTeacherJHS * .20) + ($summ2 * .40);
                                                
                                                $data1 = array(
                                                    'Teacher' => $jhstid,
                                                    'SummPerformance' => $performancejhs,
                                                    'SummCredentials' => $credpointsjhs,
                                                    'dpt' => 'jhs'
                                                );
                                                $this->db->insert("summary", $data1);


                                                $rankjhs = $this->Dashboard_model->getRank($credpointsjhs);

                                                $credpointsjhsB = $this->Dashboard_model->getPerformanceScore($performancejhs);


                                        ?>  



                                        <table class="table table-hover table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Category</th>
                                                    <th>Score</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Academic and Professional Development</td>
                                                    <td><?= $credpointsjhsA;?></td>
                                                </tr>
                                                <tr>
                                                    <td>Work Efficiency and Teaching Performance Effectiveness</td>
                                                    <td><?= $credpointsjhsB['Points'];?></td>
                                                </tr>
                                                <tr>
                                                    <td>Community and Extension Service</td>
                                                    <td><?= $credpointsjhsC;?></td>
                                                </tr>
                                                <tr>
                                                    <td>Work Experiences</td>
                                                    <td><?= $credpointsjhsD;?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><h3>Total: <?= $credpointsjhsA + $credpointsjhsB['Points'] + $credpointsjhsC + $credpointsjhsD;?></h3></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                        <?= form_open('exportresults/'.$credpointsjhsA.'/'.$credpointsjhsB['Points'].'/'.$credpointsjhsB['Remarks'].'/'.$credpointsjhsC.'/'.$credpointsjhsD.'/'.$performancejhs.'/'.$resultSupervisorJHS.'/'.$resultTeacherJHS.'/'.$summ2.'/'.$rowjhs['TeacherID'].'/'.'Junior_High'.'/'.$rankjhs);?>
                                            <button type="submit" class="btn btn-success">Export Data</button>   
                                        <?= form_close();?>

                                        <div id="myPlotjhs<?= $rowjhs['TeacherID']?>" style="width:100%;max-width:700px"></div>

                                        <script>
                                            const xArrayjhs<?= $rowjhs['TeacherID']?> = ['Self Assessment', 'Supervisor Assessment', 'Student rating', 'Credential rating'];
                                            const yArrayjhs<?= $rowjhs['TeacherID']?> = [parseInt('<?= $resultTeacherJHS;?>'), <?= $resultSupervisorJHS;?>, parseInt('<?= $resultStudentJHS;?>'), parseInt('<?= $credpointsjhs;?>')];
                                            const layoutjhs<?= $rowjhs['TeacherID']?> = {title:"<?= $rowjhs['Fullname'];?>"};
                                            const datajhs<?= $rowjhs['TeacherID']?> = [{labels:xArrayjhs<?= $rowjhs['TeacherID']?>, values:yArrayjhs<?= $rowjhs['TeacherID']?>, type:"pie"}];

                                            Plotly.newPlot("myPlotjhs<?= $rowjhs['TeacherID']?>", datajhs<?= $rowjhs['TeacherID']?>, layoutjhs<?= $rowjhs['TeacherID']?>);
                                        </script>


                                        <?php 
                                            $resultSupervisorJHS = 0;
                                            $resultTeacherJHS = 0;
                                            $overalljhs = 0;
                                            $credpointsjhs = 0;
                                        ?>
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

        <div class="col-6">
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
                        <td> <span type="button" data-bs-toggle="modal" data-bs-target="#viewresultgs<?= $rowgs['TeacherID'];?>"><?= $rowgs['Fullname'];?></span></td>
                        <td>

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




                                                $gscredential = $this->db->query("select sum(Points) as points 
                                                from teacher_credentials 
                                                where TeacherID = $gstid");
                                                $pointsgs = $gscredential->row_array();
                                                $credpointsgs = $pointsgs['points'];

                                                if($pointsgs['points'] == null){
                                                    $credpointsgs = 0;
                                                }


                                                $gscredentialA = $this->db->query("select sum(Points) as points 
                                                from teacher_credentials 
                                                where TeacherID = $gstid
                                                and Category = 'A'");
                                                $pointsA = $gscredentialA->row_array();
                                                $credpointsgsA = $pointsA['points'];
                                                if($pointsA['points'] == null){
                                                    $credpointsgsA = 0;
                                                }

                                                $gscredentialB = $this->db->query("select sum(Points) as points 
                                                from teacher_credentials 
                                                where TeacherID = $gstid
                                                and Category = 'B'");
                                                $pointsB = $gscredentialB->row_array();
                                                $credpointsgsB = $pointsB['points'];
                                                if($pointsB['points'] == null){
                                                    $credpointsgsB = 0;
                                                }

                                                $gscredentialC = $this->db->query("select sum(Points) as points 
                                                from teacher_credentials 
                                                where TeacherID = $gstid
                                                and Category = 'C'");
                                                $pointsC = $gscredentialC->row_array();
                                                $credpointsgsC = $pointsC['points'];
                                                if($pointsC['points'] == null){
                                                    $credpointsgsC = 0;
                                                }


                                                $gscredentialD = $this->db->query("select sum(Points) as points 
                                                from teacher_credentials 
                                                where TeacherID = $gstid
                                                and Category = 'D'");
                                                $pointsD = $gscredentialD->row_array();
                                                $credpointsgsD = $pointsD['points'];
                                                if($pointsD['points'] == null){
                                                    $credpointsgsD = 0;
                                                }



                                                // $rescountsup = $this->db->query("select Count(resultID) as rescount
                                                // from evaluations
                                                // where Section = 'none'
                                                // and Teacher = $gstid
                                                // and Department = 'GSSupervisor'"); 
                                                // $resqsup = $rescountsup->row_array();


                                                $resultteachergs = (($sda3['sda'] * 5) + ($da3['da'] * 10) + ($ag3['ag'] * 15) + ($sag3['sag'] * 20));

                                                $resultsupervisorgs = (($Supsda3['sda'] * 10) + ($Supda3['da'] * 20) + ($Supag3['ag'] * 30) + ($Supsag3['sag'] * 40));

                                                $performancegs = ($resultteachergs * .20) + ($resultsupervisorgs * .80);
                                               

                                                 $data3 = array(
                                                    'Teacher' => $gstid,
                                                    'SummPerformance' => $performancegs,
                                                    'SummCredentials' => $credpointsgs,
                                                    'dpt' => 'gs'
                                                );
                                                $this->db->insert("summary", $data3);

                                                $rankgs = $this->Dashboard_model->getRank($credpointsgs);

                                                $credpointsgsB = $this->Dashboard_model->getPerformanceScore($performancegs);
                                                
                                            ?>

                                        <table class="table table-hover table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Category</th>
                                                    <th>Score</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Academic and Professional Development</td>
                                                    <td><?= $credpointsgsA;?></td>
                                                </tr>
                                                <tr>
                                                    <td>Work Efficiency and Teaching Performance Effectiveness</td>
                                                    <td><?= $credpointsgsB['Points'];?></td>
                                                </tr>
                                                <tr>
                                                    <td>Community and Extension Service</td>
                                                    <td><?= $credpointsgsC;?></td>
                                                </tr>
                                                <tr>
                                                    <td>Work Experiences</td>
                                                    <td><?= $credpointsgsD;?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><h3>Total: <?= $credpointsgsA + $credpointsgsB['Points'] + $credpointsgsC + $credpointsgsD;?></h3></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                        <?= form_open('exportresults/'.$credpointsgsA.'/'.$credpointsgsB['Points'].'/'.$credpointsgsB['Remarks'].'/'.$credpointsgsC.'/'.$credpointsgsD.'/'.$performancegs.'/'.$resultsupervisorgs.'/'.$resultteachergs.'/'.'0'.'/'.$rowgs['TeacherID'].'/'.'Grade_School'.'/'.$rankgs);?>
                                            <button type="submit" class="btn btn-success">Export Data</button>   
                                        <?= form_close();?>

                                        <div id="myPlotgs<?= $rowgs['TeacherID']?>" style="width:100%;max-width:700px"></div>

                                        <script>
                                            const xArraygs<?= $rowgs['TeacherID']?> = ['Self Assessment', 'Supervisor Assessment', 'Performance rating', 'Credential rating'];
                                            const yArraygs<?= $rowgs['TeacherID']?> = [parseInt('<?= $resultteachergs;?>'), <?= $resultsupervisorgs;?>, parseInt('<?= $performancegs;?>'), parseInt('<?= $credpointsgs;?>')];
                                            const layoutgs<?= $rowgs['TeacherID']?> = {title:"<?= $rowgs['Fullname'];?>"};
                                            const datags<?= $rowgs['TeacherID']?> = [{labels:xArraygs<?= $rowgs['TeacherID']?>, values:yArraygs<?= $rowgs['TeacherID']?>, type:"pie"}];

                                            Plotly.newPlot("myPlotgs<?= $rowgs['TeacherID']?>", datags<?= $rowgs['TeacherID']?>, layoutgs<?= $rowgs['TeacherID']?>);
                                        </script>

                                        <?php 
                                            $resultsupervisorgs = 0;
                                            $resultteachergs = 0;
                                            $overallgs = 0;
                                            $credpointsgs = 0;
                                        ?>

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

</div>
