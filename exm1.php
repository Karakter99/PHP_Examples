<!DOCTYPE html>
<html>
    <head>
        <?php
        $servername = "localhost";
        $username = "root"; //this is my phpadmin username you have to ad yours  
        $password = "root"; //this is my phpadmin password you have to ad yours 
        $dbname = "gerekli";

        $conn = mysqli_connect($servername,$username,$password,$dbname);

        if(!$conn)
        {
            die("HATA".mysqli_connect_error());
        }


        ?>
    </head>
    <body>

    <?php
    switch(@$_GET['s'])
    {
        case "girilen": ?>
        <form method="POST" action="?s=goster&sayi=<?=@$_POST['sayi']?>">
        <?php for($i=0; $i<@$_POST['sayi'];$i++)
        { ?>
        <fieldset>
            <legend>Ogrenci<?php echo $i +1?></legend>
            <p>
                <label for="soyadiniz">Adiniz </label>
                <input type="text" name="ad[]" id="ad" > 
            </p>
            <p>
                <label for="soyadiniz">Soyadiniz </label>
                <input type="text" name="soyad[]" id="soyad" > 
            </p>
            </fieldset>
       <?php }  // for un kapanyan yeri?>
            <p><input type="submit" value="Kaydet" name="kaydet" id="kaydet"></p>
        </form>                   
 

     <?php   
        break;//girilen casin kapanyan yeri 
        case "goster":
            //$data = $_POST; echo "<pre>"; var_dump($data);
            
          // Starting here we add multiple values to Msql using for
            for($i=0;$i<@$_GET['sayi']; $i++){
                $sql ="INSERT INTO `gerek` (`ad`, `soyad`) VALUES ('{$_POST['ad'][$i]}' , '{$_POST['soyad'][$i]}')";
                $conn->query($sql);
            } ?>

            <table width ="100%" border="1">
            <tr>
                <th>Sayi1</th>
                <th>sayi2</th>

            </tr>

<?php
        $bul = "SELECT * FROM `gerek`";
        $kayit = $conn->query($bul);
        if($kayit->num_rows >0)
        {
            while($satir = $kayit ->fetch_assoc())
            { ?>
            <tr>
                <td style="font-size: 15px;"><?php echo $satir["ad"]."<br>"?></td>
                <td style="font-size: 15px;"><?php echo $satir["soyad"]."<br>"?></td>

            </tr>


                
           <?php }
        } ?>
                
        
        </table>

       <?php break; // goster casin kapanyan yeri   
        default:?>
        <form method="POST" action="?s=girilen" name="form1" id="form1">
            <p>
                <label>Kac ogenci: </label>
                <input type="text" name ="sayi" id="sayi">
            </p>
            <p><input type="submit" value="Gonder" name="gonder" id="gonder"></p>
        </form>

       <?php break; // deafultin kapanyan yeri 
    }
    ?>

    </body>
</html>
