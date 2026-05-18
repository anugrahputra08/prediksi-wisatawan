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

        body{
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            overflow: hidden;
            background: linear-gradient(135deg,#0f172a,#1e3a8a);
        }

        .login-container{
            height: 100vh;
        }

        .login-card{
            border: none;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            animation: fadeIn 0.8s ease;
        }

        .left-side{
            background: linear-gradient(135deg,#2563eb,#1d4ed8);
            color: white;
            padding: 50px;
        }

        .left-side h1{
            font-weight: 700;
        }

        .right-side{
            background: white;
            padding: 50px;
        }

        .form-control{
            border-radius: 12px;
            padding: 12px;
        }

        .form-control:focus{
            box-shadow: 0 0 10px rgba(37,99,235,0.3);
            border-color: #2563eb;
        }

        .btn-login{
            background: linear-gradient(135deg,#2563eb,#1d4ed8);
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            color: white;
        }

        .btn-login:hover{
            transform: translateY(-2px);
            transition: 0.3s;
        }

        @keyframes fadeIn{

            from{
                opacity: 0;
                transform: translateY(20px);
            }

            to{
                opacity: 1;
                transform: translateY(0);
            }

        }

    </style>

</head>

<body>

<div class="container login-container d-flex justify-content-center align-items-center">

    <div class="col-md-10">

        <div class="card login-card">

            <div class="row g-0">

                <div class="col-md-6 left-side d-flex flex-column justify-content-center">

                    <h1>📊 Prediksi Wisatawan</h1>

                    <p class="mt-3">
                        Sistem prediksi jumlah wisatawan berbasis PHP Native dan Linear Regression.
                    </p>

                </div>

                <div class="col-md-6 right-side">

                    <h3 class="mb-4 text-center">
                        Login Admin
                    </h3>

                    <form action="proses_login.php"
                          method="POST">

                        <div class="mb-3">

                            <label>Username</label>

                            <input type="text"
                                   name="username"
                                   class="form-control"
                                   placeholder="Masukkan username"
                                   required>

                        </div>

                        <div class="mb-4">

                            <label>Password</label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Masukkan password"
                                   required>

                        </div>

                        <button type="submit"
                                class="btn btn-login w-100">

                            Login

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
