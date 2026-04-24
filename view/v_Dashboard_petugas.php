<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Sigmar&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-image: url('../asset/bg_adm.png');
            background-size: cover; 
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #578330;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            color: white;
            z-index: 1000;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-family: "Sigmar", sans-serif;
            font-size: 20px;
        }

        .sidebar a {
            display: block;
            padding: 15px 25px;
            color: white;
            text-decoration: none;
            margin: 8px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: #ab6821e4;
            border-radius: 10px;
        }

        .sidebar i { margin-right: 10px; }

       
        .main-container {
            margin-left: 250px;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #ab6821; 
            padding: 15px 25px;
            border-radius: 15px;
            color: white;
            margin-bottom: 30px;
        }

        .header p { margin: 0; font-weight: 600; font-size: 20px; }
        .brand h4 { margin: 0; font-family: "Sigmar", sans-serif; font-size: 20px; }

    </style>
</head>
<body>

<div class="sidebar">
    <h2>CampingYuk!</h2>
    <a href="view_petugas/menyetujui.php"><i class="fas fa-tent-arrow-left-right"></i> Peminjaman</a>
    <a href="view_petugas/pengembalian.php"><i class="fas fa-check-to-slot"></i> Pengembalian</a>
    <a href="../controller/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

<div class="main-container">
    <div class="header">
        <p>Welcome Admin</p>
        <div class="brand">
            <h4>CampingYuk!</h4>
        </div>
    </div>
</div>

</body>
</html>