<?php
include 'koneksi.php';

function checkUserType($username)
{
    global $koneksi;
    $query_admin = "SELECT * FROM admin WHERE username = '$username'";
    $query_pelanggan = "SELECT * FROM pelanggan WHERE username = '$username'";
    $query_pemimpin = "SELECT * FROM pemimpin WHERE username = '$username'";
    $query_petugas = "SELECT * FROM petugas WHERE username = '$username'";

    $result_admin = mysqli_query($koneksi, $query_admin);
    $result_pelanggan = mysqli_query($koneksi, $query_pelanggan);
    $result_pemimpin = mysqli_query($koneksi, $query_pemimpin);
    $result_petugas = mysqli_query($koneksi, $query_petugas);

    if (mysqli_num_rows($result_admin) > 0) {
        return "admin";
    } elseif (mysqli_num_rows($result_pelanggan) > 0) {
        return "pelanggan";
    } elseif (mysqli_num_rows($result_pemimpin) > 0) {
        return "pemimpin";
    } elseif (mysqli_num_rows($result_petugas) > 0) {
        return "petugas";
    } else {
        return "not_found";
    }
}

function checkAndLogoutActiveSession($koneksi, $id_pelanggan)
{
    $query_check_active_session = "SELECT * FROM logged_in_pelanggan WHERE id_pelanggan = '$id_pelanggan'";
    $result_check_active_session = mysqli_query($koneksi, $query_check_active_session);

    if (mysqli_num_rows($result_check_active_session) > 0) {
        $query_delete_logged_in_pelanggan = "DELETE FROM logged_in_pelanggan WHERE id_pelanggan = '$id_pelanggan'";
        mysqli_query($koneksi, $query_delete_logged_in_pelanggan);
        session_unset();
        session_destroy();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userType = checkUserType($username);
    if ($userType !== "not_found") {
        $query_user = "SELECT * FROM $userType WHERE username = '$username'";
        $result_user = mysqli_query($koneksi, $query_user);

        if (mysqli_num_rows($result_user) > 0) {
            $row = mysqli_fetch_assoc($result_user);
            $hashed_password = $row['password'];

            if ($password === $hashed_password) {
                // Check if the user is a 'pelanggan'
                if ($userType === "pelanggan") {
                    // Check if the pelanggan is already logged in
                    $query_check_logged_in = "SELECT * FROM logged_in_pelanggan WHERE id_pelanggan = '{$row['id_pelanggan']}'";
                    $result_check_logged_in = mysqli_query($koneksi, $query_check_logged_in);
                    if (mysqli_num_rows($result_check_logged_in) > 0) {
                        // If already logged in, directly redirect to pelanggan home page
                        echo "success:" . $username . ":" . $userType . ":" . "pages/pelanggan_home";
                        exit;
                    }
                }

                // Process login for other user types
                session_start();
                $_SESSION['username'] = $username;

                switch ($userType) {
                    case "admin":
                        $_SESSION['id_admin'] = $row['id_admin'];
                        break;
                    case "pelanggan":
                        $_SESSION['id_pelanggan'] = $row['id_pelanggan'];
                        $id_pelanggan = $row['id_pelanggan'];
                        break;
                    case "pemimpin":
                        $_SESSION['id_pemimpin'] = $row['id_pemimpin'];
                        break;
                    case "petugas":
                        $_SESSION['id_petugas'] = $row['id_petugas'];
                        break;
                    default:
                        break;
                }

                // Add pelanggan to logged_in_pelanggan table
                if ($userType === "pelanggan") {
                    $query_check_logged_in = "SELECT * FROM logged_in_pelanggan WHERE id_pelanggan = '{$id_pelanggan}'";
                    $result_check_logged_in = mysqli_query($koneksi, $query_check_logged_in);
                    if (mysqli_num_rows($result_check_logged_in) > 0) {
                        // If already logged in, show error message
                        echo "akun_sedang_digunakan";
                        exit;
                    }

                    $query_count_logged_in_pelanggan = "SELECT COUNT(*) AS total FROM logged_in_pelanggan";
                    $result_count_logged_in_pelanggan = mysqli_query($koneksi, $query_count_logged_in_pelanggan);
                    $row_count_logged_in_pelanggan = mysqli_fetch_assoc($result_count_logged_in_pelanggan);
                    $total_logged_in_pelanggan = $row_count_logged_in_pelanggan['total'];
                    if ($total_logged_in_pelanggan >= 5) {
                        echo "error_max_logged_in";
                        exit;
                    } else {
                        $query_add_logged_in_pelanggan = "INSERT INTO logged_in_pelanggan (id_pelanggan) VALUES ('$id_pelanggan')";
                        mysqli_query($koneksi, $query_add_logged_in_pelanggan);
                    }
                }

                // Success response
                switch ($userType) {
                    case "admin":
                        echo "success:" . $username . ":" . $userType . ":" . "pages/admin_home";
                        break;
                    case "pelanggan":
                        echo "success:" . $username . ":" . $userType . ":" . "pages/pelanggan_home";
                        break;
                    case "pemimpin":
                        echo "success:" . $username . ":" . $userType . ":" . "pages/pemimpin_home";
                        break;
                    case "petugas":
                        echo "success:" . $username . ":" . $userType . ":" . "pages/petugas_home";
                        break;
                    default:
                        echo "success:" . $username . ":" . $userType . ":" . "index";
                        break;
                }
            } else {
                echo "error_password";
            }
        } else {
            echo "error_username";
        }
    } else {
        echo "error_username";
    }
}
