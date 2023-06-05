<template>
  <div class="container text-center  mt-5 mb-5">
    <div class="float-end">
      <router-link class="btn btn-sm btn-outline-success w-md" :to="{ name: 'applicant_form'}">Add New</router-link>
    </div>
    <h3 class="mt-5 fw-bolder text-success "> List of Data </h3>
    <div class="table-responsive my-5 table-bordered">
      <BtTable :data="applicants" :columns="columns" :actions="actions" />
    </div>
  </div>
</template>

<script>
import RestApi, { ServiceBaseUrl } from '../../../../config/api_config'
import { applicantListApi } from '../api/routes'
import { mapState } from 'vuex'
export default {
  components: { },
  computed: mapState({
    applicants: state => state.applicants.applicantList
  }),
  data() {
    return {
      columns: [
        {
          title:  'SL',
          field:  'id'
        },
        {
          title:  'Name',
          field:  'app_name'
        },
        {
          title:  'Email',
          field:  'app_email'
        },
        {
          title: 'Image',
          field: 'app_image'
        },
        {
          title: 'Gender',
          field: 'app_gender'
        },
        {
          title: 'Skills',
          field: 'app_skills'
        }
      ],
      actions: {
        edit: true,
        delete: true
      }
    }
  },
  created () {
    this.loadData()
  },
  methods: {
    loadData () {
      const params = {}
      RestApi.getData(ServiceBaseUrl, applicantListApi, params).then(response => {
        if (response.success) {
          const arrayData = response.data.map(item => {
            const app_gender = item.app_gender === 1 ? 'Male' : 'Female';
            item.app_gender = app_gender;
            return item;
          })
          this.$store.commit('applicants/setApplicantList', arrayData)
        }
      });
      // RestApi.deleteData(ServiceBaseUrl, applicantDeleteApi, params);
    },
    dataEdit(itemId)  {
      console.log('Edit Item  => ', itemId);
    }
  }
}
</script>