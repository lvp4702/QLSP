<!-- Modal edit-->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="modal-edit-label" aria-hidden="true">
    <form action="" method="post" id="form-edit" enctype="multipart/form-data">
        <input type="hidden" id="up_id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fst-italic fw-bolder" id="modal-edit-label">Edit product</h1>
                    <button type="button" id="close" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="fs-5">Name</label>
                        <input type="text" class="form-control" name="name" id="up_name">
                    </div>

                    <div class="form-group mt-3">
                        <label class="fs-5">Image</label>
                        <img src="" alt="" id="img_old">
                        <p class="fs-5 mt-2">
                            Upload a new image
                            <input type="file" class="form-control" name="img" id="up_img">
                        </p>
                        <img id="previewImage_edit" src="#" alt="Preview"
                            style="max-width: 150px; display: none; margin-top:6px;">
                    </div>

                    <div class="form-group mt-3">
                        <label for="price" class="fs-5">Price</label>
                        <input type="text" class="form-control" name="price" id="up_price">
                    </div>

                    <div class="form-group mt-3">
                        <label for="describe" class="fs-5">Describe</label>
                        <textarea name="describe" id="up_describe" cols="60" rows="5" class="form-control"></textarea>
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
