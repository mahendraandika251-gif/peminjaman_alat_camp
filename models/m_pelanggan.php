<?php
include_once 'm_koneksi.php';

class m_pelanggan {

    // ==== fungsi login ====
    function login($username)
    {
        $db = new koneksi();
        $koneksi = $db->koneksi;

        $sql = "SELECT * FROM user WHERE username = ? OR email = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("ss", $username, $username);
        $stmt->execute();

        $query = $stmt->get_result();

        if ($query && $query->num_rows > 0) {
            return $query->fetch_assoc();
        } else {
            return NULL;
        }
    }

    function tampil_data()
    {
        $db = new koneksi();
        $koneksi = $db->koneksi;
        $sql = "SELECT * FROM user";
        $query = mysqli_query($koneksi, $sql);

        $result = [];
        if ($query && mysqli_num_rows($query) > 0) {
            while ($data = mysqli_fetch_object($query)) {
                $result[] = $data;
            }
            return $result;
        } else {
            return false;
        }
    }

    function edit($id_user, $username, $email, $role)
    {
        $db = new koneksi();
        $koneksi = $db->koneksi;
        $sql = "UPDATE user SET 
                username = '$username', 
                email = '$email', 
                role = '$role' 
                WHERE id_user = '$id_user'";

        return mysqli_query($koneksi, $sql);
    }

    function tambah_data($username, $email, $password, $role)
    {
        $db = new koneksi();
        $koneksi = $db->koneksi;
        $sql = "INSERT INTO user (username, email, password, role) 
                VALUES ('$username', '$email', '$password', '$role')";
        
        return mysqli_query($koneksi, $sql);
    }

    function hapus_data($id)
    {
        $db = new koneksi();
        $koneksi = $db->koneksi;
        $sql = "DELETE FROM user WHERE id_user = '$id'";
        
        return mysqli_query($koneksi, $sql);
    }
}
?>
