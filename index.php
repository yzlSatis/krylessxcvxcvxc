<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Ürün Listesi</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Ürün Listesi</h1>

        <?php
            // Veritabanı bağlantısı
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ürünler";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Bağlantı kontrolü
            if ($conn->connect_error) {
                die("Bağlantı hatası: " . $conn->connect_error);
            }

            // Ürünleri getir
            $sql = "SELECT id, product_name, price, features FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<table class="table">';
                echo '<thead class="thead-dark"><tr><th>Ürün Adı</th><th>Özellikler</th><th>Fiyat</th><th></th></tr></thead>';
                echo '<tbody>';

                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["product_name"] . "</td>";
                    echo "<td>" . nl2br($row["features"]) . "</td>"; // nl2br fonksiyonu alt alta yazdırmak için

                    echo "<td>" . $row["price"] . " TL</td>";
                    echo '<td><button class="btn btn-primary btn-sm" onclick="buyProduct(' . $row["id"] . ', \'' . $row["product_name"] . '\', ' . $row["price"] . ')">Satın Al</button></td>';
                    echo "</tr>";
                }

                echo '</tbody></table>';
            } else {
                echo "Tabloda hiç ürün bulunamadı.";
            }

            // Bağlantıyı kapat
            $conn->close();
        ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="buyModal" tabindex="-1" role="dialog" aria-labelledby="buyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buyModalLabel">Satın Al</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="productName"></p>
                    <p id="productPrice"></p>
                    <label for="paparaNumber">Papara Numarası:</label>
                    <input type="text" id="paparaNumber" class="form-control mb-2" readonly>
                    <label for="ininalNumber">İninal Numarası:</label>
                    <input type="text" id="ininalNumber" class="form-control mb-2" readonly>
                    <p style="color:red">Satın aldıktan sonra discord sunucumuzda ticket açmayı unutmayın aksi takdirde aldığınız ürün size gelmez!</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                    <button type="button" class="btn btn-primary" onclick="confirmPurchase()">Discord</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function buyProduct(id, productName, productPrice) {
            document.getElementById("productName").innerHTML = "Ürün Adı: " + productName;
            document.getElementById("productPrice").innerHTML = "Fiyat: " + productPrice + " TL";
            document.getElementById("paparaNumber").value = "1930075642";
            document.getElementById("ininalNumber").value = "Yakında Gelecek";
            $('#buyModal').modal('show');
        }

        function confirmPurchase() {
            window.location.href = "https://discord.gg/vUNH7Xw8";

            // İşlem sonrasında modal'ı kapat
            $('#buyModal').modal('hide');
        }
    </script>

    <!-- jQuery ve Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
