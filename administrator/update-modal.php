<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="myModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST">
        <div class="modal-body">
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="updateAnimeTitle" class="form-label"><i class="zmdi zmdi-slideshow"></i>Anime Title</label>
              <input type="text" class="form-control" name="updateTitle" id="updateAnimeTitle"
              value="<?= (isset($_POST['updateTitle']))?$_POST['updateTitle']:''?>"  placeholder="Enter anime title">
              <?= isset($err['updateTitle']) ? ' <span class="alert alert-danger py-2 mt-2 d-inline-block w-100 mb-0" role="alert"><i class="zmdi zmdi-alert-circle me-2"></i>' . $err['updateTitle'] . '</span>' : '' ?>
            </div>
            <div class="col-md-6">
              <label for="updateSaidBy" class="form-label"><i class="zmdi zmdi-account"></i>Said By</label>
              <input type="text" class="form-control" name="updateSaidBy" id="updateSaidBy" value="<?= (isset($_POST['updateSaidBy']))?$_POST['updateSaidBy']:''?>" placeholder="Who said it?">
              <?= isset($err['updateSaidBy']) ? ' <span class="alert alert-danger py-2 mt-2 d-inline-block w-100 mb-0" role="alert"><i class="zmdi zmdi-alert-circle me-2"></i>' . $err['updateSaidBy'] . '</span>' : '' ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="updateQuote" class="form-label"><i class="zmdi zmdi-comment-text"></i>Quote</label>
            <textarea class="form-control" id="updateQuote" name="updateQuote" rows="3"
            placeholder="Enter the quote"><?= (isset($_POST['updateQuote']))?$_POST['updateQuote']:''?> </textarea>
            <?= isset($err['updateQuote']) ? ' <span class="alert alert-danger py-2 mt-2 d-inline-block w-100 mb-0" role="alert"><i class="zmdi zmdi-alert-circle me-2"></i>' . $err['updateQuote'] . '</span>' : '' ?>
          </div>
        </div>
        <input type="hidden" id="record" name="record" value=" <?= (isset($_POST['record']))?$_POST['record']:''?>">
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="update" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php if (!empty($err)) { ?>
  <script>
    if (document.querySelectorAll('#myModal .alert').length) {
      const myModal = new bootstrap.Modal(document.getElementById('myModal'));
      myModal.show();
    }
  </script>
<?php } ?>