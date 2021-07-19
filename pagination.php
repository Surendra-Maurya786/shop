
<html>  
<head>  
<title> Pagination </title>  
</head>  
<body>  
  
<?php  
  
    //database connection  
    $conn = mysqli_connect('localhost', 'root', '', 'shop');  
    if (! $conn) {  
die("Connection failed" . mysqli_connect_error());  
    }  
    else {  
mysqli_select_db($conn, 'pagination');  
    }  
  
    //define total number of results you want per page  
    $results_per_page = 2;  
  
    //find the total number of results stored in the database  
    $query = "select * from itemshow";  
    $result = mysqli_query($conn, $query);  
    $number_of_result = mysqli_num_rows($result); 


    $number_of_page = ceil ($number_of_result / $results_per_page);  
  
    //determine which page number visitor is currently on  
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else { 
        $page = $_GET['page'];  
    }  
  
    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page-1) * $results_per_page;  
    echo  $page_first_result .'<br>';
  

     $query = "SELECT *FROM itemshow LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($conn, $query);    


       while ($row = mysqli_fetch_array($result)) {  
        echo $row['id'] . ' ' . $row['name'] . '</br>';  
    }  

      for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<a href = "pagination.php?page=' . $page . '">Next </a>';  
    }  

?>  
</body>  
</html>  