<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interview test</title>
</head>

<body>
    <h5>使用程式語言：PHP</h5>
    <h2>一、物件導向 - 繼承/介面</h2>
    <p>今有車輛「汽車」和「機車」，請使用物件的繼承/介面描述兩者相同與差異，及二物件的執行程式碼</p>

    <ul>
        <li>汽車跟機車繼承的是相同的介面「車」可以載人的交通工具、都是用輪子跑</li>
        <li>汽車的個別介面是方向盤及四個輪子</li>
        <li>機車的個別介面是龍頭及兩個輪子</li>
    </ul>

    <?php
    interface vehicleInterface
    {
        // 是種交通工具
        public function transportation();
        // 用輪子行駛
        public function tire();
    }

    interface vehicleType extends vehicleInterface
    {
        // 輪子數量
        public function tireQty();
        // 如何控制方向
        public function howToDrive();
    }

    class CAR implements vehicleType
    {
        function transportation()
        {
            echo "汽車是種交通工具<br>";
        }
        function tire()
        {
            echo "用輪胎行駛<br>";
        }
        function tireQty()
        {
            echo "汽車有4個輪胎<br>";
        }
        function howToDrive()
        {
            echo "使用方向盤控制方向";
        }
    }
    class MOTORBIKE implements vehicleType
    {
        function transportation()
        {
            echo "機車是種交通工具<br>";
        }
        function tire()
        {
            echo "用輪胎行駛<br>";
        }
        function tireQty()
        {
            echo "機車有2個輪胎<br>";
        }
        function howToDrive()
        {
            echo "使用龍頭控制方向";
        }
    }
    $car = new CAR();
    $car->transportation();
    $car->tire();
    $car->tireQty();
    $car->howToDrive();
    echo "<hr>";
    $motorbike = new MOTORBIKE();
    $motorbike->transportation();
    $motorbike->tire();
    $motorbike->tireQty();
    $motorbike->howToDrive();

    ?>

    <h2>二、資料處理 - 字串</h2>
    <p>請寫出將字串「人易科技:上 機 測 驗 - 演算法」中的： </p>
    <p>1.字元「:」改成全型</p>
    <p>2.去掉中文字間的空白(保留-號二側空白)</p>
    <p>3.列印出符號：到-之間的字元</p>
    <?php
    $str = "人易科技:上 機 測 驗 - 演算法";
    $searchArr = array(":", " ");
    $toArr = array("：", "");
    $newStr = mb_substr($str, 0, 4, "utf-8") . str_replace($searchArr, $toArr, mb_substr($str, 4, 8, "utf-8")) . mb_substr($str, -6, 6, "utf-8");
    $newStr = mb_substr($newStr, 4, 7, "utf-8");
    // 答案
    echo $newStr;
    ?>

    <h2>三、資料處理 - 陣列</h2>
    <p>今有陣列資料 0,1,2,3,4,5,6,7,8,9 請寫出資料處理程式碼</p>
    <?php
    $array3 = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    $even = [];
    $odd = [];
    foreach ($array3 as $num) {
        if ($num % 2 == 0) {
            array_push($even, $num);
        } else {
            array_push($odd, $num);
        }
    }
    ?>
    <p>1. 計算出「奇數值總和」減去「偶數值總和」</p>
    <?php
    // 答案
    print_r(array_sum($odd) - array_sum($even));
    ?>

    <p>2. 分割成二陣列，分別存放「偶數值」、「奇數值」</p>
    <?
    // 答案
    print_r($even);
    echo "<br>";
    print_r($odd);
    ?>

    <h2>四、資料排序 - 正序</h2>
    <p>今有一陣列資料77,5,5,22,13,55,97,4,796,1,0,9 請寫出正序排列處理程式碼（不可使用現成函式）</p>
    <?php
    $array4 = [77, 5, 5, 22, 13, 55, 97, 4, 796, 1, 0, 9];
    echo "原始排序：";
    print_r($array4);
    $len = count($array4);

    for ($i = 1; $i < $len; $i++) {
        // $i=1 從陣列的第二個值開始比大小，跟前面的值比
        $sort = $array4[$i];
        // 將$array4[$i]（被比的值）存入新變數
        for ($j = $i - 1; $j >= 0; $j--) {
            if ($sort < $array4[$j]) {
                // 如果被比的值比前面的值小，前面的key值＋1往後排
                $array4[$j + 1] = $array4[$j];
                // 將被比的值存入前一個key值
                $array4[$j] = $sort;
            } else {
                break;
            }
        }
    }
    echo "<br>新排序：";
    print_r($array4);
    ?>

    <h2>五、邏輯處理 - 交集、差集、聯集</h2>
    <p>今有二陣列，請寫出資料處理程式碼（不可使用現成函式）
        <br>陣列a：77,5,5,22,13,55,97,4,796,1,0,9
        <br>陣列b：0,1,2,3,4,5,6,7,8,9
    </p>
    <p>1.陣列c = 陣列a 交集 陣列b</p>
    <p>2.陣列d = 陣列a 差集 陣列b</p>
    <p>3.陣列e = 陣列a 聯集 陣列b</p>

    <?php
    $arrA = [77, 5, 5, 22, 13, 55, 97, 4, 796, 1, 0, 9];
    $arrB = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    $arrC = [];
    $arrD = [];
    $arrE = [];
    $lenA = count($arrA);
    $lenB = count($arrB);
    print_r($arrA);
    echo "<br>";
    print_r($arrB);
    echo "<br>";
    // echo $lenA;
    // echo "<br>";
    // echo $lenB;
    for ($i = 0; $i < $lenA; $i++) {
        for ($j = 0; $j < $lenB; $j++) {
            if ($arrA[$i] == $arrB[$j]) {
                if (!in_array($arrA[$i], $arrC)) {
                    array_push($arrC, $arrA[$i]);
                }
            }
        }
    }
    echo "<br>陣列c = ";
    print_r($arrC);
    for ($i = 0; $i < $lenA; $i++) {
        if (!in_array($arrA[$i], $arrB)) {
            array_push($arrD, $arrA[$i]);
        }
    }
    echo "<br>陣列d = ";
    print_r($arrD);
    for ($i = 0; $i < $lenA; $i++) {
        array_push($arrE, $arrA[$i]);
    }
    for ($j = 0; $j < $lenB; $j++) {
        if (!in_array($arrB[$j], $arrE)) {
            array_push($arrE, $arrB[$j]);
        }
    }
    echo "<br>陣列e = ";
    print_r($arrE);
    ?>
</body>

</html>