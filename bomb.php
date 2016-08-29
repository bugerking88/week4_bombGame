<?php
class setBomb {
    public function set(){

        $mapHight = 10;
        $mapWeight = 10;

        //初始
        for ($a = 0; $a < $mapHight; $a++) {
            for ($b = 0; $b < $mapWeight; $b++) {
                $array[$a][$b] = "0";
            }
        }

        //放炸彈
        for ($set = 0; $set < 10; $set++) {
            while (true) {
                $row = rand(0, 9);
                $col = rand(0, 9);
                if ($array[$row][$col] != "M") {
                    $array[$row][$col] = "M";
                    break;
                }
            }
        }

        //演算法
        for($a = 0; $a < 10; $a++) {
            for($b = 0; $b < 10; $b++) {
                if ($array[$a][$b]=="M") {
                    if($array[$a-1][$b]!="M") {
                        $array[$a-1][$b]++;
                    }
                    if($array[$a-1][$b-1]!="M") {
                        $array[$a-1][$b-1]++;
                    }
                    if($array[$a][$b-1]!="M") {
                        $array[$a][$b-1]++;
                    }
                    if($array[$a+1][$b-1]!="M") {
                        $array[$a+1][$b-1]++;
                    }
                    if($array[$a+1][$b]!="M") {
                        $array[$a+1][$b]++;
                    }
                    if($array[$a+1][$b+1]!="M") {
                        $array[$a+1][$b+1]++;
                    }
                    if($array[$a][$b+1]!="M") {
                        $array[$a][$b+1]++;
                    }
                    if($array[$a-1][$b+1]!="M") {
                        $array[$a-1][$b+1]++;
                    }
                }
            }
        }return $array;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="/bombGame/jquery.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".btn1").click(function(){
                    $(this).css("background-color","#ABCDEF");
                    $(this).html($(this).val());
                    if($(this).val() == "M"){
                        alert("die!");
                        location.href='bomb.php';
                    }
                    if($(this).val() == "0"){
                        function TestApply2() {
                            alert();
                        }

                    }

              });
            });
        </script>
    </head>
    <body>
    <?php
    $bom = new setBomb();
    $arrprit = $bom->set();
    $c=1;
    ?>

    <?php for ($a = 0; $a < 10; $a++,$c+10) { ?>
        <?php for ($b = 0; $b < 10; $b++, $c++) { ?>
            <input type="button" class="btn1" id="<?php echo $c ?>" value="<?php echo $arrprit[$a][$b]?>" style="width:40px;height:40px;background-color:#555555;color:#555555" />
        <?php }?><?php echo "<br>";?>
     <?php }?>
     <INPUT TYPE="button" onClick="history.go(0)" VALUE="NewGame">
    </body>
</html>
