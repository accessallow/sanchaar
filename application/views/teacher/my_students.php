<div class="row-fluid">
    <div class="span11">
        <?php if(isset($students)){?>
        <table class="table table-bordered">
            <tr>
                <td colspan="4" style="background-color: #0064cd;color:white;">Search Results</td>
            </tr>
            
            <tr>
                <td>Name</td>
                <td class='span1'>Semester</td>
                <td>Branch</td>
                <td class='span2'>Action</td>
            </tr>
            <?php foreach($students as $student){?>
          <tr>
                <td><?php echo $student['student_name'];?></td>
                <td class='span1'><?php echo $student['semester'];?></td>
                <td><?php echo $student['branch'];?></td>
                <td class='span4'><a href='<?php echo URL.'index.php/student/profile/'.$student['roll_number'];?>'>View Profile</a></td>
          </tr>
            <?php } ?>
        </table> 
        <?php } ?>
    </div>
  
</div>