<?php
$servername='localhost';
$username='root';
$password='';
$dbname='project';
$conn=mysqli_connect($servername,$username,$password,$dbname);
$data=$_POST['searchCompleted'];
echo $data;
    $num=0;
    $query1="SELECT * FROM `complaints`";
    $seee="SELECT * FROM `completedcomp` where compnum='$data'";
    $reso=mysqli_query($conn,$seee);

    if($reso) {
        while($coomp=mysqli_fetch_assoc($reso)) {
            $cid=$coomp['compnum'];
            $remark=$coomp['remark'];
            $result=mysqli_query($conn,$query1);

            if($result) {
                while($row=mysqli_fetch_assoc($result)) {                
                    $id=$row['id'];
                    if($id==$cid) {
                        $num++;
                        $usr=$row['user'];
                        $id=$row['id'];
                        $nat=$row['nature'];
                        $da=$row['date'];
                        $co=$row['comp'];
                        $fil=""; // Define $fil variable here or fetch it from the database
                        echo "<h5 class='tr'>
                        Search Results
                        Number:$num User: $usr </h5>
                        Complaint-id: <span id='span'>$id</span><br />
                        <h6>Remark: <span id='remark'>$remark</span><br />";
                        echo "Complaint-Nature: <span id='span'>$nat</span><br />
                        Complaint-Date: <span id='span'>$da</span><br />
                        COMLAINT > <span id='span'>$co</span><br /></h6><br /><hr />";
                    }
                }
            }
        }
        echo "<h5 class='tr'>
        Other Search Results
        Case not found<br /></h6><br /><hr />";
    }
?>
