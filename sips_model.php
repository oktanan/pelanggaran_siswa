<?php require_once('koneksi.php');
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "SELECT *  FROM user where username='$username'";
    $hasil = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($hasil);
    if($data==NULL){
        //bagian tidak ada username
        echo"
        <script>
        alert('Username tidak ditemukan');
        window.location.replace('login.php');
        </script>";
    }else if($password<>$data['password']){
        //bagian password salah
        echo"
        <script>
        alert('Password salah');
        window.location.replace('login.php');
        </script>";
    }else{
        //login berhasil
        session_start();
        $_SESSION['nis'] = $user['nis'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['telp'] = $user['telp'];
        header("Location: index.php");
    }
}
?> 