<template>
  <div class="applicant-from">
    <div class="container">
      <div class="page-container">
        <div class="container-fluid">
          <div class="col-xl-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title mb-4">Applicant Form</h4>
                <form @submit.prevent="submitForm">
                  <div class="row mb-4">
                    <label class="col-sm-3 col-form-label">
                      Name
                      <span class="text-danger me-1">*</span>
                    </label>
                    <div class="col-sm-9">
                      <input class="form-control" v-model="applicantData.app_name" placeholder="Enter Your Name" required/>
                      <span class="error"></span>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <label class="col-sm-3 col-form-label">
                      Email
                      <span class="text-danger me-1">*</span>
                    </label>
                    <div class="col-sm-9">
                      <input type="email" v-model="applicantData.app_email" class="form-control" placeholder="Enter Your Email" required/>
                      <span class="error"></span>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <label class="col-sm-3 col-form-label">
                      Image
                      <span class="text-danger me-1">*</span>
                    </label>
                    <div class="col-sm-9">
                      <input type="file" name="app_image" id="sliderImage" v-on:change="onFileChange" class="form-control"/>
                      <img class="mt-3 w-25" src="" id="output" alt="">
                      <span class="error"></span>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <label class="col-sm-3 col-form-label">
                      Gender
                      <span class="text-danger me-1">*</span>
                    </label>
                    <div class="col-sm-6">
                      <label class="col-sm-3" for="gender">
                        <input type="radio" class="" v-model="applicantData.app_gender" value="1"/>
                        Male
                      </label>
                      <label class="col-sm-3" for="gender">
                        <input type="radio" class="" v-model="applicantData.app_gender" value="2"/>
                        Female
                      </label>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-sm-3 col-form-label">
                      <label>Skills</label>
                      <span class="text-danger me-1">*</span>
                    </div>
                    <div class="col-sm-9 row col-form-label">
                      <div class="col-sm-3">
                        <label for="laravel" class="me-3">Laravel</label>
                        <input type="checkbox" id="laravel" value="laravel" name="laravel" v-model="applicantData.app_skills"/>
                      </div>
                      <div class="col-sm-3">
                        <label for="codeigniter" class="me-3">Codeigniter</label>
                        <input type="checkbox" id="codeigniter" value="codeigniter" name="codeigniter" v-model="applicantData.app_skills"/>
                      </div>
                      <div class="col-sm-3">
                        <label for="ajax" class="me-3">Ajax</label>
                        <input type="checkbox" id="ajax" value="ajax" name="ajax" v-model="applicantData.app_skills"/>
                      </div>
                      <div class="row mt-3">
                        <div class="col-sm-3">
                          <label for="vue" class="me-3">Vue Js</label>
                          <input type="checkbox" id="ajax" value="vue" name="vue" v-model="applicantData.app_skills"/>
                        </div>
                        <div class="col-sm-3 ms-2">
                          <label for="mysql" class="me-3">My SQL</label>
                          <input type="checkbox" id="mysql" value="mysql" name="mysql" v-model="applicantData.app_skills"/>
                        </div>
                        <div class="col-sm-3 ms-2">
                          <label for="api" class="me-3">API</label>
                          <input type="checkbox" id="api" value="api" name="api" v-model="applicantData.app_skills"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-end">
                    <div class="col-sm-9">
                      <button type="submit" class="btn btn-outline-success w-md px-5 me-1">Submit</button>
                      <router-link class="btn btn-outline-danger w-md px-5 ms-1" :to="{ name: 'list' }">Cancel</router-link>
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

<script>
  import RestApi, { ServiceBaseUrl } from "../../../../config/api_config";
  import { applicantStoreApi, applicantUpdateApi } from "@/modules/applicant/api/routes";

  export default {
    data() {
      return {
        applicantData : {
          app_name: '',
          app_email: '',
          app_gender: '',
          app_image : '',
          app_skills : []
        },
        applicant_image: []
      }
    },
    created () {
    const applicantId = this.$route.params.applicantId;
    if(applicantId)  {
      this.getApplicantData(applicantId)
    }
  },
    methods: {
      getApplicantData(applicantId) {
        const applicantList = this.$store.state.applicants.applicantList
        const data = {...applicantList.find(item => item.id === parseInt(applicantId))}
        const skills_data = data.app_skills.split(",")
        const gender = data.app_gender === 'Male' ? 1: 2
        this.applicantData = data
        this.applicantData.app_skills = skills_data
        this.applicantData.app_gender = gender
      },
      onFileChange (e) {
        this.applicant_image = e.target.files[0]
      },
      async submitForm(){
        var formData = new FormData()
        Object.keys(this.applicantData).map(key => {
          if (key === 'app_image') {
            formData.append(key, this.applicant_image)
          } else {
            formData.append(key, this.applicantData[key])
          }
        })
        let response = null
        if (this.applicantData.id) {
          response = await RestApi.postData(ServiceBaseUrl, `${applicantUpdateApi}/${this.applicantData.id}`, formData)
        } else {
          response = await RestApi.postData(ServiceBaseUrl, applicantStoreApi, formData)
        }
        if (response.success == true)
        {
          this.$router.push('/');
        }
      }

    }
  }
</script>

<style scoped>

</style>