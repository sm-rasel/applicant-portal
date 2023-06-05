<template>
    <div class="container">
        <table id="tableComponent" class="table table-bordered  table-striped">
            <thead>
                <tr>
                    <th  v-for="column in columns" :key='column.title'> 
                    {{column.title}}
                    </th>
                    <th v-if="actions.edit || actions.delete">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in data" :key='item'>
                    <td v-for="column in columns" :key='column.field'>{{item[column.field]}}</td>
                    <button class="btn btn-outline-success btn-sm px-3 m-2" v-if="actions.edit" @click="editData(item.id)">Edit</button>
                    <button class="btn btn-outline-danger btn-sm px-3 m-2" v-if="actions.delete" @click="deleteData(item.id)">Delete</button>
                </tr>
            </tbody>
        </table> 
    </div>
</template>
<script>
import RestApi, { ServiceBaseUrl } from '../../../../config/api_config';
import { applicantDeleteApi } from '../../../modules/applicant/api/routes';
import Store from '@/store'
import Swal from 'sweetalert2';
export default {
    name: 'BtTable',
    props:{
        data:{
            type: Array,
            required: true
        },
        columns:{
            type: Array,
            required: true
        },
        actions: {
            type: Object,
            required: true
        }
    },
    methods: {
        editData(editId) {
            this.$router.push({ name: 'edit_applicant_form', params: { applicantId: editId } })
        },
        deleteData(deleteId) {
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              Store.dispatch('mutateCommonProperties', { loading: true, listReload: false })
              RestApi.deleteData(ServiceBaseUrl, `${applicantDeleteApi}/${deleteId}` ).then(response => {
                if (response.success == true){
                  Swal.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                  )
                }
              })
            }
          })
            console.log('Delete  Item => ', deleteId)
        }
    }
}
</script>
<style scoped>
</style>
