<?
//require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

global $rId;

// ��������������� ���������� (������ #2)
// registration info (password #2)
$mrh_pass2 = "Wt4ALcSuNs4DD4uO5ub4";

//��������� �������� �������
//current date
$tm=getdate(time()+9*3600);
$date="$tm[year]-$tm[mon]-$tm[mday] $tm[hours]:$tm[minutes]:$tm[seconds]";

// ������ ����������
// read parameters
$out_summ = $_REQUEST["OutSum"];
$inv_id = $_REQUEST["InvId"];
$crc = $_REQUEST["SignatureValue"];

$crc = strtoupper($crc);

$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass2"));

// �������� ������������ �������
// check signature
if ($my_crc != $crc)
{
  echo "bad sign\n";
  exit();
}


/*
$el = new CIBlockElement;

$PROP = array();
$PROP[23] =  Array("VALUE"=> "7"); 

$arLoadProductArray = Array(
  "MODIFIED_BY"    => 1, // ������� ������� ������� �������������
  "IBLOCK_SECTION" => false,          // ������� ����� � ����� �������
  "PROPERTY_VALUES"=> $PROP,
  "NAME"           => "�����",
  "ACTIVE"         => "Y",            // �������
  "PREVIEW_TEXT"   => "",
  "DETAIL_TEXT"    => "",
  "DETAIL_PICTURE" => ""
  );

$PRODUCT_ID = $inv_id; 
$res = $el->Update($PRODUCT_ID, $arLoadProductArray);
*/

// ������� ������� ����������� ��������
// success
echo "OK$inv_id\n";

$rId = isset($rId) ? $rId : 0;


if( $rId != $inv_id){
	
$ch = curl_init("http://sms.ru/sms/send");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_POSTFIELDS, array(
	"api_id"		=>	"20351440-5ec4-0024-0511-8caf452ac247",
	"to"			=>	"79090986661",
	"text"		=>	iconv("windows-1251","utf-8","����� �".$inv_id.", �������!")
));
$body = curl_exec($ch);
curl_close($ch);

		
$rId = $inv_id;
}
?>