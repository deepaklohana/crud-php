<?php include('layout/header.php'); ?> <!-- Header -->
<!-- Edit -->
<?php
include('config/connection.php');

$id = "";
$room_number = "";
$room_status = "";

if(isset($_GET['edit'])){
    $query_1 = $conn->query("SELECT * FROM rooms WHERE id = ".$_GET['edit']);
    $rows_1 = $query_1->fetch_assoc();
    $id .= $rows_1['id'];
    $room_number .= $rows_1['room_number'];
    $room_status .= $rows_1['room_status'];
}

//Delete

if(isset($_GET['delete'])){
    $query_1 = $conn->query("DELETE FROM rooms WHERE id = ".$_GET['delete']);
    header('Location: rooms.php');
}


?>
<div class="my-4">
    <h1 class="mb-5">Manage Rooms</h1>
    <div class="card shadow-sm mb-5">
        <div class="card-body">
            <h5 class="card-title mb-4">Add New Room</h5>
            <form action="server/rooms.php" method="POST">
                <div class="row mb-4">
                <input type="hidden" value="<?php echo $id; ?>" name="room_id" />
                    <div class="col-6">
                        <label class="mb-1">Room Number</label>
                        <input type="number" value="<?php echo $room_number; ?>" name="room_number" class="form-control" required />
                    </div>
                    <div class="col-6">
                        <label class="mb-1">Room Status</label>
                        <select name="room_status" class="form-select" required>
                            <option value="Available" <?php if ($room_status === 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($room_status === 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                </div>

                <button type="submit" name="add_room" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-4">Show Rooms</h5>
            <table class="table text-center align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Room Number</th>
                        <th>Room Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php 
                    include('config/connection.php');
                    $query = $conn->query('SELECT * FROM rooms');
                    $row = $query->num_rows;
                    if($row>0){
                        while($data=$query->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $data['id']?></td>
                            <td>Romm <?php echo $data['room_number']?></td>

                            <?php
                                if ($data['room_status'] === "Available") {
                            ?>
                                <td>
                                    <span class="badge rounded-pill text-bg-success">
                                        <?php echo $data['room_status']; ?>
                                    </span>
                                </td>
                            <?php
                                }else{
                            ?>
                                <td>
                                    <span class="badge rounded-pill text-bg-danger">
                                        <?php echo $data['room_status']; ?>
                                    </span>
                                </td>
                            <?php
                                }
                            ?>

                            <td>
                                <a href="rooms.php?edit=<?php echo $data['id']?>" class="btn btn-dark">Edit</a>
                                <a href="rooms.php?delete=<?php echo $data['id']?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php
                        }
                    }
                    else{
                    ?>
                    <tr>
                        Record not found
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