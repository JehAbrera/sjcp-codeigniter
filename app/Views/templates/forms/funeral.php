<div class="w-3/4 flex flex-col m-auto py-8">
    <div>
        <?= form_open('reserve/back') ?>
        <button type="submit" class=" btn btn-error btn-outline" name="submit"
            value="Back"><idata-lucide="chevron-left"></i> Back</button>
        <?= form_close() ?>
    </div>
    <div class="w-11/12 m-auto p-8">
        <b>Requirements</b>
        <ul class=" list-disc columns-2 gap-4">
            <li>Death certificate of the deceased</li>
        </ul>
        <br>
        <b>Notes:</b>
        <ul class=" list-disc columns-2 gap-4">
            <li>Funeral masses are held at the church while funeral blessings are held at the wake</li>
            <li>Funeral mass - Php 1,000.00</li>
            <li>Funeral blessing - Donation</li>
        </ul>
        <br>
        <div>
            <?php
            $event = session()->get('event');
            $date = date_format(date_create(session()->get('date')), 'F j, Y');
            $time = date_format(date_create(session()->get('time')), 'g:i A');
            ?>
            <b>Event: </b> <?= $event ?> <br>
            <b>Date: </b> <?= $date ?> <br>
            <b>Time: </b> <?= $time ?><br>
        </div>
    </div>
    <?= form_open('reserve/funeral') ?>
    <div class="bg-zinc-300">
        <div class="p-8">
            <div class="">
                <b>Deceased’s Information</b>
            </div>
            <div>
                <b>Name</b>
                <div class="grid grid-cols-3 gap-x-4">
                    <div class="form-control">
                        <div class="label">
                            <span class="label-text">Last name:</span>
                        </div>
                        <input type="text" id="lastName" name="lastName" placeholder="Dela Cruz"
                            class="input input-bordered w-full max-w-sm" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                    </div>
                    <div class="form-control">
                        <div class="label">
                            <span class="label-text">First name:</span>
                        </div>
                        <input type="text" id="firstName" name="firstName" placeholder="Juan"
                            class="input input-bordered w-full max-w-sm" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                    </div>
                    <div class="form-control">
                        <div class="label">
                            <span class="label-text">Middle name:</span>
                        </div>
                        <input type="text" id="midname" name="midname" placeholder="Tomas"
                            class="input input-bordered w-full max-w-sm" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" />
                    </div>
                    <div class="form-control">
                        <div class="label">
                            <span class="label-text">Age</span>
                        </div>
                        <input type="text" id="age" name="age" maxlength="120" placeholder="Taguig City"
                            class="input input-bordered w-full max-w-sm" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                    </div>
                    <div>
                        <span class="label-text">Gender:</span>
                        <div class="flex px-8">
                            <label class="cursor-pointer">
                                <input type="radio" id="genderMale" name="gender" value="Male" required />
                                <span class="label-text">Male</span>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" id="genderFemale" name="gender" value="Female" required />
                                <span class="label-text">Female</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-control">
                        <div class="label">
                            <span class="label-text">Cause of Death</span>
                        </div>
                        <input type="text" id="cod" name="cod" maxlength="120" placeholder="Taguig City"
                            class="input input-bordered w-full max-w-sm" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                    </div>
                    <div class="form-control">
                        <div class="label">
                            <span class="label-text">Date of Death</span>
                        </div>
                        <input type="date" id="dod" name="dod" min="<?= date('Y-m-d', strtotime('-100 years')); ?>"
                            max="<?= date('Y-m-d', strtotime('-1 month')); ?>"
                            class="input input-bordered w-full max-w-sm" required />
                    </div>
                    <div class="form-control">
                        <div class="label">
                            <span class="label-text">Date of Internment</span>
                        </div>
                        <input type="date" id="doi" name="doi" min="<?= date('Y-m-d', strtotime('-100 years')); ?>"
                            max="<?= date('Y-m-d', strtotime('-1 month')); ?>"
                            class="input input-bordered w-full max-w-sm" required />
                    </div>
                    <div class="form-control">
                        <div class="label">
                            <span class="label-text">Place of Cemetery</span>
                        </div>
                        <input type="text" id="cemetery" name="cemetery" maxlength="120" placeholder="Taguig City"
                            class="input input-bordered w-full max-w-sm" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                    </div>
                    <div>
                        <span class="label-text">Sacrament Received:</span>
                        <div class="flex px-8">
                            <label class="cursor-pointer">
                                <input type="radio" id="yes" name="sacrament" value="Male" required />
                                <span class="label-text">Yes</span>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" id="no" name="sacrament" value="Female" required />
                                <span class="label-text">No</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <span class="label-text">Casket or Urn:</span>
                        <div class="flex px-8">
                            <label class="cursor-pointer">
                                <input type="radio" id="casket" name="curt" value="Casket" required />
                                <span class="label-text">Casket</span>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" id="urn" name="curt" value="Urn" required />
                                <span class="label-text">Urn</span>
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div>
                    <h2>Soft Copy of Requirements</h2>
                </div>
                <!-- <div class="grid grid-cols-2 gap-x-8">
                    <div class="form-control">
                        <div class="label">
                            <span class="label-text">Death Certificate</span>
                        </div>
                        <input type="file" id="deathcert" name="deathcert" accept="image/*"
                            onchange="validateFileType(this.id)"
                            class="file-input file-input-bordered w-full max-w-xs bg-white" required />
                    </div>
                </div> -->
            </div>
            <br>
            <br>
            <div class="">
                <b>Informants Information</b>
            </div>
            <b>Name</b>
            <div class="grid grid-cols-3 gap-x-4">
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Last name:</span>
                    </div>
                    <input type="text" id="lastName" name="infln" placeholder="Dela Cruz"
                        class="input input-bordered w-full max-w-sm" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">First name:</span>
                    </div>
                    <input type="text" id="firstName" name="inffn" placeholder="Juan"
                        class="input input-bordered w-full max-w-sm" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Middle name:</span>
                    </div>
                    <input type="text" id="midname" name="infmn" placeholder="Tomas"
                        class="input input-bordered w-full max-w-sm" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Contact Number</span>
                    </div>
                    <div class="join">
                        <input type="text" name="mobile1" value="+63" id="" class="input input-bordered join-item w-1/4"
                            disabled>
                        <input type="tel" id="contactNum" name="contactNum" maxlength="10"
                            onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
                            placeholder="9123456789" pattern="[9]{1}[0-9]{9}" class="input join-item rounded-sm"
                            required><br>
                    </div>
                </div>
            </div>
            <div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Present Address</span>
                    </div>
                    <input type="text" id="address" name="address" maxlength="120"
                        placeholder="9 Sampaguita St., Brgy. Pembo, Taguig City"
                        class="input input-bordered w-full w-lg" required />
                </div>
            </div>
        </div>
    </div>
    <div class="p-8 flex justify-evenly">
        <label for="modal_clear" class="btn btn-error btn-wide btn-outline">Clear</label>
        <label for="modal_submit" class="btn btn-success btn-wide text-white">Submit</label>
    </div>
</div>