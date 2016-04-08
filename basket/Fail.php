<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
<div class="hd_title"> 
  <h2>Отказ от оплаты</h2>
</div>

<div id="big-basket">
<?
$inv_id = $_REQUEST["InvId"];
echo "<div style='margin:0 auto; width:400px;'>";

echo "<div>Вы отказались от оплаты. Заказ №$inv_id</div>";
echo "<div>You have refused payment. Order  №$inv_id\n</div>";

echo "</div>";
?>
</div>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>



