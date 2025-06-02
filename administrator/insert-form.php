<div class="form-section">
    <h3 class="mb-4 text-center text-primary"><i class="zmdi zmdi-quote"></i> Anime Quote Manager</h3>
    <form method="POST">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="animeTitle" class="form-label"><i class="zmdi zmdi-slideshow"></i>Anime
                    Title</label>
                <input type="text" class="form-control" name="title" id="animeTitle" placeholder="Enter anime title">
                <?= isset($err['title']) ? ' <span class="alert alert-danger py-2 mt-2 d-inline-block w-100 mb-0" role="alert"><i class="zmdi zmdi-alert-circle me-2"></i>' . $err['title'] . '</span>' : '' ?>

            </div>
            <div class="col-md-6">
                <label for="saidBy" class="form-label"><i class="zmdi zmdi-account"></i>Said By</label>
                <input type="text" class="form-control" name="saidBy" id="saidBy" placeholder="Who said it?">
                <?= isset($err['saidBy']) ? ' <span class="alert alert-danger py-2 mt-2 d-inline-block w-100 mb-0" role="alert"><i class="zmdi zmdi-alert-circle me-2"></i>' . $err['saidBy'] . '</span>' : '' ?>

            </div>
        </div>
        <div class="mb-3">
            <label for="quote" class="form-label"><i class="zmdi zmdi-comment-text"></i>Quote</label>
            <textarea class="form-control" id="quote" name="quote" rows="3" placeholder="Enter the quote"></textarea>
            <?= isset($err['quote']) ? ' <span class="alert alert-danger py-2 mt-2 d-inline-block w-100 mb-0" role="alert"><i class="zmdi zmdi-alert-circle me-2"></i>' . $err['quote'] . '</span>' : '' ?>
        </div>
        <button type="submit" name="submit" class="btn btn-primary w-100"><i class="zmdi zmdi-plus-circle"></i>
            Submit
            Quote</button>
    </form>
</div>