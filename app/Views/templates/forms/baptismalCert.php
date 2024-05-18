<div class="w-3/4 flex flex-col m-auto py-8">
    <div>
        <?= form_open('reserve/back') ?>
        <button type="submit" class=" btn btn-error btn-outline" name="submit"
            value="Back"><idata-lucide="chevron-left"></i> Back</button>
        <?= form_close() ?>
    </div>
    <div class="w-11/12 m-auto p-8">
        <b>Requirements</b>
        <ul class=" list-disc gap-4">
            <li>Birth Certificate</li>
            <li>Php 100.00</li>
        </ul>
        <br>
        <b>Notes:</b>
        <ul class=" list-disc gap-4">
            <li>Another person may claim your document as long as they have a copy of your valid ID and an authorization
                letter</li>
            <li>The document must be claimed during office hours within the scheduled date</li>
            <li>Office hours: <br> Tuesday-Saturday: 8:00 - 11:30 AM || 1:30 - 5:00 PM <br> Sunday: 8:00 - 12:00 NN</li>
        </ul>
        <br>
        <div>
            <?php
            $event = session()->get('event');
            $date = date_format(date_create(session()->get('date')), 'F j, Y');
            ?>
            <b>Event: </b> <?= $event ?> <br>
            <b>Date: </b> <?= $date ?> <br>
        </div>
    </div>
    <?= form_open_multipart('reserve/docureq') ?>
    <div class="bg-zinc-300">
        <div class="p-8">
            <div class="">
                <b>Child's information</b>
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
            <div class="grid grid-cols-2 gap-x-4">
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Date of Birth</span>
                    </div>
                    <input type="date" id="dob" name="dob" min="<?= date('Y-m-d', strtotime('-100 years')); ?>"
                        max="<?= date('Y-m-d', strtotime('-1 month')); ?>" class="input input-bordered w-full max-w-sm"
                        required />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Contact Number</span>
                    </div>
                    <div class="join">
                        <input type="text" name="mobile1" class="input input-bordered join-item w-1/4" disabled>
                        <input type="tel" id="contactNum" name="contactNum" maxlength="10"
                            onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
                            placeholder="9123456789" pattern="[9]{1}[0-9]{9}" class="input join-item rounded-sm"
                            required><br>
                    </div>
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Father's Name</span>
                    </div>
                    <input type="text" id="fatherName" name="fatherName" placeholder="Joseph Dela Cruz"
                        title="Format: FirstName LastName" class="input input-bordered w-full max-w-sm"
                        pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Mother's Name</span>
                    </div>
                    <input type="text" id="motherName" name="motherName" placeholder="Joseph Dela Cruz"
                        title="Format: FirstName LastName" class="input input-bordered w-full max-w-sm"
                        pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                </div>
            </div>
            <div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Purpose:</span>
                    </div>
                    <input type="text" id="purp" name="purp" placeholder="Requirementd for Wedding" class="input input-bordered w-full"
                        pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                </div>
            </div>
            <br>
            <br>
            <div class="gap-x-8">
                <div>
                    <h2>Soft Copy of Requirements</h2>
                </div>
                <div class="grid grid-cols-2 gap-x-8">
                    <div class="form-control">
                        <div class="label">
                            <span class="label-text">Child's PSA Birth Certificate</span>
                        </div>
                        <input type="file" id="psa" name="psa" accept="image/*"
                            class="file-input file-input-bordered w-full max-w-xs bg-white" required />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-8 flex justify-evenly">
        <label for="modal_clear" class="btn btn-error btn-wide btn-outline">Clear</label>
        <label for="modal_submit" class="btn btn-success btn-wide text-white">Submit</label>
    </div>
</div>