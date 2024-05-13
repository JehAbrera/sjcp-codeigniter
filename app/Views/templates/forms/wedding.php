<div class="w-3/4 flex flex-col m-auto py-8">
    <div>
        <?= form_open('reserve/back') ?>
        <button type="submit" class=" btn btn-error btn-outline" name="submit"
            value="Back"><idata-lucide="chevron-left"></i> Back</button>
        <?= form_close() ?>
    </div>
    <div class="w-11/12 m-auto p-8">
        <b>Requirements</b>
        <br>
        <ul class=" list-disc columns-2 gap-4">
            <li>Birth Certificate & 2x2 ID picture</li>
            <li>Baptismal Certificate (Original copy)</li>
            <li>Confirmation Certificate (original copy)</li>
            <li>Long Brown Envelope</li>
            <li>Publication of wedding banns</li>
            <li>Confession</li>
            <li>Wedding Interview</li>
            <li>Marriage License or Live-In Liscense (article 34)</li>
            <li>Cenomar (Certificate of No Marriage - photocopy)</li>
            <li>Pre- Cana Seminar</li>
            <li>Marriage contract (Civil Marriage)</li>
        </ul>
        <br>
        <b>Notes:</b>
        <br>
        <ul class=" list-disc grid-cols-2 gap-4">
            <li>The couple must submit and accomplish all the requirements before the date of the event</li>
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
    <?= form_open('reserve/wedding') ?>
    <div class="bg-zinc-300">
        <div class="p-8">
            <div class="">
                <b>Groom's Information</b>
            </div>
            <b>Name</b>
            <div class="grid grid-cols-3 gap-x-4">
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Last name:</span>
                    </div>
                    <input type="text" id="groomln" name="groomln" placeholder="Dela Cruz"
                        class="input input-bordered w-full max-w-sm" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">First name:</span>
                    </div>
                    <input type="text" id="groomfn" name="groomfn" placeholder="Juan"
                        class="input input-bordered w-full max-w-sm" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Middle name:</span>
                    </div>
                    <input type="text" id="groommn" name="groommn" placeholder="Tomas"
                        class="input input-bordered w-full max-w-sm" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Contact Number</span>
                    </div>
                    <div class="join">
                        <input type="text" name="mobile1" value="+63" id="" class="input input-bordered join-item w-1/4"
                            disabled>
                        <input type="tel" id="groomcontactNum" name="groomcontactNum" maxlength="10"
                            onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
                            placeholder="9123456789" pattern="[9]{1}[0-9]{9}" class="input join-item rounded-sm"
                            required><br>
                    </div>
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Birth Date</span>
                    </div>
                    <input type="date" id="groomdob" name="groomdob"
                        min="<?= date('Y-m-d', strtotime('-100 years')); ?>"
                        max="<?= date('Y-m-d', strtotime('-1 month')); ?>" class="input input-bordered w-full max-w-sm"
                        required />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Birth place</span>
                    </div>
                    <input type="text" id="groompob" name="groompob" maxlength="120" placeholder="Taguig City"
                        class="input input-bordered w-full max-w-sm" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                </div>
            </div>
            <div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Present Address</span>
                    </div>
                    <input type="text" id="groomaddress" name="groomaddress" maxlength="120"
                        placeholder="9 Sampaguita St., Brgy. Pembo, Taguig City"
                        class="input input-bordered w-full w-lg" required />
                </div>
            </div>
            <div class="grid grid-cols-3 gap-x-8">
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Father's Name</span>
                    </div>
                    <input type="text" id="groomfathern" name="groomfathern" maxlength="100"
                        placeholder="Joseph Dela Cruz" title="Format: FirstName LastName"
                        class="input input-bordered w-full w-lg" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Mother's Maiden Name</span>
                    </div>
                    <input type="text" id="groommothern" name="groommothern" maxlength="100"
                        placeholder="Joseph Dela Cruz" title="Format: FirstName LastName"
                        class="input input-bordered w-full w-lg" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Religion</span>
                    </div>
                    <input type="text" id="groomrelig" name="groomrelig" maxlength="120" placeholder="Catholic"
                        class="input input-bordered w-full w-lg" required />
                </div>
            </div>
            <br>
            <div>
                <h2>Soft Copy of Requirements</h2>
            </div>
            <!-- <div class="grid grid-cols-3 gap-x-8">
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">2x2 ID Picture</span>
                    </div>
                    <input type="file" id="groompid" name="groomid" accept="image/*"
                        onchange="validateFileType(this.id)"
                        class="file-input file-input-bordered w-full max-w-xs bg-white" />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">PSA Birth Certificate</span>
                    </div>
                    <input type="file" id="groompsa" name="groompsa" accept="image/*"
                        onchange="validateFileType(this.id)"
                        class="file-input file-input-bordered w-full max-w-xs bg-white" />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Cenomar(Certificate of No Marriage)</span>
                    </div>
                    <input type="file" id="groomcenomar" name="groomcenomar" accept="image/*"
                        onchange="validateFileType(this.id)"
                        class="file-input file-input-bordered w-full max-w-xs bg-white" />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Baptismal Certificate</span>
                    </div>
                    <input type="file" id="groombapcert" name="groombapcert" accept="image/*"
                        onchange="validateFileType(this.id)"
                        class="file-input file-input-bordered w-full max-w-xs bg-white" />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Confirmation Certificate</span>
                    </div>
                    <input type="file" id="groomconcert" name="groomconcert" accept="image/*"
                        onchange="validateFileType(this.id)"
                        class="file-input file-input-bordered w-full max-w-xs bg-white" />
                </div>
            </div> -->
            <br>
            <br>
            <div class="">
                <b>Bride's Information</b>
            </div>
            <b>Name</b>
            <div class="grid grid-cols-3 gap-x-4">
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Last name:</span>
                    </div>
                    <input type="text" id="brideln" name="brideln" placeholder="Dela Cruz"
                        class="input input-bordered w-full max-w-sm" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">First name:</span>
                    </div>
                    <input type="text" id="bridefn" name="bridefn" placeholder="Juan"
                        class="input input-bordered w-full max-w-sm" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Middle name:</span>
                    </div>
                    <input type="text" id="bridemn" name="bridemn" placeholder="Tomas"
                        class="input input-bordered w-full max-w-sm" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Contact Number</span>
                    </div>
                    <div class="join">
                        <input type="text" name="mobile1" value="+63" id="" class="input input-bordered join-item w-1/4"
                            disabled>
                        <input type="tel" id="bridecontactNum" name="bridecontactNum" maxlength="10"
                            onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
                            placeholder="9123456789" pattern="[9]{1}[0-9]{9}" class="input join-item rounded-sm"
                            required><br>
                    </div>
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Birth Date</span>
                    </div>
                    <input type="date" id="bridedob" name="bridedob"
                        min="<?= date('Y-m-d', strtotime('-100 years')); ?>"
                        max="<?= date('Y-m-d', strtotime('-1 month')); ?>" class="input input-bordered w-full max-w-sm"
                        required />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Birth place</span>
                    </div>
                    <input type="text" id="bridepob" name="bridepob" maxlength="120" placeholder="Taguig City"
                        class="input input-bordered w-full max-w-sm" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                </div>
            </div>
            <div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Present Address</span>
                    </div>
                    <input type="text" id="brideaddress" name="brideaddress" maxlength="120"
                        placeholder="9 Sampaguita St., Brgy. Pembo, Taguig City"
                        class="input input-bordered w-full w-lg" required />
                </div>
            </div>
            <div class="grid grid-cols-3 gap-x-8">
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Father's Name</span>
                    </div>
                    <input type="text" id="bridefathern" name="bridefathern" maxlength="100"
                        placeholder="Joseph Dela Cruz" title="Format: FirstName LastName"
                        class="input input-bordered w-full w-lg" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Mother's Maiden Name</span>
                    </div>
                    <input type="text" id="bridemothern" name="bridemothern" maxlength="100"
                        placeholder="Joseph Dela Cruz" title="Format: FirstName LastName"
                        class="input input-bordered w-full w-lg" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Religion</span>
                    </div>
                    <input type="text" id="briderelig" name="briderelig" maxlength="120" placeholder="Catholic"
                        class="input input-bordered w-full w-lg" required />
                </div>
            </div>
            <br>
            <div>
                <h2>Soft Copy of Requirements</h2>
            </div>
            <!-- <div class="grid grid-cols-3 gap-x-8">
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">2x2 ID Picture</span>
                    </div>
                    <input type="file" id="bridepid" name="brideid" accept="image/*"
                        onchange="validateFileType(this.id)"
                        class="file-input file-input-bordered w-full max-w-xs bg-white" />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">PSA Birth Certificate</span>
                    </div>
                    <input type="file" id="bridepsa" name="bridepsa" accept="image/*"
                        onchange="validateFileType(this.id)"
                        class="file-input file-input-bordered w-full max-w-xs bg-white" />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Cenomar(Certificate of No Marriage)</span>
                    </div>
                    <input type="file" id="bridecenomar" name="bridecenomar" accept="image/*"
                        onchange="validateFileType(this.id)"
                        class="file-input file-input-bordered w-full max-w-xs bg-white" />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Baptismal Certificate</span>
                    </div>
                    <input type="file" id="bridebapcert" name="bridebapcert" accept="image/*"
                        onchange="validateFileType(this.id)"
                        class="file-input file-input-bordered w-full max-w-xs bg-white" />
                </div>
                <div class="form-control">
                    <div class="label">
                        <span class="label-text">Confirmation Certificate</span>
                    </div>
                    <input type="file" id="brideconcert" name="brideconcert" accept="image/*"
                        onchange="validateFileType(this.id)"
                        class="file-input file-input-bordered w-full max-w-xs bg-white" />
                </div>
            </div> -->
            <br>
            <br>
            <div class="">
                <b>For couple</b>
            </div>
            <div>
                <div class="form-control">
                    <!-- <div class="label">
                        <span class="label-text">Marriage License or Live-In License (Article 34) or Marriage Contract
                            (Civil Marriage)*</span>
                    </div>
                    <input type="file" id="marriagel" name="marriagel" accept="image/*"
                        onchange="validateFileType(this.id)"
                        class="file-input file-input-bordered w-full max-w-xs bg-white" /> -->
                </div>
            </div>
        </div>
    </div>
    <div class="p-8 flex justify-evenly">
        <label for="modal_clear" class="btn btn-error btn-wide btn-outline">Clear</label>
        <label for="modal_submit" class="btn btn-success btn-wide text-white">Submit</label>
    </div>
</div>