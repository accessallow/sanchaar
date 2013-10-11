<div class='row-fluid'>
    <div class='span8'>
                  <table class='table table-bordered'>
                      <tr>
                          <td colspan="4">Inbox</td>
                      </tr>
                    <?php 
                    for($i=0;$i<10;$i++){ ?>
                      <tr>
                          <td>abcdef</td>
                      </tr>         
                   <?php }?>
                  </table>
    </div>
    <div class='span4'>
        <table class='table table-bordered'>
            <tr>
                <td>Sender's Name</td>
          
            </tr>
            <tr>  <td><textarea class='span12 uneditable-textarea'> </textarea> </td>
        
            </tr>
             <tr>  
             <td>
                 <button onclick='send_enable();'class='btn' id='btn1' data-toggle="tooltip" title="Reply"><i class='icon-retweet'></i></button>          
                 <button class='btn' id='btn2' data-toggle="tooltip" title="Delete"><i class='icon-trash'></i></button>  
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