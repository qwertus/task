<!DOCTYPE html>
<html>
    <body>
        <table id="table" align="left" border="1" cellpadding="3" cellspacing="0">
            <!--Pravljenje tabele kroz for petlje-->
            <?php
            for ($i = 0; $i <= 10; $i++) {
                echo "<tr>";
                for ($j = 0; $j <= 10; $j++) {
                    if ($i == 0 && $j == 0) {
                        
                        echo "<th style='background-color:lightgrey; width:80px'>  </th>";
                    }
                    elseif ($i == 0 && $j != 0) {
                        
                        echo "<th style='background-color:lightgrey; width:80px'>" . $j . "</th>";
                    } elseif ($j == 0 && $i != 0) {
                        
                        echo "<td style='background-color:lightgrey; width:80px;text-align:center;font-weight:bold'>" . $i . "</td>";
                    } else {

                        echo "<td style='width:80px;text-align:center' data-x='$i' data-y='$j' data-val='$i x $j'></td>";
                    }
                }
                echo "</tr>";
            }
            ?>
            <h1 style=""></h1>
        </table>
        <script src="/front/assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="/front/assets/js/calculator.js" type="text/javascript"></script>
    </body>
</html>

