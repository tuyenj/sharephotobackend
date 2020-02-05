export const getters = {
  authenticated(state: any) {
    return state.auth.loggedIn
  },

  user(state: any) {
    return state.auth.user
  }
}
