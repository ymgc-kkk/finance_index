<?php
// ページ管理
$pageCounter=0;

if (!empty($_POST["send_btn"])) {
    $pageCounter=1;
}
if (!empty($_POST["confirm_btn"])) {
    $pageCounter=2;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投資指標計算</title>
    <link rel="stylesheet" type="text/css" href="./color.css">
</head>

<body>
<!-- 記入部　フォーム -->
<?php if ($pageCounter===0):?>
    <form class="calForm" method="POST">
        <dl>
            <dt>会社名</dt>
            <dd><input type="text" class="box" name="companyName"></dd>
            <dt>総資産(百万円)：</dt>
            <dd><input type="number" class="box" name="asset"></dd>
            <dt>自己資本(百万円)：</dt>
            <dd><input type="number" class="box" name="equity"></dd>
            <dt>当期純利益(百万円)：</dt>
            <dd><input type="number" class="box" name="currentProfit"></dd>
            <dt>発行済み株式数(百万株)：</dt>
            <dd><input type="number" class="box" name="outstandingStock"></dd>
            <dt>株価(1株/円)：</dt>
            <dd><input type="number" class="box" name="stockPrice"></dd>
            <dt>予想配当(円/1株)</dt>
            <dd><input type="number" class="box" name="expectedDividend"></dd>

            <!-- 計算ボタン　関数は80行位に書いてある -->
            <p><input type="button" class="calc-btn" onclick="calc(asset.value, equity.value,
            currentProfit.value, outstandingStock.value, stockPrice.value, expectedDividend.value);" value="計算"></p>

            <!-- 純資産に対してどの程度稼いだか -->
            <dt>ROE(%)：</dt>
            <dd><input id="roe" name="roe" class="box" type="text" readonly=""></dd>
            <!-- 資産に対してどの程度稼いだか -->
            <dt>ROA(%)：</dt>
            <dd><input id="roa" name="roa" class="box" type="text" readonly=""></dd>
            <!--1株あたり純資産-->
            <dt>BPS(円)：</dt>
            <dd><input id="bps" name="bps" class="box" type="text" readonly=""></dd>
            <!--1株あたり利益-->
            <dt>EPS(円)：</dt>
            <dd><input id="eps" name="eps" class="box" type="text" readonly=""></dd>
            <!--株価収益率　1株あたり純資産に対して割安、割高か-->
            <dt>PER(倍)：</dt>
            <dd><input id="per" name="per" class="box" type="text" readonly=""></dd>
            
            <br>
        </dl>
        <textarea name="memo"rows="7" cols="50"></textarea>
        
        <!-- 押すとpageCounterが1になる -->
        <input type="submit" class="send_btn" name="send_btn" value="確認">

        <input type="reset" class="del_btn" name="del_btn" value="リセット">
    </form>
    <script>
    // 計算function
    // 計算はroundなので全て四捨五入されています。小数点以下出すため、内と外で*100,/100しています
    // 100万という単位で括っているため、厳密な結果と少し乖離があることがあります
    function calc(asset,　equity, currentProfit, outstandingStock, stockPrice, expectedDividend) {
        const roe_value = document.getElementById('roe').value = Math.round(currentProfit / equity * 100 * 100) / 100;
        const roa_value = document.getElementById('roa').value = Math.round(currentProfit / asset * 100 * 100) / 100;
        const bps_value = document.getElementById('bps').value = Math.round(equity / outstandingStock * 100) / 100;
        const eps_value = document.getElementById('eps').value = Math.round(currentProfit / outstandingStock * 100) / 100;
        const per_value = document.getElementById('per').value = Math.round(stockPrice / eps_value * 100) / 100;

        }
       
    </script>
<?php endif; ?>

<!-- 確認画面 pageCounter1 -->
<?php if ($pageCounter===1) :?>
    <form class="calForm" method="POST">
        <dl>
            <dt>会社名</dt>
            <dd><input type="text" class="box" name="companyName" readonly="" value="<?php echo $_POST["companyName"] ?>"></dd>
            <dt>総資産(百万円)：</dt>
            <dd><input type="number" class="box" name="asset" readonly="" value="<?php echo $_POST["asset"] ?>"></dd>
            <dt>自己資本(百万円)：</dt>
            <dd><input type="number" class="box" name="equity" readonly="" value="<?php echo $_POST["equity"] ?>"></dd>
            <dt>当期純利益(百万円)：</dt>
            <dd><input type="number" class="box" name="currentProfit" readonly="" value="<?php echo $_POST["currentProfit"] ?>"></dd>
            <dt>発行済み株式数(百万株)：</dt>
            <dd><input type="number" class="box" name="outstandingStock" readonly="" value="<?php echo $_POST["outstandingStock"] ?>"></dd>
            <dt>株価(1株/円)：</dt>
            <dd><input type="number" class="box" name="stockPrice" readonly="" value="<?php echo $_POST["stockPrice"] ?>"></dd>
            <dt>予想配当(円/1株)</dt>
            <dd><input type="number" class="box" name="expectedDividend" readonly="" value="<?php echo $_POST["expectedDividend"] ?>"></dd>

            <dt>ROE(%)：</dt>
            <dd><input id="roe" name="roe" class="box" type="text" readonly="" value="<?php echo $_POST["roe"] ?>"></dd>
            <dt>ROA(%)：</dt>
            <dd><input id="roa" name="roa" class="box" type="text" readonly="" value="<?php echo $_POST["roa"] ?>"></dd>
            <dt>BPS(円)：</dt>
            <!--1株あたり純資産-->
            <dd><input id="bps" name="bps" class="box" type="text" readonly="" value="<?php echo $_POST["bps"] ?>"></dd>
            <dt>EPS(円)：</dt>
            <!--1株あたり利益-->
            <dd><input id="eps" name="eps" class="box" type="text" readonly="" value="<?php echo $_POST["eps"] ?>"></dd>
            <dt>PER(倍)：</dt>
            <!--株価収益率　1株あたり純資産に対して割安、割高か-->
            <dd><input id="per" name="per" class="box" type="text" readonly="" value="<?php echo $_POST["per"] ?>"></dd>
            
            <br>
        </dl>
        <textarea name="memo" rows="7" cols="50"><?php echo $_POST["memo"] ?></textarea>

        <input type="submit" class="confirm_btn" name="confirm_btn" value="登録">
        <input type="submit" class="back_btn" name="back_btn" value="戻る">

<?php endif; ?>

<!-- 完了画面 pageCounter2-->
<?php
if ($pageCounter===2) :?>
送信完了
<br>
<?php
    // DB通信のためのコード
    require "insert.php";

    insertInvest($_POST);
    ?>
<?php endif; ?>
</body>
</html>
