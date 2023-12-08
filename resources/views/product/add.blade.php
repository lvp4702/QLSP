<!-- Modal add-->
<div class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="modal-add-label" aria-hidden="true">
    <form action="" method="post" id="form-add" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fst-italic fw-bolder" id="modal-add-label">Add a new product</h1>
                    <button type="button" id="close" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="fs-5">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>

                    <div class="form-group mt-3">
                        <label class="fs-5">Upload </label>
                        <input type="file" class="form-control" name="img" id="img">
                        <img id="previewImage" src="#" alt="Preview"
                            style="max-width: 150px; display: none; margin-top:6px;">
                    </div>

                    <div class="form-group mt-3">
                        <label for="price" class="fs-5">Price</label>
                        <input type="text" class="form-control" name="price" id="price">
                    </div>

                    <div class="form-group mt-3">
                        <label for="describe" class="fs-5">Describe</label>
                        <textarea name="describe" id="describe" cols="60" rows="5" class="form-control"></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="close"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>







