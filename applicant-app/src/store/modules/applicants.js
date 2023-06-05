import applicantApi from '../../api/applicantApi'

// initial state
const state = () => ({
  applicantList: []
})

// getters
const getters = {}

// actions
const actions = {
  async getAllApplicants ({ commit }) {
    const applicants = await applicantApi.getApplicants()
    commit('setApplicantList', applicants)
  }
}

// mutations
const mutations = {
    setApplicantList (state, applicants) {
    state.applicantList = applicants
  },

  deleteApplicantInfo (state, { id }) {
    const applicants = state.applicantList.map(applicant => applicant.id !== id)
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