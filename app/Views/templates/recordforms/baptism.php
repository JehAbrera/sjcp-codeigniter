<div class=" w-full grid grid-cols-2 gap-1">
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Baptism Date</label>
        <input type="date" name="bapD" <?= !empty(set_value('bapD', $date)) ? 'value="' . esc(set_value('bapD', date('Y-m-d', strtotime($date)))) . '"' : '' ?> id="" class=" input input-bordered">
    </div>
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Time</label>
        <input type="time" name="bapT" <?= !empty(set_value('bapT', $time)) ? 'value="' . esc(set_value('bapT', date('H:i', strtotime($time)))) . '"' : '' ?> id="" class=" input input-bordered">
    </div>
</div>
<label for="">Participant's Name</label>
<div class=" w-full grid grid-cols-3 gap-1">
    <div class=" form-control">
        <label class=" label-text-alt" for="">First Name</label>
        <input type="text" name="fn" id="" value="<?= set_value('fn', $fn) ?>" class=" input input-bordered" />
    </div>
    <div class=" form-control">
        <label class=" label-text-alt" for="">Middle Name</label>
        <input type="text" name="mn" id="" value="<?= set_value('mn', $mn) ?>" class=" input input-bordered" />
    </div>
    <div class=" form-control">
        <label class=" label-text-alt" for="">Last Name</label>
        <input type="text" name="ln" id="" value="<?= set_value('ln', $ln) ?>" class=" input input-bordered" />
    </div>
</div>
<div class=" w-full grid grid-cols-2 gap-1">
    <div class=" form-control">
        <label class=" label-text-alt" for="">Gender</label>
        <div class="flex justify-between items-center h-full px-8">
            <label class="cursor-pointer">
                <input type="radio" id="genderMale" name="gender" value="Male" <?= $gender == 'Male' ? 'checked' : '' ?> required />
                <span class="label-text">Male</span>
            </label>
            <label class="cursor-pointer">
                <input type="radio" id="genderFemale" name="gender" value="Female" <?= $gender == 'Female' ? 'checked' : '' ?> required />
                <span class="label-text">Female</span>
            </label>
        </div>
    </div>
    <div class=" form-control">
        <label class=" label-text-alt" for="">Birthdate</label>
        <input type="date" name="bday" id="" <?= !empty(set_value('bday', $dob)) ? 'value="' . esc(set_value('bday', date('Y-m-d', strtotime($dob)))) . '"' : '' ?> class=" input input-bordered">
    </div>
</div>
<div class=" w-full form-control">
    <label class=" label-text-alt" for="">Place of Birth</label>
    <input type="text" name="pob" id="" value="<?= set_value('pob', $pob) ?>" class=" input input-bordered">
</div>
<div class=" w-full form-control">
    <label class=" label-text-alt" for="">Present Address</label>
    <input type="text" name="addr" id="" value="<?= set_value('addr', $addr) ?>" class=" input input-bordered">
</div>
<div class=" w-full grid grid-cols-2 gap-1">
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Father's Name</label>
        <input type="text" name="fatN" id="" value="<?= set_value('fatN', $fatN) ?>" class=" input input-bordered">
    </div>
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Father's Birthplace</label>
        <input type="text" name="fatPob" id="" value="<?= set_value('fatPob', $fatPob) ?>" class=" input input-bordered">
    </div>
</div>
<div class=" w-full grid grid-cols-2 gap-1">
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Mother's Name</label>
        <input type="text" name="motN" id="" value="<?= set_value('motN', $motN) ?>" class=" input input-bordered">
    </div>
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Mother's Birthplace</label>
        <input type="text" name="motPob" id="" value="<?= set_value('motPob', $motPob) ?>" class=" input input-bordered">
    </div>
</div>
<div class=" w-full grid grid-cols-2 gap-1">
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Parent/Guardian's Contact Number</label>
        <div class="join w-full">
            <label for="" class=" join-item btn btn-disabled">+63</label>
            <input type="text" name="num" id="" value="<?= set_value('num', $num) ?>" class=" input input-bordered w-full join-item">
        </div>
    </div>
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Parent's Type of Marriage</label>
        <select id="marriage_type" name="mtype" class="select select-bordered">
            <option value="" disabled <?= $mrgTp == '' ? 'selected' : '' ?> hidden>Marriage Type</option>
            <option value="Catholic Marriage" title="Catholic Marriage = married in church and officiated by a priest"
            <?= $mrgTp == 'Catholic Marriage' ? 'selected' : '' ?> >Catholic Marriage</option>
            <option value="Civil Marriage" title="Civil Marriage = married in court and officiated by a lawyer"
            <?= $mrgTp == 'Civil Marriage' ? 'selected' : '' ?>>Civil Marriage</option>
        </select>
    </div>
</div>
<div class=" w-full grid grid-cols-2 gap-1">
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Godfather's Name</label>
        <input type="text" name="gfN" id="" value="<?= set_value('gfN', $gFatN) ?>" class=" input input-bordered">
    </div>
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Godfather's Address</label>
        <input type="text" name="gfAdd" id="" value="<?= set_value('gfAdd', $gFatAd) ?>" class=" input input-bordered">
    </div>
</div>
<div class=" w-full grid grid-cols-2 gap-1">
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Godmother's Name</label>
        <input type="text" name="gmN" id="" value="<?= set_value('gmN', $gMotN) ?>" class=" input input-bordered">
    </div>
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Godmother's Address</label>
        <input type="text" name="gmAdd" id="" value="<?= set_value('gmAdd', $gMotAd) ?>" class=" input input-bordered">
    </div>
</div>