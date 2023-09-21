
<?php
include 'koneksi.php';
function IaUp($db, $tipe, $limit, $table) {
    if($table == 'pc'){
        $query = $db->query("SELECT COUNT(*) as rowNum FROM pc WHERE tipe='$tipe'");
        $result = $query->fetch_assoc();
        $rowCount = $result['rowNum'];

        // Initialize pagination class
        $pagConfig = array(
            'baseURL' => 'IAgetData.php',
            'totalRows' => $rowCount,
            'perPage' => $limit,
            'contentDiv' => 'dataContainer',
            'link_func' => 'searchFilter'
        );
        $pagination = new Pagination($pagConfig);

        // Fetch records based on the limit
        $query = $db->query("SELECT pc.kode_br, pc.unit, pc.nama_u, ruang.ruang FROM pc INNER JOIN ruang ON pc.id_ruang = ruang.id_ruang WHERE pc.tipe = '$tipe' ORDER BY ruang.ruang ASC LIMIT $limit");

        
    }elseif($table == 'projek'){
        $query = $db->query("SELECT COUNT(*) as rowNum FROM proyektor");
        $result = $query->fetch_assoc();
        $rowCount = $result['rowNum'];

        // Initialize pagination class
        $pagConfig = array(
            'baseURL' => 'IAgetData.php',
            'totalRows' => $rowCount,
            'perPage' => $limit,
            'contentDiv' => 'dataContainer',
            'link_func' => 'searchFilter'
        );
        $pagination = new Pagination($pagConfig);

        // Fetch records based on the limit
        $query = $db->query("SELECT * FROM proyektor ORDER BY ruang DESC LIMIT $limit");
    }
    
    
    // Process the fetched records

    // Return both records and pagination HTML
    return array(
        'query' => $query,
        'pagination' => $pagination
    );

}


function table($query, $table, $tipe) {
   if($table == 'pc'){
        $tableHTML = '<table>
        <thead>
            <tr>
                <th id="no">No</th>
                
                <th>Ruangan</th>
                <th>Unit</th>
                <th>Nama user</th>
                <th id="action">Action</th>
            </tr>
        </thead>
        <tbody>';
        
        if($query->num_rows > 0) {
        $i = 0;
        while($row = $query->fetch_assoc()) {
        $i++;
        $tableHTML .= '<tr>
                    <td>' . $i . '</td>
                   
                    <td>' . $row["ruang"] . '</td>
                    <td>' . $row["unit"] . '</td>
                    <td>' . $row["nama_u"] . '</td>
                    <td id="ac-value">
                        <form method="POST" action="IAspekPc.php">
                            <input type="hidden" name="kode_br" value="' . $row['kode_br'] . '">
                            <input type="hidden" name="table" value="' . $table . '">
                            <input type="submit" value="Cek Spek">
                        </form>
                        <form method="POST" action="">
                            <input type="hidden" name="kode_br" value="' . $row['kode_br'] . '">
                            <input type="submit" name="hapus" value="Hapus">
                        </form>
                    </td>
                    
                </tr>'; 
        }
        } else {
        $tableHTML .= '<tr>
                <td colspan="6">No records found...</td>
            </tr>';
        }

        $tableHTML .= '</tbody></table>';
        return $tableHTML;
    }elseif($table == 'projek'){
        $tableHTML = '<table>
        <thead>
            <tr>
                <th id="no">No</th>
                <th>Lantai</th>
                <th>Ruangan</th>
                <th>Unit</th>
                <th id="action">Action</th>
            </tr>
        </thead>
        <tbody>';
        
        if($query->num_rows > 0) {
        $i = 0;
        while($row = $query->fetch_assoc()) {
        $i++;
        $tableHTML .= '<tr>
                    <td>' . $i . '</td>
                    <td>' . $row["lantai"] . '</td>
                    <td>' . $row["ruang"] . '</td>
                    <td>' . $row["unit"] . '</td>
                    <td id="ac-value"><a href="IAspekPro.php?kode_br=' . $row['kode_br'] . '&table=' . $table . '">Cek Spek</a></td>
                </tr>';
        }
        } else {
        $tableHTML .= '<tr>
                <td colspan="6">No records found...</td>
            </tr>';
        }

        $tableHTML .= '</tbody></table>';
        return $tableHTML;
    }
}

function tableIu($query, $table) {
    if($table == 'pc'){
         $tableHTML = '<table>
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
         <tbody>';
         
         if($query->num_rows > 0) {
         $i = 0;
         while($row = $query->fetch_assoc()) {
         $i++;
         $tableHTML .= '<tr>
                     <td>' . $i . '</td>
                     <td>' . $row["lantai"] . '</td>
                     <td>' . $row["ruang"] . '</td>
                     <td>' . $row["unit"] . '</td>
                     <td>' . $row["nama_pc"] . '</td>
                     <td id="ac-value"><a href="IUspekPc.php?kode_br=' . $row['kode_br'] . '&table=' . $table . '">Cek Spek</a></td>
                 </tr>';
         }
         } else {
         $tableHTML .= '<tr>
                 <td colspan="6">No records found...</td>
             </tr>';
         }
 
         $tableHTML .= '</tbody></table>';
         return $tableHTML;
     }elseif($table == 'projek'){
         $tableHTML = '<table>
         <thead>
             <tr>
                 <th id="no">No</th>
                 <th>Lantai</th>
                 <th>Ruangan</th>
                 <th>Unit</th>
                 <th id="action">Action</th>
             </tr>
         </thead>
         <tbody>';
         
         if($query->num_rows > 0) {
         $i = 0;
         while($row = $query->fetch_assoc()) {
         $i++;
         $tableHTML .= '<tr>
                     <td>' . $i . '</td>
                     <td>' . $row["lantai"] . '</td>
                     <td>' . $row["ruang"] . '</td>
                     <td>' . $row["unit"] . '</td>
                     <td id="ac-value"><a href="IUspekPro.php?kode_br=' . $row['kode_br'] . '&table=' . $table . '">Cek Spek</a></td>
                 </tr>';
         }
         } else {
         $tableHTML .= '<tr>
                 <td colspan="6">No records found...</td>
             </tr>';
         }
 
         $tableHTML .= '</tbody></table>';
         return $tableHTML;
     }
 }




?>
