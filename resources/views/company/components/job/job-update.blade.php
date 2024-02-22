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
                                <label class="form-label">Job Title *</label>
                                <input type="text" class="form-control" id="jobTitleUpdate">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Job Category *</label>
                                <select type="text" class="form-control" id="jobCategoryUpdate">
                                    <option>Select Category</option>
                                </select>
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Job Description *</label>
                                <input type="text" class="form-control" id="jobDescriptionUpdate">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Job Location *</label>
                                <input type="text" class="form-control" id="jobLocationUpdate">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Job Type*</label>
                                <input type="text" class="form-control" id="jobTypeUpdate">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Job Qualification *</label>
                                <input type="text" class="form-control" id="jobQualificationUpdate">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Job Experience *</label>
                                <input type="text" class="form-control" id="jobExperienceUpdate">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Job Deadline *</label>
                                <input type="text" class="form-control" id="jobDeadlineUpdate">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Job benefits *</label>
                                <input type="text" class="form-control" id="jobBenefitsUpdate">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Job Salary *</label>
                                <input type="text" class="form-control" id="jobSalaryUpdate">
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

    FillCategoryDropdown();

    async function FillCategoryDropdown() {
        let res = await axios.get("/categoryList",HeaderToken());

        res.data.forEach(iteam => {
            console.log(iteam['category_name']);
            let option =`<option value="${iteam['id']}">${iteam['category_name']}</option>`;
            $("#jobCategoryUpdate").append(option);
        })
    }
    async function FillUpUpdateForm(id){
        try {
            document.getElementById('updateID').value =id;
            showLoader();
            let res = await axios.post('/jobListByID',{id:id}, HeaderToken())
            hideLoader();

            document.getElementById('jobTitleUpdate').value = res.data['0']['job_title'];
            document.getElementById('jobCategoryUpdate').value = res.data['0']['category_id'];
            document.getElementById('jobDescriptionUpdate').value = res.data['0']['job_description'];
            document.getElementById('jobLocationUpdate').value = res.data['0']['job_description'];
            document.getElementById('jobTypeUpdate').value = res.data['0']['job_type'];
            document.getElementById('jobQualificationUpdate').value = res.data['0']['job_qualification'];
            document.getElementById('jobExperienceUpdate').value = res.data['0']['job_experience'];
            document.getElementById('jobDeadlineUpdate').value = res.data['0']['job_deadline'];
            document.getElementById('jobBenefitsUpdate').value = res.data['0']['job_benefits'];
            document.getElementById('jobSalaryUpdate').value = res.data['0']['job_salary'];

        }
        catch (e) {
            unauthorized(e)
        }
    }

    async function Update(){
        try {
            let companyNameUpdate = document.getElementById('jobTitleUpdate').value;
            let jobCategoryUpdate = document.getElementById('jobCategoryUpdate').value;
            let jobDescriptionUpdate = document.getElementById('jobDescriptionUpdate').value;
            let jobLocationUpdate = document.getElementById('jobLocationUpdate').value;
            let jobTypeUpdate = document.getElementById('jobTypeUpdate').value;
            let jobQualificationUpdate = document.getElementById('jobQualificationUpdate').value;
            let jobExperienceUpdate = document.getElementById('jobExperienceUpdate').value;
            let jobDeadlineUpdate = document.getElementById('jobDeadlineUpdate').value;
            let jobBenefitsUpdate = document.getElementById('jobBenefitsUpdate').value;
            let jobSalaryUpdate = document.getElementById('jobSalaryUpdate').value;

            let updateID = document.getElementById('updateID').value;

            let postData = {
                job_title:companyNameUpdate,
                category_id:jobCategoryUpdate,
                job_description:jobDescriptionUpdate,
                job_location:jobLocationUpdate,
                job_type:jobTypeUpdate,
                job_qualification:jobQualificationUpdate,
                job_experience:jobExperienceUpdate,
                job_deadline:jobDeadlineUpdate,
                job_benefits:jobBenefitsUpdate,
                job_salary:jobSalaryUpdate,
                id:updateID
            }

            document.getElementById('update-modal-close').click();
            showLoader();
            let res = await axios.post('/jobUpdate',postData, HeaderToken())
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


