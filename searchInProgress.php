<?php
$servername='localhost';
$username='root';
$password='';
$dbname='project';
$conn=mysqli_connect($servername,$username,$password,$dbname);
$data=$_POST['searchInProgress'];
    $num=0;
    $query1="SELECT * FROM `complaints`";
    $seee="SELECT * FROM `inprogresscomp` where compnum='$data'";
    $reso=mysqli_query($conn,$seee);
    
    if($reso) {
        while($inpro=mysqli_fetch_assoc($reso)) {
            $inid=$inpro['compnum'];
            $result=mysqli_query($conn,$query1);
            echo mysqli_num_rows($result);
            if($result) {
                while($row=mysqli_fetch_assoc($result)) {                
                    $id=$row['id'];
                    if($id==$inid) {
                        $num++;
                        $usr=$row['user'];
                        $nat=$row['nature'];
                        $da=$row['date'];
                        $co=$row['comp'];
                        $fil=""; // Define $fil variable here or fetch it from the database
                        echo "<h5 class='tr'>
                        Search Results
                        <form method='POST' action='solveinpro1.php'>
                        <input type='text' name='user' value='$usr' class='now'>
                        <input type='text' name='compid' value='$id' class='now'>
                        <input type='submit' value='complete it' style='float:right;margin:0px;' class='btn btn-secondary' >
                        </form>
                        Number:$num User: $usr </h5>";
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
