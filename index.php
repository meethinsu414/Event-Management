<?php 
  // include('connect.php');
  // session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js"></script>

    <title></title>
  </head>
  <body>
    
    <section class="main-wrapper">
      <div class="container">
        
        <?php 
          session_start(); 
          if (isset($_SESSION['done'])) {
        ?>

          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> <?php $_SESSION['done']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
        <?php } unset($_SESSION['done']); ?>

        <?php if (isset($_SESSION['send'])) { ?>

          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> <?php $_SESSION['send']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
        <?php } unset($_SESSION['send']); ?>
    
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="main-form-container">
              <form method="post" action="connect.php" class="row">
                <div class="form-group col-lg-6">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Name" required>
                </div>
                <div class="form-group col-lg-6">
                  <label>Phone Number</label>
                  <input type="text" class="form-control" name="phone_no" placeholder="Phone Number" required>
                </div>
                <div class="form-group col-lg-6">
                  <label>Check-in Time</label>
                  <input type="time" class="form-control" name="check_in_time" placeholder="Check In Time" required>
                </div>
                <div class="form-group col-lg-6">
                  <label>Check-out Time</label>
                  <input type="time" class="form-control" name="check_out_time" placeholder="Check Out Time" required>
                </div>
                <div class="form-group col-lg-6">
                  <label>Host name</label>
                  <input type="text" class="form-control" name="host_name" placeholder="Host Name" required>
                </div>
                <div class="form-group col-lg-12">
                  <label>Address Visited</label>
                  <textarea rows="6" class="form-control" placeholder="Address Visited" name="address_visited"></textarea>
                </div>
                <div class="form-group col-lg-12">
                  <button class="btn btn-primary" name="submit_form" type="submit">Submit</button>
                </div>               
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="user-info-wrapper">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-lg-11">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead class="thead-dark">
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Check in time </th>
                    <th>Check out time </th>
                    <th>Host name</th>
                    <th>Address</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                      $mysqli = mysqli_connect("localhost","root","","entry_management");
                      $query = 'select * from crud';
                      $result = mysqli_query($mysqli, $query);                        
                      $user_no = 1;
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>'.$user_no.'</td>';
                        echo '<td>'.$row['name'].'</td>';
                        echo '<td>'.$row['phone_no'].'</td>';
                        echo '<td>'.$row['check_in_time'].'</td>';
                        echo '<td>'.$row['check_out_time'].'</td>';
                        echo '<td>'.$row['host_name'].'</td>';
                        echo '<td>'.$row['address_visited'].'</td>';
                        echo '</tr>';
                        $user_no++;
                      }
                      if (mysqli_num_rows($result) == '') {
                        echo '<tr><td colspan="7">No data found</td></tr>';
                      } else {
                        echo '';
                      }
                    ?>
                    <!-- <td>1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td> -->
                  </tr>               
                </tbody>
              </table>
            </div>
          </div>
        </div>            
      </div>
    </section>
  </body>
</html>