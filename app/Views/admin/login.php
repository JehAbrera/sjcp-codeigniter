<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('./CSS/output.css') ?>">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: "Poppins", sans-serif;
        }
    </style>
    <title><?= esc($title) ?></title>
</head>

<body class=" flex justify-center items-center w-full h-screen max-h-screen">
    <main class="bg-[url('../images/bgheader.jpg')] bg-center bg-cover bg-no-repeat w-full h-full flex justify-center items-center">
        <div class="card w-full max-w-sm shadow-2xl bg-base-100">
            <form class="card-body" method="post" action="/login/admin">
                <?php
                if (session()->has('loginErr')) { ?>
                    <div role="alert" class="alert alert-error label-text-alt p-2 text-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span><?= session()->loginErr ?></span>
                    </div>
                <?php } ?>
                <div class=" form-control text-xl items-center w-full font-semibold">
                    <i data-lucide="circle-user-round" class=" w-16 h-16"></i>
                    <span>Admin Login</span>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Username</span>
                    </label>
                    <input type="text" placeholder="username" name="username" class="input input-bordered" required />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" placeholder="password" name="password" class="input input-bordered" required />
                </div>
                <div class="form-control mt-6">
                    <button class="btn btn-primary" type="submit" name="login">Login</button>
                </div>
            </form>
        </div>
    </main>
    <!-- Development version -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <!-- Production version -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>