<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            overflow: hidden;

            background:
            linear-gradient(rgba(15,23,42,0.75),
            rgba(30,58,138,0.75)),
            url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3RhAI3iyqb1LXDDOibFoN92TyLHpOvs-PVw&s');

            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box{
            width: 900px;
            min-height: 520px;

            background: rgba(255,255,255,0.12);

            backdrop-filter: blur(15px);

            border-radius: 30px;

            overflow: hidden;

            box-shadow: 0 8px 32px rgba(0,0,0,0.3);

            border: 1px solid rgba(255,255,255,0.15);

            animation: fadeIn 1s ease;
        }

        .left-side{
            padding: 60px;
            color: white;
        }

        .left-side h1{
            font-size: 45px;
            font-weight: 700;
        }

        .left-side p{
            margin-top: 20px;
            font-size: 17px;
            line-height: 30px;
            color: rgba(255,255,255,0.85);
        }

        .right-side{
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(15px);
            padding: 60px;
            height: 100%;
        }

        .login-title{
            color: white;
            font-weight: 700;
            margin-bottom: 35px;
        }

        .form-label{
            color: white;
            font-weight: 500;
        }

        .form-control{
            border: none;
            border-radius: 15px;
            padding: 14px;
            background: rgba(255,255,255,0.2);
            color: white;
        }

        .form-control::placeholder{
            color: rgba(255,255,255,0.7);
        }

        .form-control:focus{
            background: rgba(255,255,255,0.25);
            box-shadow: none;
            color: white;
        }

        .btn-login{
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 15px;

            background: linear-gradient(135deg,#2563eb,#1d4ed8);

            color: white;

            font-weight: 600;

            transition: 0.3s;
        }

        .btn-login:hover{
            transform: translateY(-3px);
        }

        .icon{
            font-size: 70px;
        }

        @keyframes fadeIn{

            from{
                opacity: 0;
                transform: translateY(30px);
            }

            to{
                opacity: 1;
                transform: translateY(0);
            }

        }

        @media(max-width:768px){

            .login-box{
                width: 95%;
            }

            .left-side{
                display: none;
            }

        }

    </style>

</head>

<body>

<div class="container">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="login-box">

                <div class="row g-0">

                    <div class="col-md-6 left-side d-flex flex-column justify-content-center">

                        <div class="icon">
                            📊
                        </div>

                        <h1>
                            Prediksi Wisatawan
                        </h1>

                        <p>
                            Sistem prediksi jumlah wisatawan berbasis PHP Native dan Linear Regression untuk membantu analisis perkembangan pariwisata secara modern dan interaktif.
                        </p>

                    </div>

                    <div class="col-md-6 right-side d-flex flex-column justify-content-center">

                        <h2 class="login-title text-center">
                            Login Admin
                        </h2>

                        <form action="proses_login.php"
                              method="POST">

                            <div class="mb-4">

                                <label class="form-label">
                                    Username
                                </label>

                                <input type="text"
                                       name="username"
                                       class="form-control"
                                       placeholder="Masukkan username"
                                       required>

                            </div>

                            <div class="mb-4">

                                <label class="form-label">
                                    Password
                                </label>

                                <input type="password"
                                       name="password"
                                       class="form-control"
                                       placeholder="Masukkan password"
                                       required>

                            </div>

                            <button type="submit"
                                    class="btn-login">

                                Login

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
