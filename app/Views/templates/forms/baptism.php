<div class="w-3/4 flex flex-col m-auto py-8">
    <div>
        <?= form_open('reserve/back') ?>
        <button type="submit" class=" btn btn-error btn-outline" name="submit"
            value="Back"><idata-lucide="chevron-left"></i> Back</button>
        <?= form_close() ?>
    </div>
    <div class="w-11/12 m-auto p-8">
        <b>Requirements</b>
        <p>Child’s PSA/Local Birth Certificate (photocopy)</p>
        <p>Marriage Contract of parents (photocopy)</p>
        <br>
        <b>Notes:</b>
        <ul class=" list-disc columns-2 gap-4">
            <li>Parents & sponsors are REQUIRED to attend the seminar</li>
            <li>White dress or polo & pants for the child</li>
            <li>The Godfather (Ninong) and Godmother (Ninang) must be 18 years of age or older</li>
            <li>Any color for the parents & sponsors</li>
            <li>Only baptized Catholics are eligible to be chosen as Godfathers (Ninong) and Godmothers (Ninang)
            </li>
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
    <?= form_open('reserve/baptism') ?>
    <div class="bg-zinc-300">
        <div class="p-8">
            <div class="">
                <b>To be baptized's information</b>
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
                </div>
            </div>
            <div class="grid grid-cols-3 gap-x-4">
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
                        <span class="label-text">Birth Date</span>
                    </div>
                    <input type="date" id="dob" name="dob" min="<?= date('Y-m-d', strtotime('-100 years')); ?>"
                        max="<?= date('Y-m-d', strtotime('-1 month')); ?>" class="input input-bordered w-full max-w-sm"
                        required />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Birth place</span>
                    </div>
                    <input type="text" id="pob" name="pob" maxlength="120" placeholder="Taguig City"
                        class="input input-bordered w-full max-w-sm" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
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
            <div class="grid grid-cols-2 gap-x-8">
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Father's Name</span>
                    </div>
                    <input type="text" id="fatherName" name="fatherName" maxlength="100" placeholder="Joseph Dela Cruz"
                        title="Format: FirstName LastName" class="input input-bordered w-full w-lg"
                        pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Father's Birth Place</span>
                    </div>
                    <input type="text" id="fatherPob" name="fatherPob" maxlength="120" placeholder="Taguig City"
                        class="input input-bordered w-full w-lg" required />
                </div>
            </div>
            <div class="grid grid-cols-2 gap-x-8">
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Mother's Name</span>
                    </div>
                    <input type="text" id="motherName" name="motherName" maxlength="100" placeholder="Joseph Dela Cruz"
                        title="Format: FirstName LastName" class="input input-bordered w-full w-lg"
                        pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Mother's Birth Place</span>
                    </div>
                    <input type="text" id="motherPob" name="motherPob" maxlength="120" placeholder="Taguig City"
                        class="input input-bordered w-full w-lg" required />
                </div>
            </div>
            <div class="grid grid-cols-2 gap-x-8">
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Parent/Guardian's Contact Number</span>
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
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Parents' Type of Marriage</span>
                    </div>
                    <select id="marriage_type" name="marriage_type" class="select select-bordered">
                        <option value="default" disabled selected hidden></option>
                        <option value="Catholic Marriage"
                            title="Catholic Marriage = married in church and officiated by a priest">Catholic
                            Marriage</option>
                        <option value="Civil Marriage"
                            title="Civil Marriage = married in court and officiated by a lawyer">Civil Marriage
                        </option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-x-8">
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Godfather's Name</span>
                    </div>
                    <input type="text" id="godfatherName" name="godfatherName" placeholder="Francis Dela Cruz"
                        title="Format: FirstName LastName" maxlength="100" class="input input-bordered w-full w-lg"
                        pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Godfather's Address</span>
                    </div>
                    <input type="text" id="godfatherAddress" name="godfatherAddress" placeholder="Taguig City"
                        maxlength="120" class="input input-bordered w-full w-lg" required />
                </div>
            </div>
            <div class="grid grid-cols-2 gap-x-8">
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Godmother's Name</span>
                    </div>
                    <input type="text" id="godmotherName" name="godmotherName" placeholder="Teresa Tomas"
                        title="Format: FirstName LastName" maxlength="100" class="input input-bordered w-full w-lg"
                        pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Godfather's Address</span>
                    </div>
                    <input type="text" id="godmotherAddress" name="godmotherAddress" placeholder="Makati City"
                        maxlength="120" class="input input-bordered w-full w-lg" required />
                </div>
            </div>
            <div>
                <h2>Soft Copy of Requirements</h2>
            </div>
            <!-- <div class="grid grid-cols-2 gap-x-8">
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Child's PSA Birth Certificate</span>
                    </div>
                    <input type="file" id="psa" name="psa" accept="image/*" onchange="validateFileType(this.id)"
                        class="file-input file-input-bordered w-full max-w-xs bg-white" required />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Marriage Contract of Parents</span>
                    </div>
                    <input type="file" id="marriage_contract" name="marriage_contract" accept="image/*"
                        onchange="validateFileType(this.id)"
                        class="file-input file-input-bordered w-full max-w-xs bg-white" required />
                </div>
            </div> -->
        </div>
    </div>
    <div class="p-8 flex justify-evenly">
        <label for="modal_clear" class="btn btn-error btn-wide btn-outline">Clear</label>
        <label for="modal_submit" class="btn btn-success btn-wide text-white">Submit</label>
    </div>
</div>