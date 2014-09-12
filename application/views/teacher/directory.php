<div class="row-fluid">
    <div class="span11">
        <table class="table table-bordered">
            <tr>
                <td colspan="4" style="background-color: #0064cd;color:white;">Student Directory</td>
            </tr>
            
            <tr>
                  <form id='frm1' action="<?php echo URL.'index.php/teacher/search'; ?>" method='post'>
            <td class='form-inline'>
              
                <input type="text" name='student_name' class="search-query" placeholder="Student's Name"/>
                <button class='btn' onclick='document.getElementById("frm1").submit();'><i class='icon-search'></i></button>
                
                
                <div class='pull-right'>
                <select name='student_sem'>
                    <option selected="selected" value='0'>Semester</option>
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>
                    <option value='6'>6</option>
                    <option value='7'>7</option>
                    <option value='8'>8</option>
                </select>
                 <select name="student_branch">
                                   <option value="0">Select Branch</option>  
                                  <?php foreach ($branches as $branch) {?>
                                  <option value="<?php echo $branch['branch_id'];?>"><?php echo $branch['branch_name'];?></option>  
                                  <?php } ?>
                              </select>
                 <button class='btn' onclick='document.getElementById("frm1").submit();'><i class='icon-search'></i></button>
                </div>
                
            </td>
            </form>
            </tr>
        
            <tr>
               
            </tr>
         
        </table> 
    </div>
  
</div>
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
                <td class='span4'><a href='<?php echo URL.'index.php/student/profile/'.$student['roll_number'];?>'>View Profile</a>
                
                    &nbsp;&nbsp;<a href='<?php echo URL.'index.php/teacher/adopt/'.$student['roll_number'];?>'>Adopt</a>
               </td>
          </tr>
            <?php } ?>
        </table> 
        <?php } ?>
    </div>
  
</div>