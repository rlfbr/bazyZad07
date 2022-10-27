<?php
     $conn = new mysqli('localhost', 'root', '', 'komis');
     if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
     }
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="auto.css">
     <title>Komis Samochodowy</title>
</head>
<body>
     <section class="banner">
          <h1>SAMOCHODY</h1>
     </section>
     <section class="srodek">
          <div class="lewy">
               <h2>Wykaz samochodów</h2>
               <!-- ul z skryptu 1 -->
               <ul>
               <?php
                    $sql1 = "SELECT id, marka, model FROM samochody";
                    $result1 = $conn->query($sql1);

                    if ($result1->num_rows > 0) {
                         while($row1 = $result1->fetch_assoc()) {
                              echo "<li>" . $row1["id"] . " " . $row1["marka"] . " " . $row1["model"] . "</li>";
                         }
                    }
               ?>
               </ul>
               <h2>Zamówienia</h2>
               <!-- ul z skryptu 2 -->
               <ul>
               <?php
                    $sql2 = "SELECT Samochody_id, klient FROM zamowienia";
                    $result2 = $conn->query($sql2);

                    if ($result2->num_rows > 0) {
                         while($row2 = $result2->fetch_assoc()) {
                              echo "<li>" . $row2["Samochody_id"] . " " . $row2["klient"] . "</li>";
                         }
                    }
               ?>
               </ul>
          </div>
          <div class="prawy">
               <h2>Pełne dane: Fiat</h2>
               <!-- skrypt 3 -->
               <?php
                    $sql3 = "SELECT * FROM samochody WHERE marka='Fiat'";
                    $result3 = $conn->query($sql3);

                    if ($result3->num_rows > 0) {
                         while($row3 = $result3->fetch_assoc()) {
                              echo $row3["id"] . " / " . $row3["marka"] . " / " . $row3["model"] . " / " . $row3["rocznik"] . " / " . $row3["kolor"] . " / " . $row3["stan"] . " / <br>";
                         }
                    }
               ?>
          </div>
     </section>
     <section class="stopka">
          <table>
               <tr>
                    <th><a href="kwerendy.txt">Kwerendy</a></th>
                    <th>Autor: Wojciech Kawałko 4ig1</th>
                    <th><img src="auto.png" alt="komis samochodowy"></th>
               </tr>
          </table>
     </section>
</body>
</html>

<?php
     $conn->close();
?>