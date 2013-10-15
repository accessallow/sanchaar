<div class='row-fluid'>
    <div class='span8'>
                  <table class='table table-bordered' >
                      <tr style="background-color: #0064cd;color:white;">
                          <td colspan="4">Inbox</td>
                      </tr>
                       <tr>
                          <td colspan="4">
                              <div class="pull-right">
                                    
                            &nbsp;  <button class='btn' id='btn2' data-toggle="tooltip" title="Delete"><i class='icon-trash'></i> Delete</button>  
                              </div>
                              
                          </td>
                      </tr>
                      <tr>
                          <td style="width: 20px;"><center><input type="checkbox"/></center></td>
                          <td>Sender</td>
                          <td class="span2">Time</td>
                          <td class='span2'>Date</td>
                          
                      </tr>
                    <?php 
                    for($i=0;$i<10;$i++){ ?>
                      <tr>
                          <td><center><input type="checkbox"/></center></td>
                          <td>Sanjana Subhash</td>
                           <td>4:45 PM</td>
                          <td>11-Oct-2013</td>
                      </tr>         
                   <?php }?>
                  </table>
    </div>
    <div class='span4'>
        <table class='table table-bordered'>
            <tr>
                <td style="background-color: #0064cd;color:white;">Sender's Name</td>
          
            </tr>
            <tr>  <td><textarea class='span12 uneditable-textarea'> </textarea> </td>
        
            </tr>
             <tr>  
             <td>
                 <button onclick='send_enable();'class='btn' id='btn1' data-toggle="tooltip" title="Reply"><i class='icon-retweet'></i> Reply</button>          
                 <button class='btn' id='btn2' data-toggle="tooltip" title="Delete"><i class='icon-trash'></i> Delete</button>  
                  <button class='hidden' id='btn3' data-toggle="tooltip" title="Delete"><i class='icon-ok icon-white'></i> Send</button>  
                 
             </td>
             </tr>
        </table>
        
        
       
        
       
    </div>
</div>
<script>
    function send_enable(){
        document.getElementById("btn3").class="btn btn-success";
    }
    
</script>