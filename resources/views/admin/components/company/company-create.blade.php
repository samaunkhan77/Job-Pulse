<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Create Category</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Company Name *</label>
                                <input type="text" class="form-control" id="companyName">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Company Address *</label>
                                <input type="text" class="form-control" id="companyAddress">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Company Email *</label>
                                <input type="text" class="form-control" id="companyEmail">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Company Phone *</label>
                                <input type="text" class="form-control" id="companyPhone">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Company Website *</label>
                                <input type="text" class="form-control" id="companyWebsite">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Company Description *</label>
                                <input type="text" class="form-control" id="companyDescription">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Company Status *</label>
                                <select type="text" class="form-control" id="companyStatus">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function Save() {
        let companyName = document.getElementById('companyName').value;
        let companyAddress = document.getElementById('companyAddress').value;
        let companyEmail = document.getElementById('companyEmail').value;
        let companyPhone = document.getElementById('companyPhone').value;
        let companyWebsite = document.getElementById('companyWebsite').value;
        let companyDescription = document.getElementById('companyDescription').value;
        let companyStatus = document.getElementById('companyStatus').value;


        let postData = {
            company_name:companyName,
            company_address:companyAddress,
            company_email:companyEmail,
            company_phone:companyPhone,
            company_website:companyWebsite,
            company_description:companyDescription,
            company_status:companyStatus
        }
        document.getElementById('modal-close').click();
        showLoader();
        let res = await axios.post("admin-company-create",postData,HeaderToken());
        hideLoader();

        if (res.status === 200) {
            successToast("Category created successfully");
            window.location.reload();
        }
        else {
            errorToast("Something went wrong");
        }

    }
</script>

