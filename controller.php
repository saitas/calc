<?php
print_r($_POST);

$stackValue = 0;
$status = '';
$displayValue = 0;

if($_SERVER['REQUEST_METHOD']== 'POST'){

    // 表示されている液晶の値チェック
    if(!empty($_POST['display'])){
        $displayValue = $_POST['display'];
    }

    //ボタンが押されたか
    if(isset($_POST['pushed'])){
        $pushedValue = $_POST['pushed'];

        // カテゴリー検出
        if(isset($_POST['category'])){
            $category = $_POST['category'];


            if($category == 'symbol'){

                if($pushedValue == '＋'){

                }elseif($pushedValue == '−'){

                }elseif($pushedValue == '−'){

                }elseif($pushedValue == '−'){

                }

            }elseif($category == 'clear'){
                if($pushedValue == 'C'){

                }elseif($pushedValue == 'AC'){
                    $stackValue = 0;
                    $displayValue = 0;
                    $mathStatus = '';
                }

            }else{
                //numberの場合
                if($displayValue !== 0){
                    $displayValue .= $_POST['pushed'];
                }else{
                    $displayValue = $_POST['pushed'];
                }
            }
        }

    }else{
        throw new Exception("えらーでっせ");
    }


}
