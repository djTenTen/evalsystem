<div class="container">
    <h1>Teacher Credentials</h1>

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
                            <a class="btn btn-primary" href="viewcredentials/<?= $row['TeacherID'];?>">View</a>
                        </div>

                    </td>
                </tr>

            <?php }?>
            </tbody>
        </table>
    </div>


























</div>