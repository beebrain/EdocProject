<form action="<?php echo base_url()."index.php/Usercontroller/insert"?>" method="post" style="border:1px solid #ccc">
  <div class="container">
    <label for="first"><b>First Name</b></label>
    <input type="text" placeholder="Enter first name" name="first" required>

    <label for="last"><b>Last Name</b></label>
    <input type="text" placeholder="Enter last name" name="last" required>

      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
  </div>
</form>