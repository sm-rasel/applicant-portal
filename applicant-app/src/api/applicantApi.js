import ApiConfig from '../../config/api_config'
const baseUrl = 'http://127.0.0.1:8000/'
  
  export default {
    async getApplicants () {
      const  applicants = await ApiConfig.getData(baseUrl, '/')
      return applicants.data
    }
  }
