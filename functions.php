<?php
$db = mysqli_connect('localhost', 'root', '', 'inventory');


function tambahPC($data){
    global $db;
    $kode_br = $data['kode_br'];
    $id_ruang = $data['id_ruang'];
    $unit = $data['unit'];
    $nama_u = $data['nama_u'];
    $nama_pc = $data['nama_pc'];
    $tipe = $data['tipe'];
    $brand_pc = $data['brand_pc'];
    $tahun = $data['tahun'];
    $os = $data['os'];
    $kondisi = $data['kondisi'];
    $keterangan = $data['keterangan'];
    $gambar = upload();
    if(!$gambar){
        return false;
    }
    $tipe_rom = $data['tipe_rom'];
    $size_rom = $data['size_rom'];
    $tipe_ram = $data['tipe_ram'];
    $size_ram = $data['size_ram'];
    $cpu = $data['cpu'];
    $lan = $data['lan'];
    $ip = $data['ip'];
    $wifi = $data['wifi'];
    $brand_mo = $data['brand_mo'];
    $ukuran_mo = $data['ukuran_mo'];

    $query = "INSERT INTO pc VALUES('$kode_br', '$id_ruang', '$unit', '$nama_u','$nama_pc', '$tipe', '$brand_pc', '$tahun', '$os', '$kondisi', '$keterangan', '$gambar', '$tipe_rom', '$size_rom', '$tipe_ram', '$size_ram', '$cpu', '$lan', '$ip', '$wifi', '$brand_mo', '$ukuran_mo')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
function upload(){
    $namaFile=$_FILES['gambar']['name'];
    $ukuranFile=$_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if( $error === 4){
        echo "<script>
                alert('pilih gambar terlebih dahulu');
              </script>";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script>
                alert('tolong upload dengan ekstensi jpg,jpeg,png');
             </script>";
    return false;
    }
    //ukuran gamabar
    if($ukuranFile > 2000000);

    //lolos pengecekan
    //generate nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;

}
function updatePc($data){
    global $db;
    $kode_br = $data['kode_br'];
    $kode_lama = $data['kode_lama'];
    $id_ruang = $data['id_ruang'];
    $nama_u = $data['nama_u'];
    $unit = $data['unit'];
    $nama_pc = $data['nama_pc'];
    $tipe = $data['tipe'];
    $brand_pc = $data['brand_pc'];
    $tahun = $data['tahun'];
    $os = $data['os'];
    $kondisi = $data['kondisi'];
    $keterangan = $data['keterangan'];
    $gambarLama = $data['gambarLama'];

    if( $_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }

    $tipe_rom = $data['tipe_rom'];
    $size_rom = $data['size_rom'];
    $tipe_ram = $data['tipe_ram'];
    $size_ram = $data['size_ram'];
    $cpu = $data['cpu'];
    $lan = $data['lan'];
    $ip = $data['ip'];
    $wifi = $data['wifi'];
    $brand_mo = $data['brand_mo'];
    $ukuran_mo = $data['ukuran_mo'];
    
    $query = "UPDATE pc SET id_ruang='$id_ruang', unit='$unit', nama_u='$nama_u', nama_pc='$nama_pc', tipe='$tipe', brand_pc='$brand_pc', tahun='$tahun', os='$os', kondisi='$kondisi', keterangan='$keterangan', gambar='$gambar', tipe_rom='$tipe_rom', size_rom='$size_rom', cpu='$cpu', lan='$lan', ip='$ip', wifi='$wifi', brand_mo='$brand_mo', ukuran_mo='$ukuran_mo' WHERE kode_br='$kode_lama' ";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function hapusPc($data){
    global $db;
    $kode_br = $data['kode_br'];
    $query = "DELETE FROM pc WHERE kode_br='$kode_br'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}


function ruang($data){
    global $db;
    $ruang =$data['ruang'];
    $lantai =$data['lantai'];
    $nama_ged =$data['nama_ged'];
    $query = "INSERT INTO ruang VALUES('','$ruang', '$lantai', '$nama_ged')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function unit($data){
    global $db;
    $unit = $data['unit'];
    $query = "INSERT INTO unit VALUES('$unit')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function proyektor($data){
    global $db;
    $kode_br = $data['kode_br'];
    $nama_ged = $data['nama_ged'];
    $unit = $data['unit'];
    $lantai = $data['lantai'];
    $ruang = $data['ruang'];
    $brand = $data['brand'];
    $tipe_model = $data['tipe_model'];
    $gambar = upload();
    if(!$gambar){
        return false;
    }
    $query = "INSERT INTO proyektor VALUES('$kode_br','$nama_ged','$lantai', '$ruang', '$unit', '$brand', '$tipe_model', '$gambar')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function updatePy($data){
    global $db;
    $kode_br = $data['kode_br'];
    $nama_ged = $data['nama_ged'];
    $unit = $data['unit'];
    $lantai = $data['lantai'];
    $ruang = $data['ruang'];
    $brand = $data['brand'];
    $tipe_model = $data['tipe_model'];
    $gambarLama = $data['gambarLama'];
    if( $_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }

    $query = "UPDATE proyektor SET nama_ged='$nama_ged', lantai='$lantai', ruang='$ruang', unit='$unit', brand='$brand', tipe_model='$tipe_model', gambar='$gambar' WHERE kode_br='$kode_br'";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function no_resubmit()
	{
		?>

			<script>
					if ( window.history.replaceState ) {
						        window.history.replaceState( null, null, window.location.href );
						}
			</script>

		<?php 
	}
?>