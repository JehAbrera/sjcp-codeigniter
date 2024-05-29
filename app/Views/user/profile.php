<main class=" w-full flex-grow flex relative justify-center bg-zinc-200">
    <section class=" w-full max-w-lg bg-zinc-100 flex-grow flex flex-col">
        <div role="profile-nav" class=" grid grid-cols-3 divide-x border-b border-b-slate-950 divide-slate-950">
            <div class=" flex flex-col items-center justify-center py-4 link hover:bg-slate-950 group px-2" onclick="location.href = '/user/editProfile'">
                <span class=" group-hover:text-zinc-100"><i data-lucide="settings"></i></span>
                <span class=" text-center label-text group-hover:text-zinc-100">Edit Profile</span>
            </div>
            <div class=" flex flex-col items-center justify-center py-4 link hover:bg-slate-950 group px-2" onclick="location.href = '/user/editPass'">
                <span class=" group-hover:text-zinc-100"><i data-lucide="lock"></i></span>
                <span class=" text-center label-text group-hover:text-zinc-100">Change Password</span>
            </div>
            <div class=" flex flex-col items-center justify-center py-4 link hover:bg-slate-950 group px-2" onclick="location.href = '/user/delAcc'">
                <span class=" group-hover:text-zinc-100"><i data-lucide="trash-2"></i></span>
                <span class=" text-center label-text group-hover:text-zinc-100">Delete Account</span>
            </div>
        </div>
        <div class=" w-full flex flex-col items-center justify-around h-full py-6">
            <div class=" w-full flex flex-col items-center">
                <i data-lucide="circle-user" class="w-1/5 h-auto"></i>
                <?php if ($mode == 'view') { ?>
                    <span class=" text-xl font-bold">View Profile</span>
            </div>
            <div class=" w-full flex flex-col items-center gap-3">
                <?php
                    if (session()->has('profUpdated')) { ?>
                    <div class=" p-2 bg-green-200 text-success rounded-md w-4/5 label-text-alt text-center">
                        <?= session()->profUpdated ?>
                    </div>
                <?php }
                ?>
                <div class=" w-4/5 flex justify-between"><strong>First Name:</strong><span><?= $info[0] ?></span></div>
                <div class=" w-4/5 flex justify-between"><strong>Middle Name:</strong><span><?= $info[1] ?></span></div>
                <div class=" w-4/5 flex justify-between"><strong>Last Name:</strong><span><?= $info[2] ?></span></div>
                <div class=" w-4/5 flex justify-between"><strong>Email:</strong><span><?= $info[3] ?></span></div>
                <button class=" btn bg-slate-950 text-zinc-100">My Reservations</button>
            </div>
        <?php } elseif ($mode == 'edit') { ?>
            <span class=" text-xl font-bold">Edit Profile</span>
        </div>
        <form action="/user/editProfile" method="post" class=" w-4/5 flex flex-col gap-2">
            <?php
                    if (session()->has('editErr')) { ?>
                <div class=" p-2 bg-red-200 text-error rounded-md w-full label-text-alt text-center">
                    <?= session()->editErr ?>
                </div>
            <?php }
            ?>
            <div class="flex flex-row justify-between">
                <label class="label">
                    <span class="label-text">First Name</span>
                </label>
                <input type="text" placeholder="first name" name="userfn" value="<?= $info[0] ?>" class="input input-bordered" required />
            </div>
            <div class="flex flex-row justify-between">
                <label class="label">
                    <span class="label-text">Middle Name</span>
                </label>
                <input type="text" placeholder="middle name" name="usermn" value="<?= $info[1] ?>" class="input input-bordered" required />
            </div>
            <div class="flex flex-row justify-between">
                <label class="label">
                    <span class="label-text">Last Name</span>
                </label>
                <input type="text" placeholder="last name" name="userln" value="<?= $info[2] ?>" class="input input-bordered" required />
            </div>
            <div class="flex flex-row justify-between">
                <label class="label">
                    <span class="label-text">Email Address</span>
                </label>
                <input type="text" placeholder="email" name="email" value="<?= $info[3] ?>" class="input input-bordered" disabled />
            </div>
            <div class=" flex justify-center gap-2">
                <label for="cancel" class="btn btn-outline btn-error">Cancel</label>
                <label for="saveEdit" class="btn btn-success">Save Changes</label>
                <input type="checkbox" id="saveEdit" class="modal-toggle" />
                <div class="modal" role="dialog">
                    <div class="modal-box gap-2">
                        <div class=" flex justify-center">
                            <i data-lucide="save" class=" w-16 h-16"></i>
                        </div>
                        <h3 class="font-bold text-lg text-center">Are you sure you want to save changes?</h3>
                        <p class="py-4 text-center text-balance">Saving your changes will update your current information.</p>
                        <div class="modal-action mt-0 justify-center">
                            <label for="saveEdit" class="btn btn-error btn-outline">No</label>
                            <button class=" btn btn-success" type="submit">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            <?= form_close() ?>
        <?php } elseif ($mode == 'change') { ?>
            <span class=" text-xl font-bold">Change Password</span>
            </div>
            <form action="/user/editPass" method="post" class=" w-4/5 flex flex-col gap-2">
                <?php
                    if (session()->has('passErr')) { ?>
                    <div class=" p-2 bg-red-200 text-error rounded-md w-full label-text-alt text-center">
                        <?= session()->passErr ?>
                    </div>
                <?php }
                ?>
                <script>
                    function toggle(input,icon) 
                    {
                        var pass = document.getElementById(input.id);
                        var eye = document.getElementById(icon.id);
                        if (pass.type == "password") 
                        {
                            pass.type = "text";
                            eye.className = "fa-solid fa-eye-slash";
                        } 
                        else 
                        {
                            pass.type = "password";
                            eye.className = "fa-solid fa-eye";
                        }
                    }
                    
                    function validate_password() 
                    {
                        let pass = document.getElementById('newpass').value;
                        let confirm_pass = document.getElementById('conpass').value;
                        var paswnum=  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$/;
                        var paswsym=  /^(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
                                        
                        if (confirm_pass=="") 
                        {
                            document.getElementById('error_msg').style.color = 'green';
                            document.getElementById('error_msg').innerHTML =
                            '';
                            document.getElementById('create').disabled = false;
                            document.getElementById('create').style.opacity = (1);
                        }
                        else if (pass != confirm_pass) 
                        {
                            document.getElementById('error_msg').style.color = 'red';
                            document.getElementById('error_msg').innerHTML
                            = 'Password and Confirm Password do not match';
                            document.getElementById('create').disabled = true;
                            document.getElementById('create').style.opacity = (0.4);
                        }
                        else if (pass.match(paswnum)||pass.match(paswsym)&&confirm_pass.match(paswnum)||confirm_pass.match(paswsym)) 
                        {
                            document.getElementById('error_msg').style.color = 'green';
                            document.getElementById('error_msg').innerHTML =
                            '';
                            document.getElementById('create').disabled = false;
                            document.getElementById('create').style.opacity = (1);
                        }
                        else 
                        {
                            document.getElementById('error_msg').style.color = 'red';
                            document.getElementById('error_msg').innerHTML
                            = 'Password must contain at least 8 characters, a combination of uppercase and lowercase letters, and at least one or more number or special character';
                            document.getElementById('create').disabled = true;
                            document.getElementById('create').style.opacity = (0.4);
                         }
                    }
                </script>
                <div class="flex flex-row justify-between" style="position: relative;width: fit-content;">
                    <label class="label">
                        <span class="label-text">Old Password</span>
                    </label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="password" id="oldpass" name="oldpass" class="input input-bordered" required />
                    <i data-lucide="eye" id="oldpassicon" onclick="toggle(oldpass, oldpassicon)"  style="position: absolute;top: 50%;right: 10px;transform: translateY(-50%);cursor: pointer;"></i>
                </div>
                <div class="flex flex-row justify-between " style="position: relative;width: fit-content;">
                    <label class="label">
                        <span class="label-text">New Password</span>
                    </label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="password" id="newpass" name="newpass" class="input input-bordered" onkeyup="validate_password()"required />
                    <i data-lucide="eye" id="newpassicon" onclick="toggle(newpass, newpassicon)" style="position: absolute;top: 50%;right: 10px;transform: translateY(-50%);cursor: pointer;"></i>
                </div>
                <div class="flex flex-row justify-between" style="position: relative;width: fit-content;">
                    <label class="label">
                        <span class="label-text">Confirm New Password</span>
                    </label>
                    &nbsp;
                    <input type="password" id="conpass" name="conpass" class="input input-bordered" onkeyup="validate_password()"required />
                    <i data-lucide="eye" id="conpassicon" onclick="toggle(conpass, conpassicon)"  style="position: absolute;top: 50%;right: 10px;transform: translateY(-50%);cursor: pointer;"></i>
                </div>
                <span id="error_msg"></span>
                <div class=" flex justify-center gap-2">
                    <label for="cancel" class="btn btn-outline btn-error">Cancel</label>
                    <label for="savePass" class="btn btn-success">Save Changes</label>
                    <input type="checkbox" id="savePass" class="modal-toggle" />
                    <div class="modal" role="dialog">
                        <div class="modal-box gap-2">
                            <div class=" flex justify-center">
                                <i data-lucide="save" class=" w-16 h-16"></i>
                            </div>
                            <h3 class="font-bold text-lg text-center">Are you sure you want to save changes?</h3>
                            <p class="py-4 text-center text-balance">Your password will be changed, and you will be immediately logged out. You must log in again with your new password.</p>
                            <div class="modal-action mt-0 justify-center">
                                <label for="savePass" class="btn btn-error btn-outline">No</label>
                                <button class=" btn btn-success" type="submit">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            <?php } elseif ($mode == 'delete') { ?>
                <span class=" text-xl font-bold">Account Deletion</span>
                </div>
                <form action="user/delAcc" method="post" class=" w-4/5 flex flex-col gap-4">
                    <p class=" text-center">
                        Enter "CONFIRM" below to proceed with account deletion.
                    </p>
                    <input type="text" name="confirm" class="input input-bordered" />
                    <div class=" flex justify-center gap-2">
                        <label for="cancel" class="btn btn-outline btn-error">Cancel</label>
                        <label for="saveDel" class="btn btn-success">Save Changes</label>
                        <input type="checkbox" id="saveDel" class="modal-toggle" />
                        <div class="modal" role="dialog">
                            <div class="modal-box gap-2">
                                <div class=" flex justify-center">
                                    <i data-lucide="circle-x" class=" w-16 h-16"></i>
                                </div>
                                <h3 class="font-bold text-lg text-center">Are you sure you want to delete your account?</h3>
                                <p class="py-4 text-center text-balance">Please note that this action cannot be undone.</p>
                                <div class="modal-action mt-0 justify-center">
                                    <label for="saveDel" class="btn btn-error btn-outline">No</label>
                                    <button class=" btn btn-success" type="submit">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?= form_close() ?>
                <?php }
                ?>
                </div>
                <input type="checkbox" id="cancel" class="modal-toggle" />
                <div class="modal" role="dialog">
                    <div class="modal-box gap-2">
                        <div class=" flex justify-center">
                            <i data-lucide="circle-x" class=" w-16 h-16"></i>
                        </div>
                        <h3 class="font-bold text-lg text-center">Are you sure you want to discard changes?</h3>
                        <p class="py-4 text-center text-balance">Changes you made so far will not be saved.</p>
                        <div class="modal-action mt-0 justify-center">
                            <label for="cancel" class="btn btn-error btn-outline">No</label>
                            <button class=" btn btn-success" onclick="location.href = '/user/view'">Yes</button>
                        </div>
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