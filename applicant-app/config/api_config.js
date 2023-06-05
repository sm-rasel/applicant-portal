import axios from 'axios'
export const ServiceBaseUrl = 'http://127.0.0.1:8000/'
// Handling server error
const errorHandler = (error) => {
  if (error.response.status === 401) {
    localStorage.removeItem('access_token')
  } else if (error.response.status === 500) {
    Store.commit('mutateCommonProperties', {
      loading: false,
      listReload: false
    })
  } else {
    console.log('Operation failed due to an unknown error.')
  }
  return error
}
export default {
  async execute (baseUrl, method, uri, data, params = {}) {
    const client = axios.create({
      baseURL: baseUrl,
      json: true
    })
    client.interceptors.response.use(response => response, error => errorHandler(error))
    return client({
      method,
      url: uri,
      data,
      params: params,
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      }
    }).then(req => {
      return req.data
    })
  },
  getData (baseUrl, uri, params = {}) {
    return this.execute(baseUrl, 'get', uri, {}, params)
  },
  postData (baseUrl, uri, data) {
    return this.execute(baseUrl, 'post', uri, data)
  },
  putData (baseUrl, uri, data) {
    return this.execute(baseUrl, 'put', uri, data)
  },
  deleteData (baseUrl, uri, params = {}) {
    return this.execute(baseUrl, 'delete', uri, params)
  }
}
