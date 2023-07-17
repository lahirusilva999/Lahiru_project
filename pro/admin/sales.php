<?php
if (!isset($file_access)) die("Direct File Access Denied");
$source = 'payment';

?>
<div class="content">



    <div class="row">
        <div class="container-fluid">
            <div class="col-lg-12">


                <div class="card card-success">
                    <div class="card-header border-0">
                        <h3 class="card-title">All Payments</h3>

                    </div>
                    <div class="card-body">
                        <table id='example1' class="table table-striped table-bordered table-hover table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Route</th>
                                    <th>Date</th>
                                    <th>Fee</th>
                                    <th>Capacity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $pay = $conn->query("SELECT *, schedule.id as id, schedule.date as date, schedule.time as time, bus.seat_cap as seat_cap, schedule.fee as fee FROM schedule JOIN payment ON schedule.id = payment.schedule_id JOIN bus ON bus.id = schedule.bus_id");
                                $sn = 0;

                                while ($val = $pay->fetch_assoc()) {
                                    $id = $val['id'];
                                    $array = getTotalBookByType($id);
                                   
                                    $sn++;
                                    echo "<tr>
                                      <td>" . getRoutePath($val['route_id']) . "</td>
                                      <td>" . $val['date'] . " - " . formatTime($val['time']) . "</td>
                                      <td>" . $val['fee'] . "</td>
                                      <td>" . $val['seat_cap'] . "</td>
                                      </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->

            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->
<!-- /.col -->
</div>
<!-- /.row -->

</div>