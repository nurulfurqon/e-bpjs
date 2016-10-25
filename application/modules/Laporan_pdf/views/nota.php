<?php

class PDF extends FPDF
{

	function Header()
	{

                $this->Image(base_url().'assets/img/logo_kma.jpg', 5, 5,'70','10','jpeg');
								$this->Ln(2);



	}

	function Content($tampil)
	{

            $this->Ln(6);
            $this->setFont('Arial','B',8);
            $this->setFillColor(255,255,255);
						$this->SetY(18);
						//buat garis horizontal
						$this->Line(5,$this->GetY(),205,$this->GetY());

						$this->cell(107,8,'FORMULIR KLAIM','T',0,'R',1);
						$this->cell(83,8,"NO : ".$tampil->kode_bukti,'T',0,'R',1);

						$this->SetY(26);
						//buat garis horizontal
						$this->Line(5,$this->GetY(),205,$this->GetY());

						$this->setFont('Arial','',8);
            $this->setFillColor(255,255,255);
						$this->cell(190,3,'','T',1,'C',1);
						$this->cell(30,4,'1. NIK',0,0,'L',1);
						$this->cell(60,4,': '.$tampil->nik_pegawai,0,0,'L',1);
						$this->cell(100,4,'5. Besar klaim yang diajukan (Dalam Rupiah) :',0,1,'L',1);
						$this->cell(30,4,'2. Nama Karyawan',0,0,'L',1);
						$this->cell(65,4,': '.ucwords($tampil->nama),0,0,'L',1);

						$tanggal = explode(' ',$tampil->tgl_ambil_quota);
						if(count($tanggal) == 2)
						{
							$tgl_p = explode('-',$tanggal[0]);
							$tgl_jadi = $tgl_p[2].' '.nama_bulan($tgl_p[1]).' '.$tgl_p[0];
						}

						$this->cell(30,4,'a. Tanggal Kwitansi',0,0,'L',1);
						$this->cell(65,4,': '.$tgl_jadi,0,1,'L',1);
						$this->cell(30,4,'3. Nama Pasien',0,0,'L',1);
						$this->cell(65,4,': '.ucwords($tampil->nama_pengguna),0,0,'L',1);
						$this->cell(30,4,'b. Dokter Umum',0,0,'L',1);
						$this->cell(65,4,': _____________________',0,1,'L',1);
						$this->cell(30,4,'4. Hubungan Pasien',0,0,'L',1);
						if($tampil->ket_pengguna == 1){$ket_pengguna = "Suami";}
						if($tampil->ket_pengguna == 2){$ket_pengguna = "Istri";}
						if($tampil->ket_pengguna == 3){$ket_pengguna = "Anak Pertama";}
						if($tampil->ket_pengguna == 4){$ket_pengguna = "Anak Kedua";}
						if($tampil->ket_pengguna == 5){$ket_pengguna = "Anak Ketiga";}
						if($tampil->ket_pengguna == 6){$ket_pengguna = "Diri Sendiri";}
						$this->cell(65,4,': '.$ket_pengguna,0,0,'L',1);
						$this->cell(30,4,'c. Dokter Spesialis',0,0,'L',1);
						$this->cell(65,4,': _____________________',0,1,'L',1);
						$this->cell(95,4,'',0,0,'C',1);
						$this->cell(30,4,'d. Obat-obatan',0,0,'L',1);
						$this->cell(65,4,': _____________________',0,1,'L',1);

						$this->setFont('Arial','B',8);
            $this->setFillColor(255,255,255);
						$this->cell(95,4,'',0,0,'C',1);
						$this->cell(30,4,'Total Klaim ',0,0,'L',1);
						$this->cell(65,4,': Rp. '.number_format($tampil->ambil_quota,0,',','.'),0,1,'L',1);

						$this->Ln(6);

						$this->setFont('Arial','',8);
						$this->setFillColor(255,255,255);
						$this->cell(90,4,'Mohon ditransfer ke rekening :',0,0,'L',1);
						$this->cell(100,4,'',0,1,'L',1);
						$this->cell(20,4,'Nama',0,0,'L',1);
						$this->cell(70,4,': _________________________',0,0,'L',1);
						$this->cell(100,4,'Lampung Selatan, ...................................... '.date('Y'),0,1,'L',1);
						$this->cell(20,4,'No Rek',0,0,'L',1);
						$this->cell(70,4,': _________________________',0,0,'L',1);
						$this->cell(100,4,'',0,1,'L',1);
						$this->cell(20,4,'Bank',0,0,'L',1);
						$this->cell(70,4,': _________________________',0,0,'L',1);
						$this->cell(100,4,'',0,1,'L',1);

						$this->Ln(6);

						$this->cell(32,6,'Dikalim Oleh',1,0,'C',1);
						$this->cell(31.5,6,'Verificator 1',1,0,'C',1);
						$this->cell(31.5,6,'Verificator 2',1,0,'C',1);
						$this->cell(31.5,6,'Disetujui Oleh',1,0,'C',1);
						$this->cell(31.5,6,'Dibayarkan Oleh',1,0,'C',1);
						$this->cell(32,6,'Diterima Oleh',1,1,'C',1);
						$this->cell(32,20,'',1,0,'C',1);
						$this->cell(31.5,20,'',1,0,'C',1);
						$this->cell(31.5,20,'',1,0,'C',1);
						$this->cell(31.5,20,'',1,0,'C',1);
						$this->cell(31.5,20,'',1,0,'C',1);
						$this->cell(32,20,'',1,1,'C',1);
						$this->cell(32,6,'Karyawan','B'.'L',0,'C',1);
						$this->cell(31.5,6,'General Admin','B'.'L',0,'C',1);
						$this->cell(31.5,6,'Accounting','B'.'L',0,'C',1);
						$this->cell(31.5,6,'Plant Manager','B'.'L',0,'C',1);
						$this->cell(31.5,6,'Cashier','B'.'L',0,'C',1);
						$this->cell(32,6,'Karyawan','B'.'L'.'R',1,'C',1);

						$this->SetX(5);
						//buat garis horizontal
						$this->Line($this->GetX(),145,$this->GetX(),18);

						$this->SetX(205);
						//buat garis horizontal
						$this->Line($this->GetX(),145,$this->GetX(),18);


	}

	function Footer()
	{
		//atur posisi dari bawah
		$this->SetY(-30);
		//buat garis horizontal
		$this->Line(5,$this->GetY(),205,$this->GetY());
		//Arial italic 9
		$this->SetFont('Arial','B',8);
    $this->Cell(0,6,'DOKUMEN PENUNJANG YANG HARUS DILAMPIRKAN',0,1,'C');

		$this->SetY(-24);
		//buat garis horizontal
		$this->Line(5,$this->GetY(),205,$this->GetY());

		$this->SetFont('Arial','',8);
		$this->Cell(190,2,'',0,1,'C');

		$this->Cell(5.5,5,'',1,0,'C');
    $this->Cell(179.5,5,' Form klaim',0,1,'L');

		$this->Cell(190,1,'',0,1,'C');

		$this->Cell(5.5,5,'',1,0,'C');
		$this->Cell(184.5,5,' Kwitansi asli dari rumah sakit/klinik/dokter umum/dokter spesialis disertai diagnosa',0,1,'L');

		$this->Cell(190,1,'',0,1,'C');

		$this->Cell(5.5,5,'',1,0,'C');
		$this->Cell(89.5,5,' Kwitansi asli obat-obatan & copy resep obat-obatan',0,0,'L');
		$this->Cell(95,5,'*Masa berlaku kwitansi max 30hari kerja sejak tanggal kwitansi diterbitkan',0,0,'L');


		$this->SetY(-3.5);
		//buat garis horizontal
		$this->Line(5,$this->GetY(),205,$this->GetY());
		//nomor halaman
		//$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
	}
}

$pdf = new PDF('L', 'mm', array(210,148.5));
$pdf->no_bpjs = $tampil->no_bpjs;
$pdf->kode = $tampil->kode_bukti;
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($tampil);
$pdf->Output($tampil->kode_bukti.".pdf","I");
