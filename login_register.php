<?php

require('conn.php');
session_start();

//for login
if(isset($_POST['login'])){
    $query = "SELECT * FROM users WHERE email = '$_POST[email_username]' OR studentNum = '$_POST[email_username]'";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_num_rows($result)==1){
            $result_fetch = mysqli_fetch_assoc($result);
            if(password_verify($_POST['password'], $result_fetch['password'])){
                //identify user role
                if($result_fetch['role']=="User"){
                    $_SESSION['logged_in']=true;
                    $_SESSION['email']=$result_fetch['email'];
                    header("location: index.php");;
                }
                else{
                    $_SESSION['logged_in']=true;
                    $_SESSION['email']=$result_fetch['email'];
                    header("location: adminDashboard.php");;
                }
            }
            else{
                echo "
                <script>
                    alert('Wrong username or password!');
                    window.location.href = 'login.php';
                </script>
                ";
            }

        }else{
            echo "
            <script>
                alert('Email not registered!');
                window.location.href = 'login.php';
            </script>
            ";
        }

    }
    else{
        echo "
        <script>
            alert('Email not registered!');
            window.location.href = 'login.php';
        </script>
        ";
    }

}


//for registration
if(isset($_POST['signup'])){
    $user_exists_query = "SELECT * FROM users WHERE studentNum = '$_POST[studentNum]' OR email = '$_POST[email]'";
    $result = mysqli_query($conn, $user_exists_query);
}

if($result){
    // will be executed if student number or email is already registered
    if(mysqli_num_rows($result)>0){
        $result_fetch = mysqli_fetch_assoc($result);
        if($result_fetch['studentNum'] == $_POST['studentNum']){
            //if student number already registered
                echo "
                <script>
                    alert('Student number already exists! Please make sure to enter your unique student number correctly, or login if you already have an account.');
                    window.location.href = 'login.php';
                </script>
                ";
            }else{
            //if email already registered
                echo "
                <script>
                    alert('Email already exists!');
                    window.location.href = 'login.php';
                </script>
                ";
            
            }
    }
    // will be executed if student number and email is not yet registered
    else{
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $query = "INSERT INTO users (fullname, studentNum, email, password) VALUES ('$_POST[username]', '$_POST[studentNum]', '$_POST[email]', '$password')";
        if(mysqli_query($conn, $query)){
            echo "
            <script>
                alert('Registration successful!');
                window.location.href = 'login.php';
            </script>
            ";
        }
        else{
            // if data cannot be 
            echo "
            <script>
                alert('Cannot run query!');
                window.location.href = 'login.php';
            </script>
            ";
    }
    }
}else{
    echo "
    <script>
        alert('Cannot run query!');
        window.location.href = 'login.php';
    </script>
    ";
}


?>
