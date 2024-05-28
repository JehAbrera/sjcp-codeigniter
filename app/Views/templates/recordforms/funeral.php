<div class=" w-full grid grid-cols-2 gap-1">
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Funeral Mass Date</label>
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
        <label class=" label-text-alt" for="">Date of Death</label>
        <input type="date" name="dDate" id="" <?= !empty(set_value('dDate', $dDate)) ? 'value="' . esc(set_value('dDate', date('Y-m-d', strtotime($dDate)))) . '"' : '' ?> class=" input input-bordered">
    </div>
</div>
<div class=" w-full grid grid-cols-2 gap-1">
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Cause of Death</label>
        <input type="text" name="dCause" id="" value="<?= set_value('dCause', $dCause) ?>" class=" input input-bordered">
    </div>
    <div class=" form-control">
        <label class=" label-text-alt" for="">Interment Date</label>
        <input type="date" name="intDate" id="" <?= !empty(set_value('intDate', $intDate)) ? 'value="' . esc(set_value('intDate', date('Y-m-d', strtotime($intDate)))) . '"' : '' ?> class=" input input-bordered">
    </div>
</div>
<div class=" w-full form-control">
    <label class=" label-text-alt" for="">Cemetery</label>
    <input type="text" name="cem" id="" value="<?= set_value('cem', $cem) ?>" class=" input input-bordered">
</div>
<label for="">Informant's Information</label>
<div class=" w-full grid grid-cols-3 gap-1">
    <div class=" form-control">
        <label class=" label-text-alt" for=""> First Name</label>
        <input type="text" name="infFn" id="" value="<?= set_value('infFn', $infFn) ?>" class=" input input-bordered" />
    </div>
    <div class=" form-control">
        <label class=" label-text-alt" for="">Middle Name</label>
        <input type="text" name="infMn" id="" value="<?= set_value('infMn', $infMn) ?>" class=" input input-bordered" />
    </div>
    <div class=" form-control">
        <label class=" label-text-alt" for="">Last Name</label>
        <input type="text" name="infLn" id="" value="<?= set_value('infLn', $infLn) ?>" class=" input input-bordered" />
    </div>
</div>
<div class=" w-full form-control">
    <label class=" label-text-alt" for="">Informant's Contact Number</label>
    <div class="join w-full">
        <label for="" class=" join-item btn btn-disabled">+63</label>
        <input type="text" name="num" id="" value="<?= set_value('num', trim($num, '+63')) ?>" class=" input input-bordered w-full join-item">
    </div>
</div>
<div class=" w-full form-control">
    <label class=" label-text-alt" for="">Informant's Address</label>
    <input type="text" name="addr" id="" value="<?= set_value('addr', $addr) ?>" class=" input input-bordered">
</div>
<div class=" w-full grid grid-cols-2 gap-1">
    <div class=" form-control">
        <label class=" label-text-alt" for="">Sacrament Received</label>
        <div class="flex justify-between items-center h-full px-8">
            <label class="cursor-pointer">
                <input type="radio" id="genderMale" name="sacr" value="Yes" <?= $sacr == 'Yes' ? 'checked' : '' ?> required />
                <span class="label-text">Yes</span>
            </label>
            <label class="cursor-pointer">
                <input type="radio" id="genderFemale" name="sacr" value="No" <?= $sacr == 'No' ? 'checked' : '' ?> required />
                <span class="label-text">No</span>
            </label>
        </div>
    </div>
    <div class=" form-control">
        <label class=" label-text-alt" for="">Burial Type</label>
        <div class="flex justify-between items-center h-full px-8">
            <label class="cursor-pointer">
                <input type="radio" id="genderMale" name="burial" value="Casket" <?= $burial == 'Casket' ? 'checked' : '' ?> required />
                <span class="label-text">Casket</span>
            </label>
            <label class="cursor-pointer">
                <input type="radio" id="genderFemale" name="burial" value="Urn" <?= $burial == 'Urn' ? 'checked' : '' ?> required />
                <span class="label-text">Urn</span>
            </label>
        </div>
    </div>
</div>