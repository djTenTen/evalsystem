<div class="container">

    <h1>Edit Section Assignment</h1>



    <?= form_open('add');?>
    
    <div class="col-6">
        <select name="" id="" class="form-select">
            <option value="">Select Section</option>
            <?php foreach($sections as $sec){?>
                <option value=""><?= $sec['Section'];?></option>
            <?php }?>
        </select>
        
        <button type="submit" class="btn btn-success" >Add</button>
    </div>

       

    <?= form_close();?>



    <table class="table">
        <thead>
            <tr>
                <th>Section ID</th>
                <th>Level</th>
                <th>Section</th>
                <th>Department</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($mysections as $row){?>
            <tr>
                <td><?= $row['SectionID'];?></td>
                <td><?= $row['Year'];?></td>
                <td><?= $row['Section'];?></td>
                <td><?= $row['Department'];?></td>
                <td>
                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#remove<?= $row['SectionID'];?>">Remove</button>
                    <!-- Button to Open the Modal -->
                    <!-- The Modal -->
                    <div class="modal fade" id="remove<?= $row['SectionID'];?>">
                        <div class="modal-dialog">
                            <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title"><?= $row['Section'];?></h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                Are you sure to delete this Section <strong><?= $row['Section'];?></strong>?
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <?= form_open("removeteachersection/".$TeacherID. "/". $row['SectionID']); ?>
                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                <?= form_close(); ?>
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
