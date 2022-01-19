<!DOCTYPE html>
<html>
    <head>
        <title> Spesifik data cekmek</title>
    </head>
    <body>
    <?php 
    
      // In this code I tried to find a person name and print it in screen In the code We have done it on one page usuing swicth case )  ; 
      // Don't forget to connect your own database; 
    
      
    $servername = "localhost";
    $username = "root"; //your phpMyadmin username 
    $password = "root"; // it can be empty it is your phpMyadmin entry code
    $dbname = "gerekli"; //you have to insert you database name here
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn)
    {
        die("ERROR".mysqli_connect_error());
    }

    switch(@$_GET['s'])
    {
        case "goster" //Here we show them the result find in database :
            $sql = "SELECT * FROM gerek WHERE ad='{$_POST['girilen']}'"; 
            $result = mysqli_query($conn,$sql);
        
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                echo "Isim: " . $row["ad"]. " - Soyisim: " . $row["soyad"];
                }
            } else {
                echo "0 results";
            }
            
            mysqli_close($conn);
            ?>
            <form method="POST" action="?s=default" #here we send ourself to default page >
                <p><input type="submit" value="Geri Don" name="geridon"></p>
            </form>

            <?php break;//goster gutaryan yeri
            default:  // Here we ask user to input name that he/she want to find ?> 
      
        
                <form method="POST" action="?s=goster" #here we sent ourself to goster page>
                    <p>
                        <label>Kimi bulmak istiyorsun? Adiniz giriniz</label>
                        <input type="text" name="girilen" id="girilen"> 
                    </p>
                    <p><input type="submit" value="Bul" id="bul" name="bul"></p>
                </form>
             <?php   
             break;//islem gutaryan yeri  
    }


    ?>
    </body>
</html>
