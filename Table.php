<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Matematiksel Islemler</title>
    </head>
    <body>
        <?php 
        switch(@$_GET['s'])
        {

            
            case "kac":
           ?> 
        <form id="form2" name="form2" method="post" action="?s=sonuc&sayi=<?=@$_POST["sayi"]?>" >
        <?php for($i=0;$i < @$_POST["sayi"]; $i++)
                {?>
                <fieldset>
                    <legend><?php echo ($i+1)?>.Ogrenci</legend>
                    <p>   
                        <label for="sayi1">Sayi1: </label>
                        <input type="text" name="sayi1<?=$i?>" id="sayi1">
                    </p>
                    <p>
                        <label for="sayi1">Sayi2:</label>
                        <input type="text" name="sayi2<?=$i?>" id="sayi2">
                    </p>

                    <label for="islem">islem: </label>
                    <select name="islem<?=$i?>" for="islem" id="islem">
                        <option value="0" selected="selected">Seçiniz</option>
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="*">*</option>    
                        <option value="/">/</option>
                    </select>
                </fieldset>
  
              <?php } ?> 
              <p>
              <input type="submit" name="button" id="button" value="Hesapla">
              </p>
            
        </form>
  <?php break;
  case "sonuc":?>
    <table border="1" width ="100%">
        <tr>
            <th>Sayi1</th>
            <th>Sayi2</th>
            <th>Islem</th>
            <th>Sonuc</th>
        </tr>

        <?php for($i=0;$i <@$_GET["sayi"];$i++)
        { ?>
        <tr>
         <td><?=@$_POST["sayi1".$i]?></td>
         <td><?=@$_POST["sayi2".$i]?></td> 
         <td><?=@$_POST["islem".$i]?></td> 
         <td><? print(dortislem(@$_POST["sayi1".$i],@$_POST["sayi2".$i],@$_POST["islem".$i]))?></td>
            
        </tr>
         <?php
         function dortislem($num1,$num2,$haysi)
         {
            $sonuc= 0; 
            if($haysi == "+")
            {
                $sonuc = $num1 +$num2;
            }
            else if($haysi == "-")
            {
                $sonuc = $num1 - $num2;
            }
            else if($haysi == "*")
            {
                $sonuc = $num1 * $num2;
            }
            else if($haysi == "/")
            {
                $sonuc = round($num1 / $num2,2);
            }
            else{}
            return $sonuc;
         }
        
        
        
        } ?>

    

    </table>
        <?php     
    break;
        default:?>
        <form id="form1" name="form1"  method="post"  action="?s=kac">
            <p>
            <label for="sayi">Kac islem yapmak istiyorsun :</label>
            <input type="text" name="sayi" id="sayi">
            </p>
            <p><input type="submit" name="gonder" id="Gonder" value="Gonder"></p>
            
        </form>
  <?php break;  
} ?> 
    </body>
</html>
