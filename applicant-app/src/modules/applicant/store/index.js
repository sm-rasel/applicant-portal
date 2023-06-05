// initial state
const state = () => ({
  applicantList: []
})

// getters
const getters = {
  applicantList: state => state.applicantList
}

// actions
const actions = {
}

// mutations
const mutations = {
  setApplicantList (state, applicants) {
    state.applicantList = applicants
  }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}