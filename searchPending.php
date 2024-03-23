<?php
$servername='localhost';
$username='root';
$password='';
$dbname='project';
$conn=mysqli_connect($servername,$username,$password,$dbname);
$data=$_POST['searchPending'];
    $query1="SELECT * FROM `complaints` where pending='1' and id='$data'";
    $result=mysqli_query($conn,$query1);
    $num=0;

    if($result) {
        while($row=mysqli_fetch_assoc($result)) {
            $cme=$row['pending'];
            if($cme=='1') {
                $num++;
                $id=$row['id'];
                $usr=$row['user'];
                $nat=$row['nature'];
                $da=$row['date'];
                $co=$row['comp'];
                echo "<div id='complaint$id'> Search Results"; // Add unique ID for each complaint
                echo "<h5 class='tr'>";
                echo "<form method='POST' action='solvepend1.php'>";
                echo "<input type='text' name='user' value='$usr' class='now'>";
                echo "<input type='text' name='compid' value='$id' class='now'>";
                echo "<input type='submit' value='solve it' style='float:right;margin:0px;' class='btn btn-info' >";
                echo "</form>";
                echo "Number:$num  User: $usr </h5>";
                echo "<h6>Complaint-Nature: <span id='span'>$nat</span><br />";
                echo "Complaint-Date: <span id='span'>$da</span><br />";
                echo "COMLAINT > <span id='span'>$co</span><br /></h6><br /><hr />";
                echo "</div>"; // Close the complaint container
            }
        }
        echo "<h5 class='tr'>
        Other Search Results
        Case not found<br /></h6><br /><hr />";
    }
?>
