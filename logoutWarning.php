<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


<script>


    $(document).ready(function(){
        
        $("#modal").modal("show");
    });
    
    
    
    </script>
      
    <div class="modal" id = "modal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Login Warning</h5>
              <span aria-hidden="true"></span>
            </button>
          </div>
          <div class="modal-body">
            <p>We detect You Have Login To Another Account. Do You Want To Log Out First?</p>
          </div>
          <div class="modal-footer">
            <form method = "post" action = "loginProcess.php">
              <input type = "hidden" name = "ic" value = "<?php echo $_POST['ic']?>">
              <input type = "hidden" name = "password" value = "<?php echo $_POST['password']?>">
              <input class="btn btn-warning" type = "submit" name = "logOutFirst" value = "Yes">
            </form>
            <a class="btn btn-secondary" href = "login.php">No</a>
          </div>
        </div>
      </div>
    </div>

</body>
</html>