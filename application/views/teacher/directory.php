<div class="row-fluid">
    <div class="span10">
        <table class="table table-bordered">
            <tr>
                <td colspan="4" style="background-color: #0064cd;color:white;">Student Directory</td>
            </tr>
            
            <tr>
            <td class="form-inline">
                <input type="text" class="search-query" placeholder="Student's Name"/>
                <button class='btn'><i class='icon-search'></i></button>
                <div class='pull-right'>
                <select>
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
                 <select>
                    <option selected="selected" value='0'>Branch</option>
                    <option value='1'>Computer Science</option>
                    <option value='2'>Computer Science</option>
                    <option value='3'>Computer Science</option>
                    <option value='4'>Computer Science</option>
                    <option value='5'>Computer Science</option>
                    <option value='6'>Computer Science</option>
                    <option value='7'>Computer Science</option>
                    <option value='8'>Computer Science</option>
                </select>
                 <button class='btn'><i class='icon-search'></i></button>
                </div>
            </td>   
            </tr>
        
            <tr>
               
            </tr>
         
        </table> 
    </div>
  
</div>
<div class="row-fluid">
    <div class="span10">
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
            <?php for($i=0;$i<10;$i++){?>
          <tr>
                <td>Pankaj Tiwari</td>
                <td class='span1'>5</td>
                <td>Computer Science</td>
                <td class='span2'><a href='#'>View Profile</a></td>
          </tr>
            <?php } ?>
        </table> 
    </div>
  
</div>