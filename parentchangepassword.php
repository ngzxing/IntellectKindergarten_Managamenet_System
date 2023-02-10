<?php  
include 'parentsession.php'; 
if(!session_id())
{ 
  session_start(); 
}

include 'headerparent.php';
include('dbconnect.php');

if(isset($_GET['id']))
{
    $pic = $_GET['id'];
}

$sql = "SELECT * FROM parent WHERE parent_ic = '$pic'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

?> 

<head>
<script type="text/javascript">
  function check_pass() 
  {
    if(document.chngpwd.ppassword.value!= document.chngpwd.confirm_password.value)
    {
      alert("Password and Confirm Password Field do not match  !!");
      document.chngpwd.confirm_password.focus();
      return false;
    }
      return true;
    }
    // let oldpassword = document.forms["parentChangePwd"]["oldpassword"].value;
    // let ppassword = document.forms["parentChangePwd"]["ppassword"].value;
    // let confirm_password = document.forms["parentChangePwd"]["confirm_password"].value; 

    //  if(oldpassword != $row['parent_pwd'])
    // {
    //     event.preventDefault();
    //     alert("Password Does Not Match");
    //     return false;
    // }
    //  else if (ppassword != confirm_password)
    // {
    //     event.preventDefault();
    //     alert("Password Does Not Match");
    //     return false;
    // }
    //  else 
    // {
    //     return true;
    // }


</script>
</head>
<div class="container">
  <br>
  <form name = chngpwd method="POST" action="parentchangepasswordprocess.php" onsubmit = "return check_pass();">
  <form>
    <fieldset>
              <legend>Change Password</legend>

                <div class="form-group">
                  <label for="exampleInputPassword1" class="form-label mt-4">Old Password</label>
                  <input type="password" name="oldpassword" class="form-control" id="oldpassword" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1" class="form-label mt-4">New Password</label>
                  <input type="password" name="ppassword" class="form-control" id="newpassword" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1" class="form-label mt-4">Confirm Password</label>
                  <input type="password" name="confirm_password" class="form-control" id="confirmpassword" required>
                </div>

               

                <input type="hidden" name="pic" value="<?php echo $row['parent_ic']?>">

                <br>
                <button type="submit" class="btn btn-success">Update</button>
                <button type="reset" class="btn btn-dark">Clear</button>
          </fieldset>
        </form>

        </div>

    </div>

    </div>
  </div>
