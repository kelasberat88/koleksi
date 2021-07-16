<?php
define("MAHASISWA", "YURIANTO");
define("NIM", "1722500050");
define("INSTANSI", "BUMDESA SINAR HARAPAN");
define("TOPIK", "E-COMMERCE");

$conn=mysqli_connect("localhost","root","","skripsi_yurianto");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

date_default_timezone_set('Asia/Jakarta'); 
	
	function rupiah($angka){
		$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
		return $hasil_rupiah;
	}
	
	function angka($angka){
		$hasil_rupiah = number_format($angka,0,',','.');
		return $hasil_rupiah;
	}
	
	function transaksi($kode) {
		switch ($kode) {
			case 0: return "Pesanan diambil Pelanggan ke Toko"; break;
			case 1: return "Pesanan diantar ke Alamat Pelanggan"; break;
		}
	}
	
	function transaksip($kode) {
		switch ($kode) {
			case 0: return "Diambil"; break;
			case 1: return "Diantar"; break;
		}
	}
	
	function statusplg($kode) {
		switch ($kode) {
			case 0: return "Ditangguhkan"; break;
			case 1: return "Disetujui"; break;
		}
	}
	
	function status($kode) {
		switch ($kode) {
			case 0: return "Pesanan menunggu validasi toko"; break;
			case 1: return "Pesanan telah dibaca toko dan sedang disiapkan"; break;
			case 2: return "Pesanan telah siap diambil pelanggan"; break;
			case 3: return "Pesanan telah siap diantarkan ke alamat pelanggan"; break;
			case 4: return "Pesanan sedang diantarkan ke alamat pelanggan"; break;
			case 5: return "Pesanan telah diterima pelanggan"; break;
			case 8: return "Pesanan selesai"; break;
			case 9: return "Ditolak toko"; break;
		}
	}	
	
	function Tgl($tanggal)
	{
		$nBulan = date('n', strtotime($tanggal));
		switch ($nBulan)
		{
			case 1: 
				$bulan = "Januari";
				break;
			case 2: 
				$bulan = "Februari";
				break;
			case 3: 
				$bulan = "Maret";
				break;
			case 4: 
				$bulan = "April";
				break;
			case 5: 
				$bulan = "Mei";
				break;
			case 6: 
				$bulan = "Juni";
				break;
			case 7: 
				$bulan = "Juli";
				break;
			case 8: 
				$bulan = "Agustus";
				break;
			case 9: 
				$bulan = "September";
				break;
			case 10: 
				$bulan = "Oktober";
				break;
			case 11: 
				$bulan = "November";
				break;
			case 12: 
				$bulan = "Desember";
				break;
		}
		$tgl = date('d', strtotime($tanggal));
		$thn = date('Y', strtotime($tanggal));
		return "$tgl $bulan $thn" ;
			
	} #akhir fungsi tanggal
	
	function hariTgl($tanggal)
	{
		$nHari= date('N', strtotime($tanggal));
		switch ($nHari)
		{
			case 1: 
				$hari = "Senin";
				break;
			case 2: 
				$hari = "Selasa";
				break;
			case 3: 
				$hari = "Rabu";
				break;
			case 4: 
				$hari = "Kamis";
				break;
			case 5: 
				$hari = "Jumat";
				break;
			case 6: 
				$hari = "Sabtu";
				break;
			case 7: 
				$hari = "Minggu";
				break;
		}
		$nBulan = date('n', strtotime($tanggal));
		switch ($nBulan)
		{
			case 1: 
				$bulan = "Januari";
				break;
			case 2: 
				$bulan = "Februari";
				break;
			case 3: 
				$bulan = "Maret";
				break;
			case 4: 
				$bulan = "April";
				break;
			case 5: 
				$bulan = "Mei";
				break;
			case 6: 
				$bulan = "Juni";
				break;
			case 7: 
				$bulan = "Juli";
				break;
			case 8: 
				$bulan = "Agustus";
				break;
			case 9: 
				$bulan = "September";
				break;
			case 10: 
				$bulan = "Oktober";
				break;
			case 11: 
				$bulan = "November";
				break;
			case 12: 
				$bulan = "Desember";
				break;
		}
		$tgl = date('d', strtotime($tanggal));
		$thn = date('Y', strtotime($tanggal));
		$wkt = date('H:i:s', strtotime($tanggal));
		return "$hari, $tgl $bulan $thn $wkt" ;
			
	} #akhir fungsi hari tanggal
	
	function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}
?>
	
	
	
