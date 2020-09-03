<?php
require('./assets/vendors/fpdf/fpdf.php');

/************************************************************************************
 * 
 * Deskripsi
 * Ekstensi dari FPDF untuk fungsi pembuatan HMTL table
 * 
 * 
*************************************************************************************/
class Make_table extends FPDF
{
  var $widths;
  var $aligns;

  /********************************************************************
   * 
   * Deskripsi
   * Kop surat yang disertakan untuk setiap page baru
   * 
   * Keterangan
   * Properti getsessionValue() dari helper/general_helper.php
   * 
  ********************************************************************/
  function Header()
  {
    //$clinic_profile = getsessionValue();

    $CI = get_instance();

    //$this->Image($CI->config->item('kop_surat_rs'),7,10,25);
    $this->SetFont('Arial','B',16);
    $this->Cell(27);
    $this->Cell(27,7,ucwords(getInfoWeb('ss_web_name')),0,1);
    $this->Cell(27);

    $this->SetFont('Arial','',12);
    $this->Cell(27,7,ucfirst(getInfoWeb('ss_address')),0,1);
    $this->Cell(27);
    $this->Cell(27,7,strtolower(getInfoWeb('ss_contact')),0,1);

    $this->SetDrawColor(169,169,169);
    $this->SetLineWidth(1);
    $this->Line(7,40,207,40);
    $this->SetLineWidth(0);
    $this->Line(7,41,207,41);
    $this->Ln(15);
  }

  /********************************************************************
   * 
   * Deskripsi
   * Pemberian otomatis no halaman dari tiap halaman baru
   * 
   * Keterangan
   * fungsi $pdf->AliasNbPages(); di controller cetak_pdf($type)
   * 
  ********************************************************************/
  function Footer()
  {
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Halaman '.$this->PageNo().'/{nb}',0,0,'C');
  }

  /********************************************************************
   * 
   * Deskripsi
   * Set lebar cell tiap variable string dalam table
   * 
   * Parameter
   * $w => array data berdasarkan total header table
   * 
   * Return
   * None
   * 
  ********************************************************************/
  function SetWidths($w)
  {
    $this->widths=$w;
  }

  /********************************************************************
   * 
   * Deskripsi
   * Set align tiap string dalam table
   * 
   * Parameter
   * $a => array data berdasarkan total header table
   * 
   * Return
   * None
   * 
  ********************************************************************/
  function SetAligns($a)
  {
    $this->aligns=$a;
  }

  /********************************************************************
   * 
   * Deskripsi
   * Set Data variable untuk array nama header table
   * 
   * Parameter
   * $header => array data header
   * 
   * Return
   * None
   * 
  ********************************************************************/
  function SetHeader($header)
  {
    $this->headerTable = $header;
  }

  /********************************************************************
   * 
   * Deskripsi
   * Set header table pada halaman pdf
   * 
   * Parameter
   * None
   * 
   * Return
   * array data
   * 
  ********************************************************************/
  function RowHeader()
  {
    $nb         = 0;
    $aligns     = array();
    $cnt_header = count($this->headerTable);

    for($i=0;$i<=$cnt_header;$i++)
    {
      array_push($aligns, "C");
    }

    $this->SetAligns($aligns);
    $this->SetLineWidth(.3);

    $this->SetFillColor(192);
    $this->SetDrawColor(75, 75, 77);
    $this->SetTextColor(27, 27, 28);

    $this->SetFont('Arial','B',10);

    for($i=0;$i<$cnt_header;$i++)
      $nb = max($nb, $this->NbLines($this->widths[$i], $this->headerTable[$i]));
      $h 	= 7*$nb;

    for($i=0;$i<$cnt_header;$i++)
    {
      $w = $this->widths[$i];
      $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

      $x = $this->GetX();
      $y = $this->GetY();

      $this->Rect($x, $y, $w, $h, "FD");
      $this->MultiCell($w, 7, $this->headerTable[$i],0,$a,false);
      $this->SetXY($x+$w, $y);
    }

    $this->Ln($h);
  }

  /********************************************************************
   * 
   * Deskripsi
   * Set data untuk ditampilkan di body table pada halaman pdf
   * 
   * Parameter
   * $data => array data
   * 
   * Return
   * array data
   * 
  ********************************************************************/
  function RowBody($data)
  {
    $nb       = 0;
    $aligns   = array();
    $cnt_body = count($data)-1;
    
    $this->SetFillColor(48, 49, 51);
    $this->SetDrawColor(75, 75, 77);
    $this->SetTextColor(27, 27, 28);

    for($i=0;$i<=$cnt_body;$i++)
    {
      $nb = max($nb,$this->NbLines($this->widths[$i],$data[$i]));
      $h  = 5*$nb;

      if($i == 0)
      array_push($aligns,"C");
      else
      array_push($aligns,"L");
    }

    $this->CheckPageBreak($h); 

    $this->SetAligns($aligns);
    $this->SetFont('Arial','',9);

    for($i=0;$i<=$cnt_body;$i++)
    {
      $w = $this->widths[$i];
      $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
      $x = $this->GetX();
      $y = $this->GetY();

      $this->Rect($x,$y,$w,$h);
      $this->MultiCell($w,5,$data[$i],4,$a);
      $this->SetXY($x+$w,$y);
    }

    $this->Ln($h);
  }

  /********************************************************************
   * 
   * Deskripsi
   * Pemeriksaan apakah body table sudah mencapai akhir bawah
   * pada tiap halaman PDF
   * 
   * Parameter
   * $h => Ukuran halaman
   * 
   * Return
   * $this->AddPage() otomatis membuat halaman baru
   * $this->RowHeader() otomatis membuat header table
   * 
  ********************************************************************/
  function CheckPageBreak($h)
  {
    if($this->GetY()+$h > $this->PageBreakTrigger)
    {
      $this->AddPage($this->CurOrientation);
      $this->RowHeader();
    }
  }

  /********************************************************************
   * 
   * Deskripsi
   * fungsi tambahan untuk membuat line break data yang melebihi cell
   * 
   * Parameter
   * $w   => lebar cell
   * $txt => string data
   * 
   * Return
   * $nl => text yang telah dipisah
   * 
  ********************************************************************/
  function NbLines($w,$txt)
  {
    $cw =&$this->CurrentFont['cw'];

    if($w==0)
      $w 		= $this->w-$this->rMargin-$this->x;
      $wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
      $s 		= str_replace("\r",'',$txt);
      $nb   = strlen($s);
    
    if($nb>0 and $s[$nb-1]=="\n")
      $nb--;
      $sep = -1;
      $i   = 0;
      $j   = 0;
      $l   = 0;
      $nl  = 1;

    while($i<$nb)
    {
      $c = $s[$i];
      
      if($c == "\n")
      {
        $i++;
        $sep = -1;
        $j   = $i;
        $l   = 0;
        $nl++;
        continue;
      }
      
      if($c == ' ')
        $sep = $i;
      $l +=$cw[$c];
      
      if($l>$wmax)
      {
        if($sep == -1)
        {
          if($i == $j)
            $i++;
        }
        else
          $i   = $sep+1;
          $sep = -1;
          $j   = $i;
          $l   = 0;
          $nl++;
      }
      else
        $i++;
    }
    return $nl;
  }

}
?>