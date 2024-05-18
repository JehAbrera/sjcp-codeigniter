
<input type="checkbox" id="modal_clear" class="modal-toggle" />
<div class="modal" role="dialog">
  <div class="modal-box">
    <h3 class="font-bold text-lg">Are you sure you want to clear the form?</h3>
    <p class="py-4">This will clear the form immediately. You cannot undo this action.</p>
    <div class="modal-action">
      <label for="modal_clear" class="btn btn-error btn-outline">No</label>
      <button type="reset"  class="btn btn-success text-white">Yes</button>
    </div>
  </div>
</div>

<input type="checkbox" id="modal_submit" class="modal-toggle" />
<div class="modal" role="dialog">
  <div class="modal-box">
    <h3 class="font-bold text-lg">Are you sure the details are correct and you want to submit?</h3>
    <p class="py-4">After submitting, your event will be submitted for review or approved.</p>
    <div class="modal-action">
      <label for="modal_submit" class="btn btn-error btn-outline">No</label>
      <button type="submit" name="submit" value="submitform" class="btn btn-success text-white">Yes</button>
    </div>
  </div>
</div>
<?= form_close() ?>