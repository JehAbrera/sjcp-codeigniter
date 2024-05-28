<div class=" w-full grid grid-cols-2 gap-1">
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Confirmation Date</label>
        <input type="date" name="date" <?= !empty(set_value('date', $date)) ? 'value="' . esc(set_value('date', date('Y-m-d', strtotime($date)))) . '"' : '' ?> id="" class=" input input-bordered">
    </div>
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Time</label>
        <input type="time" name="time" <?= !empty(set_value('time', $time)) ? 'value="' . esc(set_value('time', date('H:i', strtotime($time)))) . '"' : '' ?> id="" class=" input input-bordered">
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
<div class=" w-full grid grid-cols-2 gap-1">
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Place of Baptism</label>
        <input type="text" name="plcBap" id="" value="<?= set_value('plcBap', $plcBap) ?>" class=" input input-bordered">
    </div>
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Date of Baptism</label>
        <input type="date" name="datBap" <?= !empty(set_value('datBap', $datBap)) ? 'value="' . esc(set_value('datBap', date('Y-m-d', strtotime($datBap)))) . '"' : '' ?> id="" class=" input input-bordered">
    </div>
</div>
<div class=" w-full grid grid-cols-2 gap-1">
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Father's Name</label>
        <input type="text" name="fatN" id="" value="<?= set_value('fatN', $fatN) ?>" class=" input input-bordered">
    </div>
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Mother's Name</label>
        <input type="text" name="motN" id="" value="<?= set_value('motN', $motN) ?>" class=" input input-bordered">
    </div>
</div>
<div class=" w-full form-control">
    <label class=" label-text-alt" for="">Parent/Guardian's Contact Number</label>
    <div class="join w-full">
        <label for="" class=" join-item btn btn-disabled">+63</label>
        <input type="text" name="num" id="" value="<?= set_value('num', trim($num, '+63')) ?>" class=" input input-bordered w-full join-item">
    </div>
</div>
<div class=" w-full form-control">
    <label class=" label-text-alt" for="">Present Address</label>
    <input type="text" name="addr" id="" value="<?= set_value('addr', $addr) ?>" class=" input input-bordered">
</div>
<div class=" w-full grid grid-cols-2 gap-1">
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Godfather's Name</label>
        <input type="text" name="gfN" id="" value="<?= set_value('gfN', $gFatN) ?>" class=" input input-bordered">
    </div>
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Godmother's Name</label>
        <input type="text" name="gmN" id="" value="<?= set_value('gmN', $gMotN) ?>" class=" input input-bordered">
    </div>
</div>