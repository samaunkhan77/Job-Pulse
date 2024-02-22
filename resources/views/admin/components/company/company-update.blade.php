<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Company Name *</label>
                                <input type="text" class="form-control" id="companyNameUpdate">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Company Email *</label>
                                <input type="text" class="form-control" id="companyEmailUpdate">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Company Address *</label>
                                <input type="text" class="form-control" id="companyAddressUpdate">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Company Phone *</label>
                                <input type="text" class="form-control" id="companyPhoneUpdate">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Company Website *</label>
                                <input type="text" class="form-control" id="companyWebsiteUpdate">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Company Description *</label>
                                <input type="text" class="form-control" id="companyDescriptionUpdate">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Company Status *</label>
                                <select type="text" class="form-control" id="companyStatusUpdate">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                            <input class="d-none" id="updateID">

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Update()" id="update-btn" class="btn bg-gradient-success" >Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function FillUpUpdateForm(id){
        try {
            document.getElementById('updateID').value =id;
            showLoader();
            let res = await axios.post('/admin-company-by-id',{id:id}, HeaderToken())
            hideLoader();

            console.log(res.data['company']['company_name']);
            document.getElementById('companyNameUpdate').value = res.data['company']['company_name'];
            document.getElementById('companyEmailUpdate').value = res.data['company']['company_email'];
            document.getElementById('companyAddressUpdate').value = res.data['company']['company_address'];
            document.getElementById('companyPhoneUpdate').value = res.data['company']['company_phone'];
            document.getElementById('companyWebsiteUpdate').value = res.data['company']['company_website'];
            document.getElementById('companyDescriptionUpdate').value = res.data['company']['company_description'];
            document.getElementById('companyStatusUpdate').value = res.data['company']['company_status'];

        }
        catch (e) {
            unauthorized(e)
        }
    }

    async function Update(){
        try {
            let companyNameUpdate = document.getElementById('companyNameUpdate').value;
            let companyEmailUpdate = document.getElementById('companyEmailUpdate').value;
            let companyAddressUpdate = document.getElementById('companyAddressUpdate').value;
            let companyPhoneUpdate = document.getElementById('companyPhoneUpdate').value;
            let companyWebsiteUpdate = document.getElementById('companyWebsiteUpdate').value;
            let companyDescriptionUpdate = document.getElementById('companyDescriptionUpdate').value;
            let companyStatusUpdate = document.getElementById('companyStatusUpdate').value;
            let updateID = document.getElementById('updateID').value;

            let postData = {
                company_name:companyNameUpdate,
                company_email:companyEmailUpdate,
                company_address:companyAddressUpdate,
                company_phone:companyPhoneUpdate,
                company_website:companyWebsiteUpdate,
                company_description:companyDescriptionUpdate,
                company_status:companyStatusUpdate,
                id:updateID
            }

            document.getElementById('update-modal-close').click();
            showLoader();
            let res = await axios.post('/admin-company-update',postData, HeaderToken())
            hideLoader();

            if(res.status===200){
                document.getElementById('update-form').reset();
                successToast("Company Updated Successfully");
                await getList();

            }
        }
        catch (e) {
            unauthorized(e.response.status)
        }
    }

</script>

