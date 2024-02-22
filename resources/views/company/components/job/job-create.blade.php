<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Create Job</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Job Title *</label>
                                <input type="text" class="form-control" id="jobTitle">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Job Category *</label>
                                <select type="text" class="form-control" id="jobCategory">
                                    <option value="active">Select Category</option>
                                </select>
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Job Description *</label>
                                <input type="text" class="form-control" id="jobDescription">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Job Location *</label>
                                <input type="text" class="form-control" id="jobLocation">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Job Type*</label>
                                <input type="text" class="form-control" id="jobType">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Job Qualification *</label>
                                <input type="text" class="form-control" id="jobQualification">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Job Experience *</label>
                                <input type="text" class="form-control" id="jobExperience">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Job Deadline *</label>
                                <input type="text" class="form-control" id="jobDeadline">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Job benefits *</label>
                                <input type="text" class="form-control" id="jobBenefits">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Job Salary *</label>
                                <input type="text" class="form-control" id="jobSalary">
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
    FillCategoryDropdown();

    async function FillCategoryDropdown() {
        let res = await axios.get("/categoryList",HeaderToken());

        res.data.forEach(iteam => {
            let option =`<option value="${iteam.id}">${iteam.category_name}</option>`;
            $("#jobCategory").append(option);
        })
    }

    async function Save() {
        let title = document.getElementById('jobTitle').value;
        let category = document.getElementById('jobCategory').value;
        let description = document.getElementById('jobDescription').value;
        let location = document.getElementById('jobLocation').value;
        let type = document.getElementById('jobType').value;
        let qualification = document.getElementById('jobQualification').value;
        let experience = document.getElementById('jobExperience').value;
        let deadline = document.getElementById('jobDeadline').value;
        let benefits = document.getElementById('jobBenefits').value;
        let salary = document.getElementById('jobSalary').value;

        document.getElementById('modal-close').click();


        let formData = new FormData();
        formData.append('job_title', title);
        formData.append('category_id', category);
        formData.append('job_description', description);
        formData.append('job_location', location);
        formData.append('job_type', type);
        formData.append('job_qualification', qualification);
        formData.append('job_experience', experience);
        formData.append('job_deadline', deadline);
        formData.append('job_benefits', benefits);
        formData.append('job_salary', salary);


        showLoader()
        let res = await axios.post("/jobCreate", formData,HeaderToken());
        hideLoader();
        if (res.status === 200) {
            successToast("Job Created Successfully");
            window.location.href = "/company-job";
        }
        else {
            errorToast(res.data['message']);
        }

    }
</script>


