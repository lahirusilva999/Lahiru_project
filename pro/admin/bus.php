<?php
if (!isset($file_access)) die("Direct File Access Denied");
$source = 'bus';
$me = "?page=$source";
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
                                All Buses</h3>
                            <div class='float-right'>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#add">
                                    Add New Bus &#128652;
                                </button></div>
                        </div>

                        <div class="card-body">

                            <table id="example1" style="align-items: stretch;"
                                class="table table-hover w-100 table-bordered table-striped<?php //
                                                                                                                                            ?>">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Bus</th>
                                        <th>Owner Name</th>
                                        <th>Driver Name</th>
                                        <th>Ticket Checker Name</th>
                                        <th>Seat Capacity</th>
                                        <th>Category</th>
                                        <th style="width: 20%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $row = $conn->query("SELECT * FROM bus");
                                    if ($row->num_rows < 1) echo "No Records Yet";
                                    $sn = 0;
                                    while ($fetch = $row->fetch_assoc()) {
                                        $id = $fetch['id'];
                                    ?>

                                    <tr>
                                        <td><?php echo ++$sn; ?></td>
                                        <td><?php echo $fullname = $fetch['plate_no']; ?></td>
                                        <td><?php echo $fetch['bus_owner_name']; ?></td>
                                        <td><?php echo $fetch['bus_driver_name']; ?></td>
                                        <td><?php echo $fetch['bus_tickchecker_name']; ?></td>
                                        <td><?php echo $fetch['seat_cap']; ?></td>
                                        <td><?php echo $fetch['category']; ?></td>
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


                                                                                        ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        <input type="hidden" class="form-control" name="id"
                                                            value="<?php echo $id ?>" required id="">
                                                        <p>Bus : <input type="text" class="form-control"
                                                        plate_no="plate_no" value="<?php echo $fetch['plate_no'] ?>"
                                                                required minlength="3" id=""></p>
                                                        <p>Owner Name : <input type="text" min='0'
                                                                class="form-control"
                                                                value="<?php echo $fetch['bus_owner_name'] ?>"
                                                                name="bus_owner_name" required id="">
                                                        </p>
                                                        <p> Driver Name : <input type="text" min='0'
                                                                class="form-control"
                                                                value="<?php echo $fetch['bus_driver_name'] ?>"
                                                                name="bus_driver_name" required id="">
                                                        </p>
                                                        <p> Ticket Checker Name : <input type="text" min='0'
                                                                class="form-control"
                                                                value="<?php echo $fetch['bus_tickchecker_name'] ?>"
                                                                name="bus_tickchecker_name" required id="">
                                                        </p>
                                                        <p> Seat Capacity : <input type="number" min='0'
                                                                class="form-control"
                                                                value="<?php echo $fetch['seat_cap'] ?>"
                                                                name="seat_cap" required id="">
                                                        </p>
                                                        <p> Category : <input type="text" min='0'
                                                                class="form-control"
                                                                value="<?php echo $fetch['category'] ?>"
                                                                name="category" required id="">
                                                        </p>
                                                        <p>

                                                            <input class="btn btn-info" type="submit" value="Edit Bus"
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
                <h4 class="modal-title">Add New Bus &#x1F68D;
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">

                    <table class="table table-bordered">
                        <tr>
                            <th>Bus</th>
                            <td><input type="text" class="form-control" name="plate_no" required minlength="3" id=""></td>
                        </tr>
                        <tr>
                            <th>Owner Name</th>
                            <td><input type="text" min='0' class="form-control" name="bus_owner_name" required id=""></td>
                        </tr>
                        <tr>
                            <th>Driver Name</th>
                            <td><input type="text" min='0' class="form-control" name="bus_driver_name" required id="">
                            </td>
                        </tr>
                        <tr>
                            <th>Ticket Checker Name</th>
                            <td><input type="text" min='0' class="form-control" name="bus_tickchecker_name" required id="">
                            </td>
                        </tr>
                        <tr>
                            <th>Seat Capacity</th>
                            <td><input type="number" min='0' class="form-control" name="seat_cap" required id="">
                            </td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td><input type="text" min='0' class="form-control" name="category" required id="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">

                                <input class="btn btn-info" type="submit" value="Add Bus" name='submit'>
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
    $plate_no = $_POST['plate_no'];
    $bus_owner_name = $_POST['bus_owner_name'];
    $bus_driver_name = $_POST['bus_driver_name'];
    $bus_tickchecker_name = $_POST['bus_tickchecker_name'];
    $seat_cap = $_POST['seat_cap'];
    $category = $_POST['category'];
    if (!isset($plate_no, $bus_owner_name, $bus_driver_name, $bus_tickchecker_name, $seat_cap, $category  )) {
        alert("Fill Form Properly!");
    } else {
        $conn = connect();
        //Check if bus exists
        $check = $conn->query("SELECT * FROM bus WHERE plate_no = '$plate_no' ")->num_rows;
        if ($check) {
            alert("Bus exists");
        } else {
            $ins = $conn->prepare("INSERT INTO bus (plate_no, bus_owner_name, bus_driver_name, bus_tickchecker_name, seat_cap, category  ) VALUES (?,?,?,?,?,?)");
            $ins->bind_param("ssssis", $plate_no, $bus_owner_name, $bus_driver_name, $bus_tickchecker_name, $seat_cap, $category);
            $ins->execute();
            alert("Bus Added!");
            load($_SERVER['PHP_SELF'] . "$me");
        }
    }
}

if (isset($_POST['edit'])) {
    $plate_no = $_POST['plate_no'];
    $bus_owner_name = $_POST['bus_owner_name'];
    $bus_driver_name = $_POST['bus_driver_name'];
    $bus_tickchecker_name = $_POST['bus_tickchecker_name'];
    $seat_cap = $_POST['seat_cap'];
    $category = $_POST['category'];
    $id = $_POST['id'];
    if (!isset($plate_no, $bus_owner_name, $bus_driver_name, $bus_tickchecker_name, $seat_cap, $category)) {
        alert("Fill Form Properly!");
    } else {
        $conn = connect();
        //Check if bus exists
        $check = $conn->query("SELECT * FROM bus WHERE plate_no= '$name' ")->num_rows;
        if ($check == 2) {
            alert("Bus name exists");
        } else {
            $ins = $conn->prepare("UPDATE `bus` SET `plate_no`=?,`bus_owner_name`=?,`bus_driver_name`=?,`bus_tickchecker_name`=?,`seat_cap`=?,`category`=? WHERE id = ?");
            $ins->bind_param("ssssisi", $plate_no, $bus_owner_name, $bus_driver_name, $bus_tickchecker_name, $seat_cap, $category, $id);
            $ins->execute();
            alert("Bus Modified!");
            load($_SERVER['PHP_SELF'] . "$me");
        }
    }
}

if (isset($_POST['del_bus'])) {
    $con = connect();
    $conn = $con->query("DELETE FROM bus WHERE id = '" . $_POST['del_bus'] . "'");
    if ($con->affected_rows < 1) {
        alert("Bus Could Not Be Deleted. This Bus Has Been Tied To Another Data!");
        load($_SERVER['PHP_SELF'] . "$me");
    } else {
        alert("Bus Deleted!");
        load($_SERVER['PHP_SELF'] . "$me");
    }
}
?>