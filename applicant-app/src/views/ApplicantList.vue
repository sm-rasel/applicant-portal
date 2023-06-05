<template>
  <div class="container text-center  mt-5 mb-5">
    <router-link class="btn btn-sm btn-outline-success w-md float-end" :to="{ name: 'applicantForm' }">
      <span>
        <i class="fas fa-plus"></i>
        Create new
      </span>
    </router-link>
    <h3 class="mt-5 fw-bolder text-success "> List of Data </h3>
    <div class="table-responsive my-5 table-bordered">
      <BtTable :data="applicants" :columns="columns" :actions="actions" />
    </div>
  </div>
</template>

<script>
import BtTable from '../components/core/table/bt-table.vue'
import { mapState } from 'vuex'

export default {
  components: { BtTable },
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
        }
      ],
      actions: {
        edit: true,
        delete: true
      }
    }
  },
  methods: {
    dataEdit(itemId)  {
      console.log('Edit Item  => ', itemId);
    }
  },
  created () {
    this.$store.dispatch('applicants/getAllApplicants')
  }
}
</script>