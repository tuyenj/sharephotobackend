export const state = () => ({
  errors: {}
})

export const getters = {
  errors(state: any) {
    return state.errors
  }
}

export const mutations = {
  SET_VALIDATION_ERRORS(state: any, errors: string) {
    state.errors = errors
  }
}

export const actions = {
  setErrors({commit}: any, errors: string) {
    commit("SET_VALIDATION_ERRORS", errors)
  },
  clearErrors({commit}: any) {
    commit("SET_VALIDATION_ERRORS", {})
  }
}
