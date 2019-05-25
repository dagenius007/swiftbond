<!--- Confirm user -->
        <div class="modal fade" id="confirm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Confirm User</h4>
              </div>
              <div class="modal-body" style="font-size: 18px;">
                <p>Are you sure you want to confirm this person? Confirm only when you've received payment.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                <a type="button" class="btn btn-sm btn-success" <?php echo ' href="confirmUser.php?rdr=' . md5("3e7a5abf659d1c90b2760d830ca67ba1") . '&du=dpay1" '; ?>>Confirm Payment</a>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="confirm2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Confirm Delete</h4>
              </div>
              <div class="modal-body" style="font-size: 18px;">
                <p>Are you sure you want to delete this user? Deletion will be reviewed by the admin. Delete only when this person is trying fraud.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                <a type="button" class="btn btn-sm btn-danger" href="<?php echo 'deleteUser.php?rdr=' . md5(md5("3e7a5abf659d1c90b2760d830ca67ba1")) . '&du=dpay2'; ?>">Delete User</a>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="confirm3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Confirm User</h4>
              </div>
              <div class="modal-body" style="font-size: 18px;">
                <p>Are you sure you want to confirm this person? Confirm only when you've received payment.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                <a type="button" class="btn btn-sm btn-success" <?php echo ' href="confirmUser.php?rdr=' . md5("3e7a5abf659d1c90b2760d830ca67ba1") . '&du=dpay3" '; ?>>Confirm Payment</a>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="confirm4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Confirm User</h4>
              </div>
              <div class="modal-body" style="font-size: 18px;">
                <p>Are you sure you want to confirm this person? Confirm only when you've received payment.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                <a type="button" class="btn btn-sm btn-success" <?php echo ' href="confirmUser.php?rdr=' . md5("3e7a5abf659d1c90b2760d830ca67ba1") . '&du=dpay4" '; ?>>Confirm Payment</a>
              </div>
            </div>
          </div>
        </div>