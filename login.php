<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Login Account</title>
</head>
<body>
    <div class="container" style="margin-top:50px;">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <label for="">Login</label>
                        <hr>
                        <div class="form-group">
                            <label for="username">username</label>
                            <input placeholder="Masukan Username.." type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username">password</label>
                            <input placeholder="Masukan Password.." type="password" name="password" id="password" class="form-control">
                        </div>        

                        <button class="btn btn-login btn-block btn-success">login</button>
                    </div>
                </div>
                <div class="text-center">
                Belum Punya akun? <a href="register.php">Silahkan Register</a>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <!-- CEK FILLING FORM -->
    <script>
        $(document).ready(function(){

            $('.btn-login').click(function(){
                // CEK USERNAME DAN PASSWORDNYA
                var username = $('#username').val();
                var password = $('#password').val();
                // JIKA USERNAME KOSONG
                if(username.length==''){
                    Swal.fire({
                        type:'warning',
                        title:'Oops',
                        text:'Username Wajib Diisi'
                    });
                } else if(password.length==''){
                    Swal.fire({
                        type:'warning',
                        title:'Oops',
                        text:'Password Wajib Diisi',
                    })
                }
                else{
                    // AJAX
                    $.ajax({
                        url:'cekLogin.php',
                        type:'POST',
                        data:{
                            "username":username,
                            "password":password
                        },
                        // JIKA DATANYA COCOK
                        success:function(response){
                            if(response=='success'){
                                Swal.fire({
                                    type:'success',
                                    title:'login berhasil',
                                    text:'anda akan diarahkan dalam 3 Detik',
                                    timer: 3000,
                                    showCancelButton:false,
                                    showConfirmButton:false,
                                }).then(function(){
                                    window.location.href="dashboard.php";
                                })
                            }else{
                                Swal.fire({
                                    type:'error',
                                    title:'Login gagal!',
                                    text:'Silahkan Coba Lagi'
                                })
                            }
                            console.log(response);
                        },
                        // JIKA DATANYA TIDAK COCOK
                        error:function(){
                            Swal.fire({
                                type:"error",
                                title:"Oops",
                                text:"server Error",
                            });
                            console.log(response);
                        }
                    })
                }
            })
        })
    </script>
</body>
</html>