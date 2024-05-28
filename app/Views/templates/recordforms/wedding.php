<div class=" w-full grid grid-cols-2 gap-1">
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Wedding Date</label>
        <input type="date" name="date" <?= !empty(set_value('date', $date)) ? 'value="' . esc(set_value('date', date('Y-m-d', strtotime($date)))) . '"' : '' ?> id="" class=" input input-bordered">
    </div>
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Time</label>
        <input type="time" name="time" <?= !empty(set_value('time', $time)) ? 'value="' . esc(set_value('time', date('H:i', strtotime($time)))) . '"' : '' ?> id="" class=" input input-bordered">
    </div>
</div>
<label for="">Groom's Information</label>
<div class=" w-full grid grid-cols-3 gap-1">
    <div class=" form-control">
        <label class=" label-text-alt" for="">First Name</label>
        <input type="text" name="gFn" id="" value="<?= set_value('gFn', $gFn) ?>" class=" input input-bordered" />
    </div>
    <div class=" form-control">
        <label class=" label-text-alt" for="">Middle Name</label>
        <input type="text" name="gMn" id="" value="<?= set_value('gMn', $gMn) ?>" class=" input input-bordered" />
    </div>
    <div class=" form-control">
        <label class=" label-text-alt" for="">Last Name</label>
        <input type="text" name="gLn" id="" value="<?= set_value('gLn', $gLn) ?>" class=" input input-bordered" />
    </div>
</div>
<div class=" w-full grid grid-cols-2 gap-1">
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Contact Number</label>
        <div class="join w-full">
            <label for="" class=" join-item btn btn-disabled">+63</label>
            <input type="text" name="gNum" id="" value="<?= set_value('gNum', trim($gNum, '+63')) ?>" class=" input input-bordered w-full join-item">
        </div>
    </div>
    <div class=" form-control">
        <label class=" label-text-alt" for="">Birthdate</label>
        <input type="date" name="gDob" id="" <?= !empty(set_value('gDob', $gDob)) ? 'value="' . esc(set_value('gDob', date('Y-m-d', strtotime($gDob)))) . '"' : '' ?> class=" input input-bordered">
    </div>
</div>
<div class=" w-full form-control">
    <label class=" label-text-alt" for="">Place of Birth</label>
    <input type="text" name="gPob" id="" value="<?= set_value('gPob', $gPob) ?>" class=" input input-bordered">
</div>
<div class=" w-full form-control">
    <label class=" label-text-alt" for="">Present Address</label>
    <input type="text" name="gAddr" id="" value="<?= set_value('gAddr', $gAddr) ?>" class=" input input-bordered">
</div>
<div class=" w-full grid grid-cols-2 gap-1">
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Father's Name</label>
        <input type="text" name="gFat" id="" value="<?= set_value('gFat', $gFat) ?>" class=" input input-bordered">
    </div>
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Mother's Name</label>
        <input type="text" name="gMot" id="" value="<?= set_value('gMot', $gMot) ?>" class=" input input-bordered">
    </div>
</div>
<div class=" w-full form-control">
    <label class=" label-text-alt" for="">Religion</label>
    <select name="gRel" id="" class=" select select-bordered">
        <option value="" disabled hidden
        <?= $gRel == '' ? 'selected' : '' ?>>Select Religion</option>
        <option value="Catholic"
        <?= $gRel == 'Catholic' ? 'selected' : '' ?>>Catholic</option>
        <option value="Protestant"
        <?= $gRel == 'Protestant' ? 'selected' : '' ?>>Protestant</option>
        <option value="Iglesia ni Cristo"
        <?= $gRel == 'Iglesia ni Cristo' ? 'selected' : '' ?>>Iglesia ni Cristo</option>
        <option value="Jehovas Witness"
        <?= $gRel == 'Jehovas Witness' ? 'selected' : '' ?>>Jehova's Witness</option>
        <option value="Seventh Day Adventist"
        <?= $gRel == 'Seventh Day Adventist' ? 'selected' : '' ?>>Seventh Day Adventist</option>
    </select>
</div>
<label for="">Bride's Information</label>
<div class=" w-full grid grid-cols-3 gap-1">
    <div class=" form-control">
        <label class=" label-text-alt" for="">First Name</label>
        <input type="text" name="bFn" id="" value="<?= set_value('bFn', $bFn) ?>" class=" input input-bordered" />
    </div>
    <div class=" form-control">
        <label class=" label-text-alt" for="">Middle Name</label>
        <input type="text" name="bMn" id="" value="<?= set_value('bMn', $bMn) ?>" class=" input input-bordered" />
    </div>
    <div class=" form-control">
        <label class=" label-text-alt" for="">Last Name</label>
        <input type="text" name="bLn" id="" value="<?= set_value('bLn', $bLn) ?>" class=" input input-bordered" />
    </div>
</div>
<div class=" w-full grid grid-cols-2 gap-1">
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Contact Number</label>
        <div class="join w-full">
            <label for="" class=" join-item btn btn-disabled">+63</label>
            <input type="text" name="bNum" id="" value="<?= set_value('bNum', trim($bNum, '+63')) ?>" class=" input input-bordered w-full join-item">
        </div>
    </div>
    <div class=" form-control">
        <label class=" label-text-alt" for="">Birthdate</label>
        <input type="date" name="bDob" id="" <?= !empty(set_value('bDob', $bDob)) ? 'value="' . esc(set_value('bDob', date('Y-m-d', strtotime($bDob)))) . '"' : '' ?> class=" input input-bordered">
    </div>
</div>
<div class=" w-full form-control">
    <label class=" label-text-alt" for="">Place of Birth</label>
    <input type="text" name="bPob" id="" value="<?= set_value('bPob', $bPob) ?>" class=" input input-bordered">
</div>
<div class=" w-full form-control">
    <label class=" label-text-alt" for="">Present Address</label>
    <input type="text" name="bAddr" id="" value="<?= set_value('bAddr', $bAddr) ?>" class=" input input-bordered">
</div>
<div class=" w-full grid grid-cols-2 gap-1">
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Father's Name</label>
        <input type="text" name="bFat" id="" value="<?= set_value('bFat', $bFat) ?>" class=" input input-bordered">
    </div>
    <div class=" w-full form-control">
        <label class=" label-text-alt" for="">Mother's Name</label>
        <input type="text" name="bMot" id="" value="<?= set_value('bMot', $bMot) ?>" class=" input input-bordered">
    </div>
</div>
<div class=" w-full form-control">
    <label class=" label-text-alt" for="">Religion</label>
    <select name="bRel" id="" class=" select select-bordered">
        <option value="" disabled hidden
        <?= $bRel == '' ? 'selected' : '' ?>>Select Religion</option>
        <option value="Catholic"
        <?= $bRel == 'Catholic' ? 'selected' : '' ?>>Catholic</option>
        <option value="Protestant"
        <?= $bRel == 'Protestant' ? 'selected' : '' ?>>Protestant</option>
        <option value="Iglesia ni Cristo"
        <?= $bRel == 'Iglesia ni Cristo' ? 'selected' : '' ?>>Iglesia ni Cristo</option>
        <option value="Jehovas Witness"
        <?= $bRel == 'Jehovas Witness' ? 'selected' : '' ?>>Jehova's Witness</option>
        <option value="Seventh Day Adventist"
        <?= $bRel == 'Seventh Day Adventist' ? 'selected' : '' ?>>Seventh Day Adventist</option>
    </select>
</div>