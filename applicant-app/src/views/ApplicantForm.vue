<template>
  <div class="applicant-from">
    <div class="container">
      <div class="page-container">
        <div class="container-fluid">
          <div class="col-xl-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title mb-4">Applicant Form</h4>
                <form action="" method="POST" id="sliderForm" enctype="multipart/form-data">
                  <div class="row mb-4">
                    <label class="col-sm-3 col-form-label">
                      Name
                      <span class="text-danger me-1">*</span>
                    </label>
                    <div class="col-sm-9">
                      <input class="form-control" name="app_name" id="appName" placeholder="Enter Your Name" required/>
                      <span class="error"></span>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <label class="col-sm-3 col-form-label">
                      Email
                      <span class="text-danger me-1">*</span>
                    </label>
                    <div class="col-sm-9">
                      <input type="email" name="app_email" id="app_email" class="form-control" placeholder="Enter Your Email" required/>
                      <span class="error"></span>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <label class="col-sm-3 col-form-label">
                      Image
                      <span class="text-danger me-1">*</span>
                    </label>
                    <div class="col-sm-9">
                      <input type="file" name="app_image" id="sliderImage" onchange="loadFile(event)" class="form-control"/>
                      <img class="mt-3 w-25" src="" id="output" alt="">
                      <span class="error"></span>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <label class="col-sm-4 col-form-label">
                      Gender
                      <span class="text-danger me-1">*</span>
                    </label>
                    <div class="col-sm-8">
                      <label class="col-sm-4" for="gender">
                        <input type="radio" class="" name="app_gender" value="1"/>
                        Male
                      </label>
                      <label class="col-sm-4" for="gender">
                        <input type="radio" class="" name="app_gender" value="2"/>
                        Female
                      </label>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-sm-4 col-form-label">
                      <label>Skills</label>
                      <span class="text-danger me-1">*</span>
                    </div>
                    <div class="col-sm-12 col-form-label">
                      <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="laravel"> Laravel</label>
                      <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="codeigniter"> Codeigniter</label>
                      <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="ajax"> Ajax</label>
                      <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="vue"> Vue Js</label>
                      <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="mysql"> MySQL</label>
                      <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="api"> API</label>
                    </div>
                  </div>
                  <div class="row d-flex justify-content-center">
                    <div class="col-sm-12 text-center">
                      <button type="submit" class="btn btn-outline-success w-md px-5 me-1" id="subBtn">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- end card body -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>

</script>

<style scoped>

</style>