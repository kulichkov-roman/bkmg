<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
session_start(); 
$_SESSION['SEND'] = true;
?>

<div class="bask-title catalog-menu"> 
  <h1>�������</h1>
</div>

<div class="container">

<div id="big-basket">
<table class="bask" cellpadding="0" cellspacing="0" width="100%"><tr> <th colspan="2">��������</th> <th>����������</th> <th>����</th>  </tr>
  	<?  
	  $sum = 0;
	  $sumV = 0;
	  $sumCol = 0; 
	  $numb = array();
	  $coll = 0;
	  $dev;
	  
	  foreach( $_SESSION["BASKET"] as $arElement=>$cell ):
		$res = CIBlockElement::GetByID($arElement);
	
		if($ar_res = $res->GetNext()){
	
	    $db_props = CIBlockElement::GetProperty(2, $ar_res['ID'], array("sort" => "asc"), Array("CODE"=>"PRICE") );
	    $ar_props = $db_props->Fetch();
	   }
	?>
	
    <input name="product[]" type="hidden" value="<?=$arElement?>" />
	
	<? 
		$sumCol =  $sumCol + $cell;
		$sumV = $cell*$ar_props["VALUE"];
		$sum = $sum + $sumV;
		
		$Sum = $_POST["Sum"] + $_POST["delivery"]; 	

		$numb[$coll] = $cell;
		$coll++;

   ?>

      
     <tr> 
       <td width="1%"> <img width="70px;" src="<?=CFile::GetPath($ar_res["PREVIEW_PICTURE"]);?>" /> </td> 
       <td style="text-align:left !important; padding-left:15px;"> <?=$ar_res['NAME'];?> </td>
       <td> <?=$cell?> </td> <td> <?=$sumV?> </td>  
     </tr>

<? endforeach; ?>

     <tr> 
       <td width="1%" height="70px;">  </td> 
       <td style="text-align:left !important; padding-left:15px;"> 
       <? if( $_POST["delivery"] ):  ?>
        �������� ��������:
	   <? else:?> 
       ���������  
       <? endif?>
       </td>
       <td>  </td> <td> 
		 <? if( $_POST["delivery"] ):  ?>
         <?=$_POST["delivery"];?> ���.
				 <? $dev = $_POST["delivery"]." ���."; ?>
	   <? else: $dev = "���������";?> 
        ���������
     <? endif?> </td>  
     </tr>

     <tr><td></td> <td><b>�����:</b></td> <td><b><?=$sumCol?> ��</b></td> <td><b><?=$Sum?> ���.</b></td> </tr>
   </table>
</div>

<?

$el = new CIBlockElement;

$PROP = array();

foreach( $numb as $col=>$arCell ):
  $PROP[11][$col] = $arCell;
endforeach;  

foreach( $product as $coll=>$arElement ):
  $PROP[12][$coll] = $arElement;
endforeach;  


$rCall = $_POST["rCall"];

$PROP[3] = $_POST["rName"]; // ���
$PROP[4] = $_POST["rPhon"];       // �������
$PROP[5] = $_POST["rAddress"];       // �����
$PROP[6] = $_POST["rData"]." - c ".$_POST["rOt"]." �� ".$_POST["rDo"];  // ����

$PROP[7] = $_POST["rComm"]." (".$rCall.")"." - ��������: ".$dev;       // ������

$PROP[8] = $_POST["cName"];       // ���
$PROP[9] = $_POST["cPhon"];       // �������
$PROP[10] = $_POST["cMail"];       // Mail

$PROP[23] =  Array("VALUE"=> $_POST["payment"]);       // ������

$PROP[13] = $Sum;       // �����


if ($_POST["payment"] == "1"):

endif;


$arLoadProductArray = Array(
  "MODIFIED_BY"    => $USER->GetID(), // ������� ������� ������� �������������
  "IBLOCK_SECTION_ID" => false,          // ������� ����� � ����� �������
  "IBLOCK_ID"      => 3,
  "PROPERTY_VALUES"=> $PROP,
  "NAME"           => "�����",
  "ACTIVE"         => "Y",            // �������
  "PREVIEW_TEXT"   => "",
  "DETAIL_TEXT"    => "",
  "DETAIL_PICTURE" => ""
  );


if($PRODUCT_ID = $el->Add($arLoadProductArray))
{
   $message = '����� �'.$PRODUCT_ID.' �� ����� '.$Sum.'���. ������� ������.  ������� �� �����, �� ����������� � ���� ��������!';	
    mail($_POST["cMail"], "����� � ����� ��������������.��", $message); 
}
else
  echo "Error: ".$el->LAST_ERROR;


if ( $_POST["payment"] == "9"){
	
echo "<a href='Success2.php' class='btn_pay'>�������� �����</a>";
	
}else{

// your registration data
$mrh_login = "flowermgn";      // your login here
$mrh_pass1 = "WQys9UAVlV8qi9dJ5O2N";   // merchant pass1 here

// order properties
$inv_id    = $PRODUCT_ID;        // shop's invoice number 
                       // (unique for shop's lifetime)
$inv_desc  = "����� � ����� ��������������.��:";   // invoice desc
$out_summ  = $Sum;   // invoice summ

// build CRC value
$crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1");

$ch = curl_init("http://sms.ru/sms/send");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_POSTFIELDS, array(
	"api_id"		=>	"20351440-5ec4-0024-0511-8caf452ac247",
	"to"			=>	"79090986661",
	"text"		=>	iconv("windows-1251","utf-8", "�������� ����� �".$inv_id.", �� ����� ".$Sum."���." )
));
$body = curl_exec($ch);
curl_close($ch);



// build URL
$url = "https://auth.robokassa.ru/Merchant/Index.aspx?MrchLogin=$mrh_login&".
    "OutSum=$out_summ&InvId=$inv_id&Desc=$inv_desc&SignatureValue=$crc";

// print URL if you need
echo "<a href='$url' class='btn_pay'>�������� �����</a>";
}

?>
<div class="clearfix"></div>
<br>
<br>

</div>

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>
