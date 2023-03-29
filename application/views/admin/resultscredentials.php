<div class="container">
    <h1>Teacher Ranking</h1>

    <div class="container row">

        <div class="col-5 m-3">

            <h3>Senior High Ranks</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Rank</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($shs as $s){?>
                        <tr>
                            <td>
                                <span type="button" data-bs-toggle="modal" data-bs-target="#view<?= $s['TeacherID'];?>"><?= $s['Fullname'];?></span> 
                        
                                <!-- The Modal -->
                                <div class="modal fade" id="view<?= $s['TeacherID'];?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title"><?= $s['Fullname'];?></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <table class="table table-hover table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Credentials</th>
                                                        <th>Points</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $tidshs = $s['TeacherID'];
                                                        $queryshs  = $this->db->query("select * from teacher_credentials where TeacherID = $tidshs");
                                                        foreach($queryshs->result_array() as $cshs){
                                                    ?> 
                                                    <tr>
                                                        <td><?= $cshs['CredentialName'];?></td>
                                                        <td><?= $cshs['Points'];?></td>
                                                    </tr>
                                                    <?php }?>
                                                </tbody>
                                            </table>

                                            <h5>Total: <?= $s['credentialpoints'];?></h5>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        </div>

                                        </div>
                                    </div>
                                </div>

                            </td>
                            <td>
                                <?php 
                                    if($s['credentialpoints'] <= 10){
                                        echo 'Assistant Teacher';
                                    }elseif($s['credentialpoints'] > 10 && $s['credentialpoints'] <= 15){
                                        echo 'Teacher 1';
                                    }elseif($s['credentialpoints'] > 15 && $s['credentialpoints'] <= 20){
                                        echo 'Teacher 2';
                                    }elseif($s['credentialpoints'] > 20 && $s['credentialpoints'] <= 25){
                                        echo 'Teacher 3';
                                    }elseif($s['credentialpoints'] > 25 && $s['credentialpoints'] <= 35){
                                        echo 'Assistant HT 1 / Assistant MT 1';
                                    }elseif($s['credentialpoints'] > 35 && $s['credentialpoints'] <= 40){
                                        echo 'Assistant HT 2 / Assistant MT 2';
                                    }elseif($s['credentialpoints'] > 40 && $s['credentialpoints'] <= 45){
                                        echo 'Assistant HT 2 / Assistant MT 2';
                                    }elseif($s['credentialpoints'] > 45 && $s['credentialpoints'] <= 50){
                                        echo 'Associate HT 1 / Associate MT 1';
                                    }elseif($s['credentialpoints'] > 50 && $s['credentialpoints'] <= 55){
                                        echo 'Associate HT 2 / Associate MT 2';
                                    }elseif($s['credentialpoints'] > 55 && $s['credentialpoints'] <= 60){
                                        echo 'Associate HT 3 / Associate MT 3';
                                    }elseif($s['credentialpoints'] > 60 && $s['credentialpoints'] <= 65){
                                        echo 'Associate HT 4 / Associate MT 4';
                                    }elseif($s['credentialpoints'] > 65 && $s['credentialpoints'] <= 70){
                                        echo 'Associate HT 5 / Associate MT 5';
                                    }elseif($s['credentialpoints'] > 70 && $s['credentialpoints'] <= 75){
                                        echo 'Head Teacher 1 / Master Teacher 1';
                                    }elseif($s['credentialpoints'] > 75 && $s['credentialpoints'] <= 80){
                                        echo 'Head Teacher 2 / Master Teacher 2';
                                    }elseif($s['credentialpoints'] > 80 && $s['credentialpoints'] <= 85){
                                        echo 'Head Teacher 3 / Master Teacher 3';
                                    }elseif($s['credentialpoints'] > 85 && $s['credentialpoints'] <= 90){
                                        echo 'Head Teacher 4 / Master Teacher 4';
                                    }elseif($s['credentialpoints'] > 90 && $s['credentialpoints'] <= 95){
                                        echo 'Head Teacher 5 / Master Teacher 5';
                                    }
                                ?>
                            </td>
                        </tr>        
                    <?php }?>
                </tbody>
            </table>
        </div>

        <div class="col-5 m-3">
            <h3>Junior High Ranks</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Rank</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($jhs as $js){?>
                        <tr>
                            <td>
                                <span type="button" data-bs-toggle="modal" data-bs-target="#view<?= $js['TeacherID'];?>"><?= $js['Fullname'];?></span> 
                        
                                <!-- The Modal -->
                                <div class="modal fade" id="view<?= $js['TeacherID'];?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title"><?= $js['Fullname'];?></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <table class="table table-hover table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Credentials</th>
                                                        <th>Points</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $tidjhs = $js['TeacherID'];
                                                        $queryjhs  = $this->db->query("select * from teacher_credentials where TeacherID = $tidjhs");
                                                        foreach($queryjhs->result_array() as $cjhs){
                                                    ?> 
                                                    <tr>
                                                        <td><?= $cjhs['CredentialName'];?></td>
                                                        <td><?= $cjhs['Points'];?></td>
                                                    </tr>
                                                    <?php }?>
                                                </tbody>
                                            </table>

                                            <h5>Total: <?= $js['credentialpoints'];?></h5>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        </div>

                                        </div>
                                    </div>
                                </div>

                            </td>
                            <td>
                                <?php 
                                    if($js['credentialpoints'] <= 10){
                                        echo 'Assistant Teacher';
                                    }elseif($js['credentialpoints'] > 10 && $js['credentialpoints'] <= 15){
                                        echo 'Teacher 1';
                                    }elseif($js['credentialpoints'] > 15 && $js['credentialpoints'] <= 20){
                                        echo 'Teacher 2';
                                    }elseif($js['credentialpoints'] > 20 && $js['credentialpoints'] <= 25){
                                        echo 'Teacher 3';
                                    }elseif($js['credentialpoints'] > 25 && $js['credentialpoints'] <= 35){
                                        echo 'Assistant HT 1 / Assistant MT 1';
                                    }elseif($js['credentialpoints'] > 35 && $js['credentialpoints'] <= 40){
                                        echo 'Assistant HT 2 / Assistant MT 2';
                                    }elseif($js['credentialpoints'] > 40 && $js['credentialpoints'] <= 45){
                                        echo 'Assistant HT 2 / Assistant MT 2';
                                    }elseif($js['credentialpoints'] > 45 && $js['credentialpoints'] <= 50){
                                        echo 'Associate HT 1 / Associate MT 1';
                                    }elseif($js['credentialpoints'] > 50 && $js['credentialpoints'] <= 55){
                                        echo 'Associate HT 2 / Associate MT 2';
                                    }elseif($js['credentialpoints'] > 55 && $js['credentialpoints'] <= 60){
                                        echo 'Associate HT 3 / Associate MT 3';
                                    }elseif($js['credentialpoints'] > 60 && $js['credentialpoints'] <= 65){
                                        echo 'Associate HT 4 / Associate MT 4';
                                    }elseif($js['credentialpoints'] > 65 && $js['credentialpoints'] <= 70){
                                        echo 'Associate HT 5 / Associate MT 5';
                                    }elseif($js['credentialpoints'] > 70 && $js['credentialpoints'] <= 75){
                                        echo 'Head Teacher 1 / Master Teacher 1';
                                    }elseif($js['credentialpoints'] > 75 && $js['credentialpoints'] <= 80){
                                        echo 'Head Teacher 2 / Master Teacher 2';
                                    }elseif($js['credentialpoints'] > 80 && $js['credentialpoints'] <= 85){
                                        echo 'Head Teacher 3 / Master Teacher 3';
                                    }elseif($js['credentialpoints'] > 85 && $js['credentialpoints'] <= 90){
                                        echo 'Head Teacher 4 / Master Teacher 4';
                                    }elseif($js['credentialpoints'] > 90 && $js['credentialpoints'] <= 95){
                                        echo 'Head Teacher 5 / Master Teacher 5';
                                    }
                                ?>
                            </td>
                        </tr>        
                    <?php }?>
                </tbody>
            </table>
        </div>
        
        

        <div class="col-5 m-3">
            <h3>Grade School Ranks</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Rank</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($gs as $g){?>
                        <tr>
                            <td>
                                <span type="button" data-bs-toggle="modal" data-bs-target="#view<?= $g['TeacherID'];?>"><?= $g['Fullname'];?></span> 
                        
                                <!-- The Modal -->
                                <div class="modal fade" id="view<?= $g['TeacherID'];?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title"><?= $g['Fullname'];?></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <table class="table table-hover table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Credentials</th>
                                                        <th>Points</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $tidgs = $g['TeacherID'];
                                                        $querygs  = $this->db->query("select * from teacher_credentials where TeacherID = $tidgs");
                                                        foreach($querygs->result_array() as $cgs){
                                                    ?> 
                                                    <tr>
                                                        <td><?= $cgs['CredentialName'];?></td>
                                                        <td><?= $cgs['Points'];?></td>
                                                    </tr>
                                                    <?php }?>
                                                </tbody>
                                            </table>

                                            <h5>Total: <?= $g['credentialpoints'];?></h5>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        </div>

                                        </div>
                                    </div>
                                </div>

                            </td>
                            <td>
                                <?php 
                                    if($g['credentialpoints'] <= 10){
                                        echo 'Assistant Teacher';
                                    }elseif($g['credentialpoints'] > 10 && $g['credentialpoints'] <= 15){
                                        echo 'Teacher 1';
                                    }elseif($g['credentialpoints'] > 15 && $g['credentialpoints'] <= 20){
                                        echo 'Teacher 2';
                                    }elseif($g['credentialpoints'] > 20 && $g['credentialpoints'] <= 25){
                                        echo 'Teacher 3';
                                    }elseif($g['credentialpoints'] > 25 && $g['credentialpoints'] <= 35){
                                        echo 'Assistant HT 1 / Assistant MT 1';
                                    }elseif($g['credentialpoints'] > 35 && $g['credentialpoints'] <= 40){
                                        echo 'Assistant HT 2 / Assistant MT 2';
                                    }elseif($g['credentialpoints'] > 40 && $g['credentialpoints'] <= 45){
                                        echo 'Assistant HT 2 / Assistant MT 2';
                                    }elseif($g['credentialpoints'] > 45 && $g['credentialpoints'] <= 50){
                                        echo 'Associate HT 1 / Associate MT 1';
                                    }elseif($g['credentialpoints'] > 50 && $g['credentialpoints'] <= 55){
                                        echo 'Associate HT 2 / Associate MT 2';
                                    }elseif($g['credentialpoints'] > 55 && $g['credentialpoints'] <= 60){
                                        echo 'Associate HT 3 / Associate MT 3';
                                    }elseif($g['credentialpoints'] > 60 && $g['credentialpoints'] <= 65){
                                        echo 'Associate HT 4 / Associate MT 4';
                                    }elseif($g['credentialpoints'] > 65 && $g['credentialpoints'] <= 70){
                                        echo 'Associate HT 5 / Associate MT 5';
                                    }elseif($g['credentialpoints'] > 70 && $g['credentialpoints'] <= 75){
                                        echo 'Head Teacher 1 / Master Teacher 1';
                                    }elseif($g['credentialpoints'] > 75 && $g['credentialpoints'] <= 80){
                                        echo 'Head Teacher 2 / Master Teacher 2';
                                    }elseif($g['credentialpoints'] > 80 && $g['credentialpoints'] <= 85){
                                        echo 'Head Teacher 3 / Master Teacher 3';
                                    }elseif($g['credentialpoints'] > 85 && $g['credentialpoints'] <= 90){
                                        echo 'Head Teacher 4 / Master Teacher 4';
                                    }elseif($g['credentialpoints'] > 90 && $g['credentialpoints'] <= 95){
                                        echo 'Head Teacher 5 / Master Teacher 5';
                                    }
                                ?>
                            </td>
                        </tr>        
                    <?php }?>
                </tbody>
            </table>
        </div>
        
    </div>
    

</div>