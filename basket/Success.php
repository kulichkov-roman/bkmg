<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

// as a part of SuccessURL script

// your registration data
$mrh_pass1 = "WQys9UAVlV8qi9dJ5O2N";  // merchant pass1 here

// HTTP parameters:
$out_summ = $_REQUEST["OutSum"];
$inv_id = $_REQUEST["InvId"];
$crc = $_REQUEST["SignatureValue"];

$crc = strtoupper($crc);  // force uppercase

// build own CRC
$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass1"));

if (strtoupper($my_crc) != strtoupper($crc))
{
  echo "bad sign\n";
  exit();
}

// you can check here, that resultURL was called 
// (for better security)

?>
<div class="hd_title"> 
  <h2>Заказ оплачен</h2>
</div>
<div id="big-basket">
<?
// OK, payment proceeds
echo "Ваш заказ №$inv_id на сумму $out_summ был успешно оплачен!</br>";
echo "";

?>
<div>

<?
require($_SERVER["DOCUMENT_ROOT"]."/basket/clear_basket.php");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>