<?php
$servername='localhost';
$username='root';
$password='';
$dbname='project';
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(isset($_POST['searchPriority'])) {
    $searchContent = $_POST['searchPriority'];

    $query = "SELECT * FROM `complaints` WHERE priority='priority' AND id='$searchContent'";
    $result = mysqli_query($conn, $query);
    $num=0;
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<h5 class='tr'>
            Searched Content
                    <form method='POST' action='solvepend1.php'>
                        <input type='text' name='user' value='" . $row['user'] . "' class='now'>
                        <input type='text' name='compid' value='" . $row['id'] . "' class='now'>
                        <input type='submit' value='solve it' style='float:right;margin:0px;' class='btn btn-info'>
                    </form>
                    Number: " . ++$num . "
                    User: " . $row['user'] . "
                </h5>";
            echo "<span>Complaint-Nature: " . $row['nature'] . "</span><br />";
            echo "<span>Complaint-Date: " . $row['date'] . "</span><br />";
            echo "<span>COMPLAINT: " . $row['comp'] . "</span><br /><br /><hr />";
        }
    } else {
        echo "No priority complaints found.";
    }
    echo "<h5 class='tr'>
    Other Search Results
    Case not found<br /></h6><br /><hr />";
}
?>
