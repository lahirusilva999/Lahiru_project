<?php
if (!isset($file_access)) die("Direct File Access Denied");
$source = 'route';
$me = "?page=$source"
?>

<div class="content">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">
                                All Routes</h3>
                            <div class='float-right'>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#add">
                                    Add New Route &#x1F68C;
                                </button></div>
                        </div>

                        <div class="card-body">

                            <table id="example1" style="align-items: stretch;"
                                class="table table-hover w-100 table-bordered table-striped<?php //
                                                                                                                                            ?>">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> Route No </th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th> Distance </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $row = $conn->query("SELECT * FROM route");
                                    if ($row->num_rows < 1) echo "No Records Yet";
                                    $sn = 0;
                                    while ($fetch = $row->fetch_assoc()) {
                                        $id = $fetch['id'];
                                    ?>

                                    <tr>
                                        <td><?php echo ++$sn; ?></td>
                                        <td> <?php echo $fetch['no']; ?> </td>
                                        <td><?php echo $fetch['start']; ?></td>
                                        <td><?php echo $fetch['stop']; ?> </td>
                                        <td> <?php echo $fetch['distance'];
                                        


                                                $fullname = $fetch['no'].  $fetch['start'] . " to " . $fetch['stop']. $fetch['distance']; ?></td>
                                        <td>
                                            <form method="POST">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#edit<?php echo $id ?>">
                                                    Edit
                                                </button> -

                                                <input type="hidden" class="form-control" name="del_bus"
                                                    value="<?php echo $id ?>" required id="">
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure about this?')"
                                                    class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="edit<?php echo $id ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Editing <?php echo $fullname;


                                                                                        ?> &#128653;</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        <input type="hidden" class="form-control" name="id"
                                                            value="<?php echo $id ?>" required id="">

                                                            <p>Route No : <input type="text" class="form-control"
                                                                value="<?php echo $fetch['no'] ?>" name="no"
                                                                required id="">
                                                        </p>

                                                        <p>From : <input type="text" class="form-control"
                                                                value="<?php echo $fetch['start'] ?>" name="start"
                                                                required id="">
                                                        </p>
                                                        <p> To : <input type="text" class="form-control"
                                                                value="<?php echo $fetch['stop'] ?>" name="stop"
                                                                required id="">
                                                        </p>
                                                        <p> Distance : <input type="text" class="form-control"
                                                                value="<?php echo $fetch['distance'] ?>" name="distance"
                                                                required id="">
                                                        </p>

                                                        <p>

                                                            <input class="btn btn-info" type="submit" value="Edit Route"
                                                                name='edit'>
                                                        </p>
                                                    </form>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                        <?php
                                    }
                                        ?>

                                </tbody>
                               
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</div>
</div>
</section>
</div>

<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" align="center">
            <div class="modal-header">
                <h4 class="modal-title">Add New Route &#128653;
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">

                    <table class="table table-bordered">
                    <tr>
                            <th>Route No</th>
                            <td><input type="text" class="form-control" name="no" required id=""></td>
                        </tr>

                        <tr>
                            <th>From</th>
                            <td><input type="text" class="form-control" name="start" required id=""></td>
                        </tr>
                        <tr>
                            <th>To</th>
                            <td><input type="text" class="form-control" name="stop" required id="">
                            </td>
                        </tr>

                        <tr>
                            <th>Distance</th>
                            <td><input type="text" class="form-control" name="distance" required id="">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">

                                <input class="btn btn-info" type="submit" value="Add Route" name='submit'>
                            </td>
                        </tr>
                    </table>
                </form>



            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php

if (isset($_POST['submit'])) {
    $no = $_POST['no'];
    $start = $_POST['start'];
    $stop = $_POST['stop'];
    $distance = $_POST['distance'];
    if (!isset($no, $stop, $start, $distance)) {
        alert("Fill Form Properly!");
    } else {
        $conn = connect();

        $ins = $conn->prepare("INSERT INTO route (no,start,stop,distance) VALUES (?,?,?,?)");
        $ins->bind_param("ssss", $no, $start, $stop, $distance);
        $ins->execute();
        alert("Route Added!");
        load($_SERVER['PHP_SELF'] . "$me");
    }
}

if (isset($_POST['edit'])) {
    $no = $_POST['no'];
    $start = $_POST['start'];
    $stop = $_POST['stop'];
    $distance = $_POST['distance'];
    $id = $_POST['id'];
    if (!isset($no, $start, $stop, $distance)) {
        alert("Fill Form Properly!");
    } else {
        $conn = connect();
        $ins = $conn->prepare("UPDATE `route` SET `no`=?,`start`=?,`stop`=?,`distance`=? WHERE `id`=?");
        $ins->bind_param('ssssi', $no, $start, $stop, $distance, $id);
        $ins->execute();
        alert("Route Modified!");
        load($_SERVER['PHP_SELF'] . "$me");
    }
}

if (isset($_POST['del_bus'])) {
    $con = connect();
    $conn = $con->query("DELETE FROM route WHERE id = '" . $_POST['del_bus'] . "'");
    if ($con->affected_rows < 1) {
        alert("Route Could Not Be Deleted. This Route Has Been Tied To Another Data!");
        load($_SERVER['PHP_SELF'] . "$me");
    } else {
        alert("Route Deleted!");
        load($_SERVER['PHP_SELF'] . "$me");
    }
}
?>