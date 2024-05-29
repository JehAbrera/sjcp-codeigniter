<main class=" w-full flex-grow flex items-stretch relative">
    <section class=" w-full grid grid-cols-1 md:grid-cols-2 py-4 px-2 md:px-0">
        <div class=" hidden md:flex justify-center items-center">
            <img src="<?= base_url('./images/account.png') ?>" alt="" class=" w-4/5">
        </div>
        <div class=" flex items-center justify-center">
            <div class=" card bg-zinc-100 w-[90%] md:w-4/5">
                <?php
                if($step == 1){ ?>
                    <form action="/forgotpass/step1" method="post">
                        <div class=" form-control px-4 py-4">
                            <div class="text-center p-10">
                                <b class="text-2xl">Forgot Password</b>
                                <p>Please provide the email address you used when you signed up for your account.</p>
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Email Address</span>
                                </label>
                                <input type="text" placeholder="Email" name="email" class="input input-bordered" required />
                                <span class=" label-text-alt text-error"><?= session()->emailErr ?></span>
                            </div>
                            <div class="flex justify-center items-center mt-6 gap-2">
                                <button type="submit" class=" btn btn-error btn-outline w-fit" value="back"><i data-lucide="chevron-left"></i>Back</button>
                                <button type="submit" class=" btn btn-success w-fit" value="send">Send OTP <i data-lucide="chevron-right"></i></button>
                            </div>
                        </div>
                    </form>
            <?php } elseif ($step == 2){?>
                    <form action="/forgotpass/step2" method="post">
                        <div class=" form-control px-4 py-4">
                            <div class="text-center p-10">
                                <b class="text-2xl">Forgot Password</b>
                                <p>Please enter the verification code that was sent to <?=session()->get('email')?></p>
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Enter OTP here</span>
                                </label>
                                <input type="text" name="otp" class="input input-bordered" placeholder="Enter OTP here" />
                            </div>
                            <span class=" label-text-alt text-error"><?= session()->otpErr ?></span>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">New Password</span>
                                </label>
                                
                                <div class=" w-full relative flex">
                                    <input type="password" placeholder="Password" name="pass" id="pass"
                                        class="input input-bordered w-full" onkeyup="validate_password()" />
                                    <i data-lucide="eye" id="passicon" onclick="toggle(pass, passicon)" class=" absolute top-1/2 left-[calc(100%-2em)] -translate-y-1/2 cursor-pointer"></i>
                                </div>
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Confirm Password</span>
                                </label>
                                <div class=" w-full relative flex">
                                    <input type="password" placeholder="Confirm Password" name="conpass" id="conpass"
                                        class="input input-bordered w-full" onkeyup="validate_password()" />
                                    <i data-lucide="eye" id="conpassicon" onclick="toggle(conpass, conpassicon)" class=" absolute top-1/2 left-[calc(100%-2em)] -translate-y-1/2 cursor-pointer"></i>
                                </div>
                                <span class=" label-text-alt text-error"><?= session()->passErr ?></span>
                            </div>
                            <span id="error_msg"></span>
                        </div>
                        <div class=" flex gap-2 justify-center mt-6">
                            <button type="submit" class=" btn btn-error btn-outline w-fit" name="submit" value="Back"><i data-lucide="chevron-left"></i> Back</button>
                            <button type="submit" class=" btn btn-success w-fit" value="Submit">Submit </button>
                        </div>
                    </form>
                    <div class=" flex justify-center p-5">
                        <a href="/forgotpass/resend" class="text-primary link">Resend Code</a>
                    </div>
            <?php } ?>
            </div>
        </div>
    </section>
</main>
<!-- Development version -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
<!-- Production version -->
<script src="https://unpkg.com/lucide@latest"></script>
<script src="<?= base_url('./scripts/Registration.js') ?>"></script>
</body>

</html>