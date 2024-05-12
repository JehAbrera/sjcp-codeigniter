<div class="w-3/4 flex flex-col m-auto py-8">
    <div>
        <?= form_open('reserve/back') ?>
        <button type="submit" class=" btn btn-error btn-outline" name="submit"
            value="Back"><idata-lucide="chevron-left"></i> Back</button>
        <?= form_close() ?>
    </div>
    <div class="w-11/12 m-auto p-8">
        <b>Notes:</b>
        <ul class=" list-disc gap-4">
            <li>Since blessings are based on the priest's schedule, the church will contact you on the final time of
                your blessing</li>
            <li>If scheduling a Car or Motorcycle Blessing, please bring your vehicle to the church at the agreed upon
                time</li>
            <li>Blessing Fee: Donation</li>
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
    <?= form_open('reserve/blessing') ?>
    <div class="bg-zinc-300">
        <div class="p-8">
            <div>
                <div class="grid grid-cols-3 gap-x-4">
                    <div class="form-control">
                        <div class="label">
                            <span class="label-text">Contact Number</span>
                        </div>
                        <div class="join">
                            <input type="text" name="mobile1" value="+63" id=""
                                class="input input-bordered join-item w-1/4" disabled>
                            <input type="tel" id="contactNum" name="contactNum" maxlength="10"
                                onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
                                placeholder="9123456789" pattern="[9]{1}[0-9]{9}" class="input join-item rounded-sm"
                                required><br>
                        </div>
                    </div>
                </div>
                <br>
                <div>
                    <div>
                        <span class="label-text">Purpose:</span>
                        <div class="flex px-8 justify-between">
                            <label class="cursor-pointer">
                                <input type="radio" id="house" name="bless" value="House Blessing" accept="" required />
                                <span class="label-text">House Blessing</span>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" id="car" name="bless" value="Car Blessing" required />
                                <span class="label-text">Car Blessing</span>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" id="store" name="bless" value="Store Blessing" required />
                                <span class="label-text">Store Blessing</span>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" id="motor" name="bless" value="Motorcycle Blessing" required />
                                <span class="label-text">Motorcycle Blessing</span>
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <div>
                    <div class="form-control">
                        <div class="label">
                            <span class="label-text">House Address / Location: </span>
                        </div>
                        <input type="text" id="address" name="address"
                            placeholder="House No. / Street / Barangay / Municipality"
                            class="input input-bordered w-full" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="m-auto p-8">
        <button class="btn btn-error btn-outline"> Clear</button>
        <button class="btn btn-success text-white"> Submit</button>
    </div>
    <?= form_close() ?>
</div>