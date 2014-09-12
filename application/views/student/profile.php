<div class="row-fluid">
    <div class="span10">
        <table class="table table-bordered">
            <tr>
                <td colspan="4" style="background-color: #0064cd;color:white;">Student Profile</td>
            </tr>
            
            <tr>
                <td rowspan="3" style='width: 150px;'><img src="<?php echo IMAGE_SERVER.'getimage.php?id='.$roll_number;?>" 
                                                   class="img-polaroid"
                                                   style='width:130px;height: 150px;'/></td>
               
            </tr>
        
            <tr>
                <td>
                    <?php
                    switch($semester){
                        case '1':$suffix='st';break;
                        case '2':$suffix='nd';break;
                        case '3':$suffix='rd';break;
                        default:$suffix='th';
                    }
                    ?>
            <table class="table table-bordered">
                <tr><td><?php echo $student_name; ?></td></tr>
                <tr><td>Semester: <?php echo $semester.''.$suffix; ?></td></tr>
                <tr><td><?php echo $branch; ?></td></tr>
                
            </table>
                    <button class="btn"><i class="icon-envelope"></i> Send Message</button>
                </td>
            </tr>
         
        </table> 
    </div>
  
</div>