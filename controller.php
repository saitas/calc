<?php
print_r($_POST);

$stackValue = 0;
$status = '';
$displayValue = 0;
$pushedValue = 0;
$isPushedBeforeSymbol = 0;

$symbols = array(
    '＋' => '+',
    '−' => '-',
    '×' => '*',
    '÷' => '/',
);

// POST判定
if($_SERVER['REQUEST_METHOD']== 'POST'){

    // 表示されている液晶の値を格納
    if(!empty($_POST['display'])){
        $displayValue = $_POST['display'];
    }

    if(!empty($_POST['isPushedBeforeSymbol'])){
        $isPushedBeforeSymbol = $_POST['isPushedBeforeSymbol'];
    }

    if(!empty($_POST['stack'])){
        $stackValue = $_POST['stack'];
    }

    //ボタンが押されたか
    if(isset($_POST['pushed'])){
        $pushedValue = $_POST['pushed'];
    }else{
        throw new Exception("えらーでっせ");
    }


    // カテゴリー検出
    if(isset($_POST['category'])){
        $category = $_POST['category'];


        if($category == 'symbol'){

            if(isset($symbols[$pushedValue])){
                $status = $symbols[$pushedValue];
            }

            $stackValue = $displayValue;
            $isPushedBeforeSymbol = 1;

        }elseif($category == 'clear'){
            if($pushedValue == 'C'){

            }elseif($pushedValue == 'AC'){
                $stackValue = 0;
                $displayValue = 0;
                $mathStatus = '';
            }
        }elseif($category == 'special'){

            if($pushedValue == 'bs'){
                $length = mb_strlen($displayValue);

                if($length > 1){
                    $displayValue = mb_substr($displayValue, 0, $length - 1);
                }else{
                    $displayValue = 0;
                }
            }elseif($pushedValue == 'abs'){
                if($displayValue >= 0){
                    $displayValue = $displayValue - ($displayValue * 2);
                }else{
                    $displayValue = abs($displayValue);
                }
            }


        }else{
            //numberの場合
            if($displayValue !== 0){
                $displayValue .= $pushedValue;
            }else{
                $displayValue = $pushedValue;
            }

            if(!empty($isPushedBeforeSymbol)){
                $displayValue = $pushedValue;
                $isPushedBeforeSymbol = 0;
            }
        }
    }
}
