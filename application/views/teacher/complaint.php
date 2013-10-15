<div class="row-fluid">
    <div class="span8">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <td colspan="3" style="background-color: #0064cd;color:white;">Registered Complaints</td>
            </tr>
            
            <tr>
                <td>Complaint Id</td>
                <td>Date</td>
                <td>Subject</td>    
            </tr>
            <?php for($i=0;$i<10;$i++){?>
            <tr>
                <td>c1010121</td>
                <td>12-Aug-13</td>
                <td>orem ipsum dolor sit amet, consectetur adipiscing elit.</td>    
            </tr>
            <?php } ?>
        </table> 
    </div>
    <div class="span4">
         <table class="table table-bordered">
            <tr>
                <td colspan="2" style="background-color: #0064cd;color:white;">New Complaint</td>
            </tr>
            
            <tr>
                <td>
                    <textarea class="span12" rows="7"></textarea>
                    <button class="btn btn-primary pull-right">Submit</button>
                </td>
            </tr>
            <td colspan="2" style="background-color: #0064cd;color:white;">Update/Delete</td>
            <tr>
            <td>
                <textarea class="span12" rows="7"></textarea>
            <button class="btn btn-primary">Update</button>
            <button class="btn btn-danger">Delete</button>
            </td>
            </tr>
            <tr>
                <td>
                    <button class="btn">Register New Complaint</button>
                </td>
            </tr>
           
        </table> 
    </div>
</div>