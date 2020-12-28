<h2>Edit Department</h2>
<hr/>
	<?php
        $msg = $this->session->flashdata('msg');
        if (isset($msg)) {
             echo $msg;
        }
    ?>
<div class="panel-body" style="width:600px;">
    <form action="<?php echo base_url();?>department/updatedepartment" method="post">
    	 <input type="text" name="depid" value="<?php echo $depByid->depid ;?>"
        <div class="form-group">
            <label>Update Department Name</label>
            <input type="text" name="depname" value="<?php echo $depByid->depname ;?>"class="form-control span12">
        </div>
        
            
        <div class="form-group">
			<input type="submit"class="btn btn-primary" value="Submit"> 
        </div>
                   
     </form>
</div>			
   
