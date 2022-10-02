<?php 
session_start();

require_once "authCookieSessionValidate.php";

if(!$isLoggedIn) {
    header("Location: ./");
}
?>
<?php
    include 'db.php';


    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
        $page_no = $_GET['page_no'];
        } else {
            $page_no = 1;
            }
    
        $total_records_per_page = 5;
        $offset = ($page_no-1) * $total_records_per_page;
        $previous_page = $page_no - 1;
        $next_page = $page_no + 1;
        $adjacents = "2"; 
    
        $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `inbox`");
        $total_records = mysqli_fetch_array($result_count);
        $total_records = $total_records['total_records'];
        $total_no_of_pages = ceil($total_records / $total_records_per_page);
        $second_last = $total_no_of_pages - 1; // total page minus 1
    
        $result = mysqli_query($conn,"SELECT * FROM `inbox` ORDER BY id DESC LIMIT $offset, $total_records_per_page");
 
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
        background: #2D3238;
    }
</style>
<body>
    <div class="header_top_content">
        <img src="../img/logo/logo4.png" class="header_logo2">
        <a class="logout" href="logout.php">Logout</a>
    </div>
    <div class="member-dashboard">
        </div>
        <table class="table">
    
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Project_Type</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
    
    <?php while ($row = mysqli_fetch_object($result)): ?>
            <tr style="<?php $row->is_read ? '' : 'background-color: lightgray;'; ?>">
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $row->phone; ?></td>
                <td><?php echo $row->project_type; ?></td>
                <td><?php echo $row->message; ?></td>
                <td>
                    <?php if (!$row->is_read): ?>
                        <form method="POST" action="mark-as-read.php" onsubmit="return confirm('Are you sure you want to mark it as read ?');">
                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                            <input type="submit" class="submit_v m" value="Mark as read">
                        </form>
                    <?php endif; ?>
    
                    <form method="POST" action="delete-inbox-message.php" onsubmit="return confirm('Are you sure you want to delete this ?');">
                        <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                        <input type="submit" class="submit_v d" value="Delete">
                    </form>
                </td>
            </tr>
    <?php endwhile; ?>
    
        </table>   

<center>
<div style='padding: 10px; border-top: dotted 0px #CCC;'>
<p class="page">Page <?php echo $page_no." of ".$total_no_of_pages; ?></p>
</div>

<ul class="pagination">
	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
	<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
	</li>
       
    <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
		echo "<li><a>...</a></li>";
		echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
		echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li><a>...</a></li>";
	   echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
	   echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>
    
	<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
	</li>
    <?php if($page_no < $total_no_of_pages){
		echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
		} ?>
</ul>

</center>

</body>
</html>