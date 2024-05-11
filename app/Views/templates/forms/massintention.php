<div class="w-3/4 flex flex-col m-auto py-8">
    <div>
        <?= form_open('reserve/back') ?>
        <button type="submit" class=" btn btn-error btn-outline" name="submit"
            value="Back"><idata-lucide="chevron-left"></i> Back</button>
        <?= form_close() ?>
    </div>
    <div class="w-11/12 m-auto p-8">
        <b>Notes:</b>
        <ul class=" list-disc columns-2 gap-4">
            <li>Mass Intention Fee: Donation</li>
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
    <?= form_open('reserve/massintention') ?>
    <div class="bg-zinc-300">
        <div class="p-8">
            <div>
                <div class="grid grid-cols-2 gap-x-4">
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
                    <div>
                        <span class="label-text">Purpose:</span>
                        <div class="flex flex-col px-8">
                            <label class="cursor-pointer">
                                <input type="radio" id="thanksgiving" name="mass" value="Thanksgiving" required />
                                <span class="label-text">Thanksgiving</span>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" id="healing" name="mass" value="Healing/Recovery" required />
                                <span class="label-text">Healing/Recovery</span>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" id="special" name="mass" value="Special Intention" required />
                                <span class="label-text">Special Intention</span>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" id="soul" name="mass" value="Soul" required />
                                <span class="label-text">Soul</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="form-control">
                        <div class="label">
                            <span class="label-text">Name/s:</span>
                        </div>
                        <textarea placeholder="name/s" name="names"
                            class="textarea textarea-bordered textarea-md w-full"></textarea>
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