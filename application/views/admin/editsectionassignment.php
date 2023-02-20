<div class="container">

    <h1>This is Edit Section Assignment</h1>



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
                    <button class="btn btn-sm btn-danger">Remove</button>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>