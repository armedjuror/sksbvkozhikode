<html>
  <head>
    <link rel="stylesheet" type="text/css" href="zone\setup\style.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <div class="form-wrapper">

      <form action="#" method="post">
        <h3><font color="#ececec">Select Your portal</font></h3>

        <div class="form-item">
          <select class="form-control" name="portal" required>
            <option>Unit</option>
            <option>Range</option>
            <option>Zone</option>
          </select>
        </div>

        <div class="button-panel">
		        <input type="submit" class="button" title="Log In" name="proceed" value="Proceed"></input>
          </div>
        </form>
        <?php
	       if (isset($_POST['proceed']))
		       {
             $portal=$_POST['portal'];
             switch ($portal) {
               case 'Zone':
                header('Location: zone\login-1.php');
                break;
              case 'Range':
                header('Location: range\login-1.php');
                break;
              case 'Unit':
               header('Location: unit\login-1.php');
              default:
                echo "Unable to proceed. Please check your input.";
                break;
		}
  }
  ?>

</div>
</body>
</html>
