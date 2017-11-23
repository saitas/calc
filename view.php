<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="css/base.min.css">
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <title>Calc</title>
</head>
<body>


<form name="calc-form" id="calc-form" action="" method="post">
    <div class="calc-content">
        <div>
            <input type="text" maxlength="10" class="display" name="display" value="<?php echo $displayValue;?>" readonly>　
        </div>
        <div>
            <span class="btn symbol size1" data-category="special">MC</span>
            <span class="btn symbol size1" data-category="special">MR</span>
            <span class="btn symbol size1" data-category="special">M-</span>
            <span class="btn symbol size1" data-category="special">M+</span>
            <br>

            <span class="btn symbol size2" data-category="special" data-value="abs">+/-</span>
            <span class="btn number size1" data-category="number">7</span>
            <span class="btn number size1" data-category="number">8</span>
            <span class="btn number size1" data-category="number">9</span>
            <span class="btn symbol size1" data-category="symbol">÷</span>
            <br>

            <span class="btn symbol size1" data-category="special" data-value="bs">▶</span>
            <span class="btn number size1" data-category="number">4</span>
            <span class="btn number size1" data-category="number">5</span>
            <span class="btn number size1" data-category="number">6</span>
            <span class="btn symbol size1" data-category="symbol">×</span>
            <br>

            <span class="btn clear size1" data-category="clear">C</span>
            <span class="btn number size1" data-category="number">1</span>
            <span class="btn number size1" data-category="number">2</span>
            <span class="btn number size1" data-category="number">3</span>
            <span class="btn symbol size1" data-category="symbol">−</span>
            <br>

            <span class="btn clear size1" data-category="clear">AC</span>
            <span class="btn number size1" data-category="number">0</span>
            <span class="btn number size1" data-category="number" data-value=".">・</span>
            <span class="btn number size1" data-category="symbol">=</span>
            <span class="btn symbol size1" data-category="symbol">＋</span>
            <br>

        </div>
    </div>

    <input type="hidden" id="pushed" name="pushed" value="">
    <input type="hidden" id="category" name="category" value="<?php echo $category;?>">
    <input type="hidden" id="stack" name="stack" value="<?php echo $stackValue;?>">
    <input type="hidden" id="status" name="status" value="<?php echo $status;?>">
    <input type="hidden" id="isPushedBeforeSymbol" name="isPushedBeforeSymbol" value="<?php echo $isPushedBeforeSymbol;?>">

    <input type="submit" value="計算">
    <input type="reset" value="クリア">
</form>
<br>
</body>
</html>
