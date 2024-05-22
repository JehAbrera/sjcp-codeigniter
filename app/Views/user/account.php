<main class=" w-full flex-grow flex items-stretch relative">
    <section class=" w-full grid grid-cols-1 md:grid-cols-2 py-4 px-2 md:px-0">
        <div class=" hidden md:flex justify-center items-center">
            <img src="<?= base_url('./images/account.png') ?>" alt="" class=" w-4/5">
        </div>
        <div class=" flex items-center justify-center">
            <div class=" card bg-zinc-100 w-[90%] md:w-4/5">
                <div class=" form-control grid grid-cols-2 text-center rounded-t-lg overflow-hidden">
                    <span class=" cursor-pointer text-xl block py-4 font-semibold <?php
                    if ($mode == 'signup') {
                        echo 'bg-slate-950 text-zinc-100';
                    } ?>"
                        onclick=" location.href = '/account/login'">Login</span>
                    <span class=" cursor-pointer text-xl block py-4 font-semibold <?php if ($mode == 'login') {
                        echo 'bg-slate-950 text-zinc-100';
                    } ?>"
                        onclick=" location.href = '/account/signup'">Register</span>
                </div>
                <div class=" form-control px-4 py-4">
                    <?php if ($mode == "login") { ?>
                        <?= form_open('login/user') ?>
                        <?php
                        if (session()->has('loginErr')) { ?>
                            <div role="alert" class="alert alert-error label-text-alt p-2 text-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span><?= session()->loginErr ?></span>
                            </div>
                        <?php }
                        ?>

                        <?php
                        if (session()->has('SucMess')) { ?>
                            <div role="alert" class="alert alert-error label-text-alt p-2 text-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span><?= session()->SucMess ?></span>
                            </div>
                        <?php }
                        ?>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Email Address</span>
                            </label>
                            <input type="text" placeholder="email" name="email" class="input input-bordered" required />
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Password</span>
                            </label>
                            <div class=" w-full relative flex">
                                <input type="password" placeholder="password" name="password"
                                    class="input input-bordered w-full" required />
                                <i data-lucide="eye" class=" absolute top-1/2 left-[calc(100%-2em)] -translate-y-1/2"></i>
                            </div>
                        </div>
                        <div class="form-control items-center mt-10 gap-2">
                            <button class="btn btn-success" type="submit">Login</button>
                            <span class=" link">Forgot Password</span>
                        </div>
                        <?= form_close() ?>
                    <?php } elseif ($mode == "signup") {
                        if ($step == 1) { ?>
                            <?= form_open('signup/step2') ?>
                            <div class=" form-control text-sm breadcrumbs">
                                <ul>
                                    <li class=" text-primary">Personal Information</li>
                                    <li>Step 2</li>
                                    <li>Step 3</li>
                                </ul>
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">First Name</span>
                                </label>
                                <input type="text" placeholder="John Rey" name="fn" value="<?= set_value('fn', $fn) ?>"
                                    class="input input-bordered" required />
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Middle Name</span>
                                </label>
                                <input type="text" placeholder="Mutas" name="mn" value="<?= set_value('mn', $mn) ?>"
                                    class="input input-bordered" required />
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Last Name</span>
                                </label>
                                <input type="text" placeholder="Abrera" name="ln" value="<?= set_value('ln', $ln) ?>"
                                    class="input input-bordered" required />
                            </div>
                            <div class=" form-control items-center mt-6">
                                <button type="submit" class=" btn btn-success w-fit" value="Submit">Next <i
                                        data-lucide="chevron-right"></i></button>
                            </div>
                            <?php
                            session()->remove('fn');
                            session()->remove('mn');
                            session()->remove('ln');
                            ?>
                            <?= form_close() ?>
                        <?php } elseif ($step == 2) { ?>
                            <?= form_open('signup/step3') ?>
                            <div class=" form-control text-sm breadcrumbs">
                                <ul>
                                    <li>Step 1</li>
                                    <li class=" text-primary">Login Information</li>
                                    <li>Step 3</li>
                                </ul>
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Email</span>
                                </label>
                                <input type="text" placeholder="samplemail@gmail.com" name="email"
                                    class="input input-bordered" />
                                <?php
                                if (session()->has('emailErr')) { ?>
                                    <span class=" label-text-alt text-error"><?= session()->emailErr ?></span>
                                <?php }
                                ?>
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Password</span>
                                </label>
                                <div class=" w-full relative flex">
                                    <input type="password" placeholder="password" name="pass"
                                        class="input input-bordered w-full" />
                                    <i data-lucide="eye" class=" absolute top-1/2 left-[calc(100%-2em)] -translate-y-1/2"></i>
                                </div>
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Confirm Password</span>
                                </label>
                                <div class=" w-full relative flex">
                                    <input type="password" placeholder="confirm password" name="conpass"
                                        class="input input-bordered w-full" />
                                    <i data-lucide="eye" class=" absolute top-1/2 left-[calc(100%-2em)] -translate-y-1/2"></i>
                                </div>
                            </div>
                            <div class=" flex gap-2 justify-center mt-6">
                                <button type="submit" class=" btn btn-error btn-outline w-fit" name="submit" value="Back"><i
                                        data-lucide="chevron-left"></i> Back</button>
                                <button type="submit" class=" btn btn-success w-fit" name="submit" value="Submit">Next <i
                                        data-lucide="chevron-right"></i></button>
                            </div>
                            <?= form_close() ?>
                        <?php } elseif ($step == 3) { ?>
                            <?= form_open('signup/finish') ?>
                            <div class=" form-control gap-4">
                                <div class=" form-control text-sm breadcrumbs">
                                    <ul>
                                        <li>Step 1</li>
                                        <li>Step 2</li>
                                        <li class=" text-primary">Verify Email</li>
                                    </ul>
                                </div>
                                <div class=" flex justify-center text-center text-balance">
                                    <p>
                                        Please enter the verification code that was sent to your email
                                        <strong><?= session()->email ?></strong>.
                                    </p>
                                </div>
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Enter OTP here</span>
                                    </label>
                                    <input type="text" name="otp" class="input input-bordered" />
                                </div>
                                <span class=" label-text-alt text-error"><?= session()->otpErr ?></span>
                                <div class=" flex justify-center">
                                    <span class=" text-primary link">Resend Code</span>
                                </div>
                            </div>
                            <div class=" flex gap-2 justify-center mt-6">
                                <button type="submit" class=" btn btn-error btn-outline w-fit" name="submit" value="Back"><i
                                        data-lucide="chevron-left"></i> Back</button>
                                <button type="submit" class=" btn btn-success w-fit" value="Submit">Next <i
                                        data-lucide="chevron-right"></i></button>
                            </div>
                            <?= form_close() ?>
                        <?php }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- Development version -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
<!-- Production version -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();

    function toggleSide() {
        let sidenav = document.getElementById('sidenav');

        sidenav.classList.toggle('hidden');
        sidenav.classList.toggle('flex');
    }
</script>
</body>

</html>