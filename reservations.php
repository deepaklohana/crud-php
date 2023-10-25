<?php include('layout/header.php'); ?> <!-- Header -->
<!-- Edit -->
<?php
include('config/connection.php');

$id = "";
$customer_name = "";
$customer_phone = "";
$customer_cnic = "";
$room_number = "";
$reservation_date = "";
$reservation_duration = "";

if(isset($_GET['edit'])){
    $query_1 = $conn->query("SELECT * FROM Reservations WHERE id = ".$_GET['edit']);
    $rows_1 = $query_1->fetch_assoc();
    $id .= $rows_1['id'];
    $customer_name .= $rows_1['customer_name'];
    $customer_phone .= $rows_1['customer_phone'];
    $customer_cnic .= $rows_1['customer_cnic'];
    $room_number .= $rows_1['room_number'];
    $reservation_date .= $rows_1['reservation_date'];
    $reservation_duration .= $rows_1['reservation_duration'];
}

//Delete

if(isset($_GET['delete'])){
    $query_1 = $conn->query("DELETE FROM reservations WHERE id = ".$_GET['delete']);
    header('Location: Reservations.php');
}


?>
<div class="my-4">
    <h1 class="mb-5">Manage Reservations</h1>
    <div class="card shadow-sm mb-5">
        <div class="card-body">
            <h5 class="card-title mb-4">Add New Reservation</h5>
            <form action="server/reservations.php" method="POST">
                <div class="row mb-4">
                <input type="hidden" value="<?php echo $id; ?>" name="reservation_id" />
                    <div class="col-4">
                        <label class="mb-1">Customer Name</label>
                        <input type="text" value="<?php echo $customer_name; ?>" name="customer_name" class="form-control" required />
                    </div>
                    <div class="col-4">
                        <label class="mb-1">Customer Phone Number</label>
                        <input type="tel" value="<?php echo $customer_phone; ?>" name="customer_phone" class="form-control" required />
                    </div>
                    <div class="col-4">
                        <label class="mb-1">Customer CNIC</label>
                        <input type="tel" value="<?php echo $customer_cnic; ?>" name="customer_cnic" class="form-control" required />
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-4">
                        <label class="mb-1">Room Number</label>
                        <select name="room_number" class="form-select" required>
                            <?php
                            $query_2 = $conn->query("SELECT * FROM rooms WHERE room_status = 'Available'");

                            while ($data = $query_2->fetch_assoc()) {
                            ?>

                            <option value="<?php echo $data['room_number']; ?>"><?php echo $data['room_number']; ?></option>

                            <?php
                            }                            
                            ?>
                        </select>
                    </div>
                    <div class="col-4">
                        <label class="mb-1">Reservation Date</label>
                        <input type="date" value="<?php echo $reservation_date; ?>" name="reservation_date" class="form-control" required />
                    </div>
                    <div class="col-4">
                        <label class="mb-1">Reservation Duration</label>
                        <select name="reservation_duration" class="form-select" required>
                        <?php
                        for ($i = 1; $i <= 30; $i++) { 
                        ?>

                        <option value="<?php echo $i; ?> Days"><?php echo $i ?> Days</option>

                        <?php
                        }
                        ?>
                        </select>
                    </div>
                </div>

                <button type="submit" name="reserve_room" class="btn btn-primary">Reserve A Room</button>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-4">Show Reservations</h5>
            <table class="table text-center align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Customer Phone Number</th>
                        <th>Customer CNIC</th>
                        <th>Room Number</th>
                        <th>Reservation Date</th>
                        <th>Reservation Duration</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    $query = $conn->query('SELECT * FROM reservations');
                    $row = $query->num_rows;
                    if($row > 0){
                        while($data = $query->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $data['id']?></td>
                            <td><?php echo $data['customer_name']?></td>
                            <td><?php echo $data['customer_phone']?></td>
                            <td><?php echo $data['customer_cnic']?></td>
                            <td><?php echo $data['room_number']?></td>
                            <td><?php echo $data['reservation_date']?></td>
                            <td><?php echo $data['reservation_duration'] ?></td>
                            <td>
                                <a href="Reservations.php?edit=<?php echo $data['id']?>" class="btn btn-dark">Edit</a>
                                <a href="Reservations.php?delete=<?php echo $data['id']?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php
                        }
                    }
                    else{
                    ?>
                    <tr>
                        <td colspan="8">Record not found</td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('layout/footer.php'); ?> <!-- Footer -->