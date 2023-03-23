
<div class="container">
    <h1>Evaluation and Ranking System </h1>
    

    <div class="row">
    
        <div class="mt-5 col-6">
            <h3>Performance </h3>
            <div class="col-12" >

                
                <div class="alert alert-success">
                    <h4>Senior High Performance</h4>
                </div>

                <div class="overflow-auto" style="height: 300px">
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($teachershsPerformance as $rank){?>
                                <tr>
                                    <td><?= $rank['Fullname'];?></td>
                                    <td><?= $rank['SummPerformance'];?></td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
                

            </div>





            <div class="col-12">

                
                <div class="alert alert-primary">
                    <h4>Junior High Performance</h4>
                </div>
                <div class="overflow-auto" style="height: 300px">
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($teacherjhsPerformance as $rank){?>
                                <tr>
                                    <td><?= $rank['Fullname'];?></td>
                                    <td><?= $rank['SummPerformance'];?></td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>

            </div>




            <div class="col-12">

                
                <div class="alert alert-secondary">
                    <h4>Grade School Preformance</h4>
                </div>
                <div class="overflow-auto" style="height: 300px">
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($teachergsPerformance as $rank){?>
                                <tr>
                                    <td><?= $rank['Fullname'];?></td>
                                    <td><?= $rank['SummPerformance'];?></td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>

            </div>
            

            
        </div>



        <div class="mt-5 col-6">
            <h3>Credentials</h3>
            <div class="col-12" >

                
                <div class="alert alert-success">
                    <h4>Senior High Credentials</h4>
                </div>

                <div class="overflow-auto" style="height: 300px">
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($teachershsCredentials as $rank){?>
                                <tr>
                                    <td><?= $rank['Fullname'];?></td>
                                    <td><?= $rank['SummCredentials'];?></td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
                

            </div>





            <div class="col-12">

                
                <div class="alert alert-primary">
                    <h4>Junior High Credentials</h4>
                </div>
                <div class="overflow-auto" style="height: 300px">
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($teacherjhsCredentials as $rank){?>
                                <tr>
                                    <td><?= $rank['Fullname'];?></td>
                                    <td><?= $rank['SummCredentials'];?></td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>

            </div>




            <div class="col-12">

                
                <div class="alert alert-secondary">
                    <h4>Grade School Credentials</h4>
                </div>
                <div class="overflow-auto" style="height: 300px">
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($teachergsCredentials as $rank){?>
                                <tr>
                                    <td><?= $rank['Fullname'];?></td>
                                    <td><?= $rank['SummCredentials'];?></td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>

            </div>
            

            
        </div>


    </div>





</div>
