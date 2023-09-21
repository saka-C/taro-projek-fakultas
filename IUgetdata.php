<?php 
if(isset($_POST['page'])):
    include_once 'Pagination.class.php'; 
     
    // Include database configuration file 
    require_once 'koneksi.php'; 
     
    // Set some useful configuration 
    $baseURL = 'IUgetDataPc.php'; 
    $offset = !empty($_POST['page'])?$_POST['page']:0; 
    $limit = 5; 
    if(isset($_POST['filterBy']) < 0 ){
        $_POST['filterBy'] ="";
    }

?>
<!-- start table -->
    <!-- if table = pc -->
    <?php if(isset($_POST['table']) && $_POST['table'] == 'pc' ): 
             // Set conditions for search 
        $whereSQL = ''; 
        if(!empty($_POST['keywords'])){ 
            $whereSQL = " WHERE (lantai LIKE '%".$_POST['keywords']."%' OR ruang LIKE '%".$_POST['keywords']."%' OR unit LIKE '%".$_POST['keywords']."%' OR nama_pc LIKE '%".$_POST['keywords']."%') "; 
        } 
        if(isset($_POST['filterBy']) && $_POST['filterBy'] != ''){ 
            $whereSQL .= (strpos($whereSQL, 'WHERE') !== false)?" AND ":" WHERE "; 
            $whereSQL .= " unit = '".$_POST['filterBy']."'"; 
        }
    
        if (isset($_POST['nama_ged']) && $_POST['nama_ged'] != '') { 
            $whereSQL .= (strpos($whereSQL, 'WHERE') !== false || strpos($whereSQL, 'AND') !== false) ? " AND " : " WHERE "; 
            $whereSQL .= " nama_ged = '" . $_POST['nama_ged'] . "'";
        }
        
        if (isset($_POST['tipe']) && $_POST['tipe'] != '') { 
            $whereSQL .= (strpos($whereSQL, 'WHERE') !== false || strpos($whereSQL, 'AND') !== false) ? " AND " : " WHERE "; 
            $whereSQL .= " tipe = '" . $_POST['tipe'] . "'";
        }
    
        //Count of all records 
        $query   = $db->query("SELECT COUNT(*) as rowNum FROM pc ".$whereSQL); 
        $result  = $query->fetch_assoc(); 
        $rowCount= $result['rowNum']; 
         
        // Initialize pagination class 
        $pagConfig = array( 
            'baseURL' => $baseURL, 
            'totalRows' => $rowCount, 
            'perPage' => $limit, 
            'currentPage' => $offset, 
            'contentDiv' => 'dataContainer', 
            'link_func' => 'searchFilter' 
        ); 
        $pagination =  new Pagination($pagConfig); 
     
        // Fetch records based on the offset and limit 
        $query = $db->query("SELECT * FROM pc $whereSQL ORDER BY ruang DESC LIMIT $offset,$limit"); 
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="inventory.css">
        </head>
        <body>
        <table class="table table-striped"> 
        <thead>
                        <tr>
                            <th id="no">No</th>
                            <th>Lantai</th>
                            <th>Ruangan</th>
                            <th>Unit</th>
                            <th>Nama PC</th>
                            <th id="action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                if($query->num_rows > 0):
               
                    while($row = $query->fetch_assoc()):
                        $offset++
            
                        ?>
                        <tr>
                            <td><?php echo $offset; ?></td>
                            <td><?php echo $row["lantai"]; ?></td>
                            <td><?php echo $row["ruang"]; ?></td>
                            <td><?php echo $row["unit"]; ?></td>
                            <td><?php echo $row["nama_pc"]; ?></td>
                            <td id="ac-value"><a href="IUspekPc.php?kode_br=<?php echo $row['kode_br']; ?>">Cek Spek</a></td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">No records found...</td>
                        </tr>
                    <?php endif;  ?>
                    </tbody>
        </table>  <!-- Display pagination links --> 
        <a >   <?php echo $pagination->createLinks(); ?> </a>
        </body>
        </html>

     <!-- end table pc -->
   <!--  -->
       <!-- start table proyektor -->

    <?php elseif(isset($_POST['table']) && $_POST['table'] == 'projek' ): 
          // Set conditions for search 
        $whereSQL = ''; 
        if(!empty($_POST['keywords'])){ 
            $whereSQL = " WHERE (lantai LIKE '%".$_POST['keywords']."%' OR ruang LIKE '%".$_POST['keywords']."%' OR unit LIKE '%".$_POST['keywords']."%') "; 
        } 
        if(isset($_POST['filterBy']) && $_POST['filterBy'] != ''){ 
            $whereSQL .= (strpos($whereSQL, 'WHERE') !== false)?" AND ":" WHERE "; 
            $whereSQL .= " unit = '".$_POST['filterBy']."'"; 
        }

        if (isset($_POST['nama_ged']) && $_POST['nama_ged'] != '') { 
            $whereSQL .= (strpos($whereSQL, 'WHERE') !== false || strpos($whereSQL, 'AND') !== false) ? " AND " : " WHERE "; 
            $whereSQL .= " nama_ged = '" . $_POST['nama_ged'] . "'";
        }
        

        //Count of all records 
        $query   = $db->query("SELECT COUNT(*) as rowNum FROM proyektor ".$whereSQL); 
        $result  = $query->fetch_assoc(); 
        $rowCount= $result['rowNum']; 
        
        // Initialize pagination class 
        $pagConfig = array( 
            'baseURL' => $baseURL, 
            'totalRows' => $rowCount, 
            'perPage' => $limit, 
            'currentPage' => $offset, 
            'contentDiv' => 'dataContainer', 
            'link_func' => 'searchFilter' 
        ); 
        $pagination =  new Pagination($pagConfig); 
    
        // Fetch records based on the offset and limit 
        $query = $db->query("SELECT * FROM proyektor $whereSQL ORDER BY ruang DESC LIMIT $offset,$limit");   
        
    ?>
        <!-- Data list container --> 
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="inventory.css">
        </head>
        <body>
        <table class="table table-striped"> 
        <thead>
                        <tr>
                            <th id="no">No</th>
                            <th>Lantai</th>
                            <th>Ruangan</th>
                            <th>Unit</th>
                            <th id="action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                if($query->num_rows > 0):
               
                    while($row = $query->fetch_assoc()):
                        $offset++
            
                        ?>
                        <tr>
                            <td><?php echo $offset; ?></td>
                            <td><?php echo $row["lantai"]; ?></td>
                            <td><?php echo $row["ruang"]; ?></td>
                            <td><?php echo $row["unit"]; ?></td>
                            <td id="ac-value"><a href="IUspekPro.php?kode_br=<?php echo $row['kode_br']; ?>">Cek Spek</a></td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">No records found...</td>
                        </tr>
                    <?php endif;  ?>
                    </tbody>
        </table> 
         <!-- Display pagination links -->
            <a >   <?php echo $pagination->createLinks(); ?> </a>
        </body>
        </html>
     
    
      


    <!--  endif table -->
    <?php endif; ?>

<!-- endif page -->
<?php endif;  ?>