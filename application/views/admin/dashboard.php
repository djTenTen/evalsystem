

<div class="container">
    <h1>Welcome to Evaluation System Dashboard</h1>


    
    <div class="row mt-5">

        <div class="col-4" >

            
            <div class="alert alert-success">
                <h4>Senior High Ranking</h4>
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
                        <?php foreach($teachershs as $rank){?>
                            <tr>
                                <td><?= $rank['Fullname'];?></td>
                                <td><?= $rank['Summ'];?></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            

        </div>





        <div class="col-4">

            
            <div class="alert alert-primary">
                <h4>Junior High Ranking</h4>
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
                        <?php foreach($teacherjhs as $rank){?>
                            <tr>
                                <td><?= $rank['Fullname'];?></td>
                                <td><?= $rank['Summ'];?></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>

        </div>




        <div class="col-4">

            
            <div class="alert alert-secondary">
                <h4>Grade School Ranking</h4>
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
                        <?php foreach($teachergs as $rank){?>
                            <tr>
                                <td><?= $rank['Fullname'];?></td>
                                <td><?= $rank['Summ'];?></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>

        </div>
        

        
    </div>







</div>
