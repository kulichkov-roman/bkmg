<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
<div class="bask-title catalog-menu"> 
  <h1>����� ������</h1>
</div>

<div id="big-basket" class="container">
<br>
<br>
<center>
<?
// OK, payment proceeds
echo "��� ����� ��� ������� ������! ����� � ���� �������� ��� �������������.</br>";
echo "";

echo $_POST["payment"];
echo $_POST["cMail"];  
?>
</center>
<br>
<br>

</div>

<? echo ($_SESSION['SEND']); ?>

<?
if( $_SESSION['SEND'] == true){

$_SESSION['SEND'] = false;


$ch = curl_init("http://sms.ru/sms/send");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_POSTFIELDS, array(
	"api_id"		=>	"20351440-5ec4-0024-0511-8caf452ac247",
	"to"			=>	"79090986661",
	"text"		=>	iconv("windows-1251","utf-8","�����. ������ ������� ��� ���������." )
));
$body = curl_exec($ch);
curl_close($ch);

	
}
?>

<?
require($_SERVER["DOCUMENT_ROOT"]."/basket/clear_basket.php");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>