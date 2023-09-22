
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
        $query = $db->query("SELECT proyektor.kode_br, proyektor.unit, ruang.ruang FROM proyektor INNER JOIN ruang ON proyektor.id_ruang = ruang.id_ruang ORDER BY ruang.ruang ASC LIMIT $limit");
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
                <th>nama user</th>
                
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
        
                    <td>' . $row["ruang"] . '</td>
                    <td>' . $row["unit"] . '</td>
                    <td id="ac-value">
                        <form method="POST" action="IAspekPro.php">
                            <input type="hidden" name="kode_br" value="' . $row['kode_br'] . '">
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




// start function html spec
function IAspec($data, $table, $result_unit, $unit){
    if($table == 'projek'){

        $html = '<div class="card-detail">
                <div class="card-header-detail">
                    <h3 class="card-title">Informasi Pemilik PC</h3>
                </div>
                <div class="card-body">
                    <input type="hidden" name="gambarLama" value="' . $data['gambar'] . '">
                    <input type="hidden" name="id_ruang" id="selectedItemId" value="' . $data['id_ruang'] . '">
                    <span class="judul">Ruang :</span>
                    <input type="text" name="" id="autocomplete" value="' . $data['ruang'] . '">

                    <span class="judul">Unit :</span>
                    <select name="unit">
                        <option value="public">public</option>';
    
    while ($row_unit = mysqli_fetch_assoc($result_unit)) {
        $selected = ($unit == $row_unit["unit"]) ? "selected" : "";
        $html .= '<option value="' . $row_unit["unit"] . '" ' . $selected . '>' . $row_unit["unit"] . '</option>';
    }

    $html .= '</select>
                    <span class="judul">Kode Barang :</span>
                    <input type="text" name="kode_br" value="' . $data['kode_br'] . '">
                    <span class="judul">Brand :</span>
                    <input type="text" name="brand" value="' . $data['brand'] . '">
                    <span class="judul">Model :</span>
                    <input type="text" name="tipe_model" value="' . $data['tipe_model'] . '">

                    <span class="judul">Gamabr :</span>
                    <img src="img/' . $data['gambar'] . '"  class="card-img-top" style="height: 194px; width= 30px;">
                    <input type="file" name="gambar" id="gambar">
                    
                    <button class="btn-ubah" name="submit" type="submit">update</button>
                </div>
            </div>';

    return $html;
//
// start spec table pc
    }else if($table == 'pc'){
        $html = '<div class="card-detail">
        <div class="card-header-detail">
            <h3 class="card-title">Informasi Pemilik PC</h3>
        </div>
        <div class="card-body">
            <input type="hidden" name="kode_lama" value="' . $data['kode_br'] . '">
            <input type="hidden" name="gambarLama" value="' . $data['gambar'] . '">
            <input type="hidden" name="id_ruang" id="selectedItemId" value="' . $data['id_ruang'] . '">

            <span class="judul">Ruang :</span>
            <input type="text" name="" id="autocomplete" value="' . $data['ruang'] . '">

            <span class="judul">Kode Barang :</span>
            <input type="text" name="kode_br" value="' . $data['kode_br'] . '">

            <span class="judul">tipe :</span>
            <select name="tipe" id="">';

    if ($data['tipe'] == 'laptop') {
    $html .= '<option value="laptop" selected>LAPTOP</option>
                <option value="pc">PC</option>
                <option value="alo">ALL-IN-ONE</option>';
    } elseif ($data['tipe'] == 'pc') {
    $html .= '<option value="laptop">LAPTOP</option>
                <option value="pc" selected>PC</option>
                <option value="alo">ALL-IN-ONE</option>';
    } elseif ($data['tipe'] == 'alo') {
    $html .= '<option value="laptop">LAPTOP</option>
                <option value="pc">PC</option>
                <option value="alo" selected>ALL-IN-ONE</option>';
    }

    $html .= '</select>
                <span class="judul">Unit :</span>
                <select name="unit">
                    <option value="public">public</option>';

    // Sisipkan kode pengambilan data unit dari database sesuai kebutuhan

    $html .= '</select>
                <span class="judul">Pemilik :</span>
                <input type="text" name="nama_u" id="" value="' . $data['nama_u'] . '">
                
                <span class="judul">Nama Komputer:</span>
                <input type="text" name="nama_pc" id="" value="' . $data['nama_pc'] . '">

                <span class="judul">Tahun:</span>
                <select name="tahun">';

    // Sisipkan kode untuk menghasilkan pilihan tahun sesuai kebutuhan

    $html .= '</select>';

    if ($data['tipe'] !== 'pc') {
    $html .= '<span class="judul">Brand :</span>
                <input type="text" name="brand_pc" value="' . $data['brand_pc'] . '">';
    }

    $html .= '<span class="judul">Operating System:</span>
                <input type="text" name="os" id="" value="' . $data['os'] . '">
                
                <span class="judul">Kondisi :</span>
                <select name="kondisi">';

    // Sisipkan kode untuk menghasilkan pilihan kondisi sesuai kebutuhan

    $html .= '</select>

                <span class="judul">Keterangan:</span>
                <textarea name="keterangan" id=""  cols="30" rows="10">' . $data['keterangan'] . '</textarea>

                <span class="judul">gambar :</span>
                <img src="img/' . $data['gambar'] . '"  class="card-img-top" style="height: 194px; width= 30px;">
                <input type="file" name="gambar" id="gambar">
            </div>
        </div>
        <div class="card-detail">
            <div class="card-header-detail">
                <h3 class="card-title">Spesifikasi PC</h3>
            </div>
            <div class="card-body">
                <span class="judul">Tipe Storage :</span>
                <select name="tipe_rom" id="">';

    // Sisipkan kode untuk menghasilkan pilihan tipe storage sesuai kebutuhan

    $html .= '</select>

                <span class="judul">Size Storage :</span>
                <input type="text" name="size_rom" id="" value="' . $data['size_rom'] . '">
                
                <span class="judul">Tipe RAM :</span>
                <input type="text" name="tipe_ram" id="" value="' . $data['tipe_ram'] . '">
                
                <span class="judul">Penyimpanan RAM :</span>
                <input type="text" name="size_ram" id="" value="' . $data['size_ram'] . '">
                
                <span class="judul">Processor :</span>
                <input type="text" name="cpu" id="" value="' . $data['cpu'] . '">
                
                <span class="judul">LAN :</span>
                <select name="lan" id="">';

    // Sisipkan kode untuk menghasilkan pilihan LAN sesuai kebutuhan

    $html .= '</select>

                <span class="judul">Ip LAN:</span>
                <input type="text" name="ip" id="" value="' . $data['ip'] . '">
                
                <span class="judul">WiFi :</span>
                <select name="wifi" id="">';

    // Sisipkan kode untuk menghasilkan pilihan WiFi sesuai kebutuhan

    $html .= '</select>

                <span class="judul">Brand Monitor:</span>
                <input type="text" name="brand_mo" id="" value="' . $data['brand_mo'] . '">
                
                <span class="judul">Ukuran Layar Monitor:</span>
                <input type="text" name="ukuran_mo" id="" value="' . $data['ukuran_mo'] . '">
                
                <!-- Tambahkan informasi pemilik PC sesuai kebutuhan -->
                <br>
                <button class="btn-ubah" name="submit" type="submit">Ubah</button>
            </div>
        </div>';

        return $html;
    }
    
}


?>
