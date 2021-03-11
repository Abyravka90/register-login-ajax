<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
    <title>Register Akun</title>
</head>
<body>
    <div class="container" style="margin-top:80px;">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <label for="">Register</label>
                        <div class="form-group">
                            <label for="namaLengkap">Nama Lengkap</label>
                            <input class="form-control" type="text" name="namaLengkap" id="namaLengkap" placeholder="Masukan Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" type="text" name="username" id="username" placeholder="Masukan Username">
                        </div>
                        <div class="form-group">
                            <label for="namaLengkap">Password</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Masukan Password">
                        </div>

                        <button class="btn btn-register btn-block btn-success">register</button>
                    </div>
                </div>
                <div style="margin-top:15px;" class="text-center">
                    Sudah Punya akun? <a href="login.php">login</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Javascriptnya -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <!-- Script AJAX nya -->
    <script>
    $(document).ready(function(){

        // JIKA Button register di klik
        $(".btn-register").click(function(){
            // CEK NILAI 
            var namaLengkap=$("#namaLengkap").val();
            var username=$("#username").val();
            var password=$("#password").val();

            if(namaLengkap.length==''){
                Swal.fire({
                    type : "warning",
                    title:"Ooops",
                    text : "Nama Lengkap Wajib Diisi",
                })
            } else if(username.length==''){
                Swal.fire({
                    type:'warning',
                    title:'Oops',
                    text:'username wajib diisi',
                })
            } else if (password.length==''){
                Swal.fire({
                    type:'warning',
                    title:'Oops',
                    text:'Password Wajib Diisi'
                })
            } else {
                // berarti semua fill terisi
                $.ajax({
                    url:"simpanRegister.php",
                    type:"POST",
                    data: {
                        "namaLengkap":namaLengkap,
                        "username":username,
                        "password":password,
                    },
                    // JIKA PROSES BERHASIL
                    success:function(response){
                        if(response=='success'){
                            Swal.fire({
                                type:'success',
                                title:'Register Berhasil',
                                text:'silahkan login!'
                            });
                            $("#namaLengkap").val('');
                            $("#username").val('');
                            $("#password").val('');
                        }else{
                            //jika response bukan sukses
                            Swal.fire({
                                type:'error',
                                title:'Gagal!',
                                text:'Silahkan Coba Lagi'
                            })
                        }
                        console.log(response);
                    }, 
                    // JIKA PROSES GAGAL
                    error:function(response){
                        Swal.fire({
                            type: 'error',
                            title: 'Opps!',
                            text: 'server error!'
                        })
                    }
                })
            }
        })
    })
    </script>
</body>
</html>