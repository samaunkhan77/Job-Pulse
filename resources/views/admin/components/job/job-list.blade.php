<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <h4>Company List</h4>
                    </div>
                    <div class="align-items-center col">
                        <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 bg-gradient-primary">Create</button>
                    </div>
                </div>
                <hr class="bg-secondary"/>
                <div class="table-responsive">
                    <table class="table" id="tableData">
                        <thead>
                        <tr class="bg-light">
                            <th>No</th>
                            <th>Company Name</th>
                            <th>Job Title</th>
                            <th>Job Description</th>
                            <th>Job Type</th>
                            <th>Job Location</th>
                            <th>Job Qualification</th>
                            <th>Job Experience</th>
                            <th>Job Deadline</th>
                            <th>Job Benefits</th>
                            <th>Job Salary</th>
                            <th>Job Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tableList">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    getList()
    async function getList() {
        showLoader()
        let res = await axios.get("/adminJobList",HeaderToken());
        hideLoader()

        let tableList = $('#tableList');
        let tableData = $('#tableData');

        tableData.DataTable().destroy();
        tableList.empty();


        res.data['jobs'].forEach((item, index) => {
            let row = `<tr>
                <td>${index + 1}</td>
                <td>${item['company']['company_name']}</td>
                <td>${item['job_title'].substring(0,10)+'...'}</td>
                <td>${item['job_description'].substring(0,10)+'...'}</td>
                <td>${item['job_type'].substring(0,10)+'...'}</td>
                <td>${item['job_location'].substring(0,10)+'...'}</td>
                <td>${item['job_qualification'].substring(0,10)+'...'}</td>
                <td>${item['job_experience'].substring(0,10)+'...'}</td>
                <td>${item['job_deadline']}</td>
                <td>${item['job_benefits'].substring(0,10)+'...'}</td>
                <td>${item['job_salary'].substring(0,10)+'...'}</td>
                <td>${item['job_status']}</td>

                <td>
                        <button data-id="${item['id']}" class="btn editBtn btn-sm btn-outline-success">Edit</button>
                        <button data-id="${item['id']}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                    </td>
                 </tr>`
            tableList.append(row)
        });

        $('.editBtn').on('click', async function () {
            let id= $(this).data('id');
            await FillUpUpdateForm(id)
            $("#update-modal").modal('show');
        })

        $('.deleteBtn').on('click',function () {
            let id= $(this).data('id');
            $("#delete-modal").modal('show');
            $("#deleteID").val(id);
        })

        new DataTable('#tableData',{
            order:[[0,'desc']],
            lengthMenu:[5,10,15,20,30]
        });

    }
</script>


