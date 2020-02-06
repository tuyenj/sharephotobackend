export const getters = {
  authenticated(state: any) {
    return state.auth.loggedIn
  },

  user(state: any) {
    if (state.auth.loggedIn) {
      return state.auth.user.name;
    } else {
      return '';
    }
  }
}
