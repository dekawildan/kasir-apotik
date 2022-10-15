<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <!-- Desain Header Login-->
    <div class="atas">
        <h2 style="text-align: center;">Halaman Login</h2>
    </div>

    <!-- Desain isi login -->
    <div class="isi">

        <!-- Form login -->
        <form method="post" action="cek-login.php">
            <table width="90%" border="0">
                <tr>
                    <td>Username</td>
                    <td>: <input type="text" name="username" placeholder="Username..." required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>: <input type="password" name="password" placeholder="Password..." required></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><button type="submit" name="masuk">Masuk</button></td>
                </tr>
            </table>
        </form>
    </div>

    <!-- Desain footer login -->
    <div class="bawah">
        <p style="text-align: center;"><strong>Aplikasi Apotik</strong></p>
    </div>
    
</body>
</html>