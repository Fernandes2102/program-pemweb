!DOCTYPE html>
 <html lang="id">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Pengolahan Nama Anggota Keluarga</title>
     <style>
         body {
             font-family: Arial, sans-serif;
             background-color: rgb(255, 0, 204);
             margin: 0;
             padding: 20px;
         }
         .container {
             max-width: 600px;
             margin: auto;
             background: white;
             padding: 20px;
             border-radius: 5px;
             box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         }
         h1 {
             text-align: center;
             color: #333;
         }
         label {
             display: block;
             margin: 10px 0 5px;
         }
         input[type="text"] {
             width: 100%;
             padding: 10px;
             margin-bottom: 10px;
             border: 1px solid #ccc;
             border-radius: 5px;
         }
         input[type="submit"] {
             background-color: #5cb85c;
             color: white;
             border: none;
             padding: 10px;
             border-radius: 5px;
             cursor: pointer;
             width: 100%;
         }
         input[type="submit"]:hover {
             background-color: #4cae4c;
         }
         .result {
             margin-top: 20px;
             padding: 10px;
             background-color: #e7f3fe;
             border-left: 6px solid #2196F3;
         }
     </style>
 </head>
 <body>
 
 <div class="container">
     <h1>Pengolahan Nama Anggota Keluarga</h1>
     <form method="post">
         <label for="names">Masukkan Nama Anggota Keluarga (pisahkan dengan koma):</label>
         <input type="text" id="names" name="names" required>
         <input type="submit" value="Proses">
     </form>
 
     <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $namesInput = $_POST['names'];
         $namesArray = explode(',', $namesInput);
         
         foreach ($namesArray as $name) {
             $name = trim($name);
             // Mengubah nama menjadi format yang diinginkan
             $name = strtolower($name); // Ubah semua huruf menjadi kecil
             $name = ucwords($name); // Ubah huruf pertama setiap kata menjadi kapital
 
             $length = strlen($name);
             $wordCount = str_word_count($name);
             $reversedName = strrev($name);
             $vowelCount = preg_match_all('/[aeiou]/i', $name); // Menghitung vokal
             $consonantCount = $length - $vowelCount;
 
             echo "<div class='result'>";
             echo "<strong>Nama:</strong> $name <br>";
             echo "<strong>Jumlah Kata:</strong> $wordCount <br>";
             echo "<strong>Jumlah Huruf:</strong> $length <br>";
             echo "<strong>Kebalikan Nama:</strong> $reversedName <br>";
             echo "<strong>Jumlah Vokal:</strong> $vowelCount <br>";
             echo "<strong>Jumlah Konsonan:</strong> $consonantCount <br>";
             echo "</div>";
         }
     }
     ?>
 </div>
 
 </body>
 </html>