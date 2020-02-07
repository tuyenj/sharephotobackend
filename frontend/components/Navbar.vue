<template>
  <nav role="navigation" aria-label="main navigation" class="navbar is-info">
    <div class="container">
      <div class="navbar-brand">
        <nuxt-link class="navbar-item" to="/">
          <font-awesome-icon :icon="['fas','home']" aria-hidden="true"></font-awesome-icon>
          Home
        </nuxt-link>
      </div>
      <div class="navbar-end" v-show="this.$store.getters.authenticated">
        <a class="navbar-item">{{this.$store.getters.user}}</a>
        <a @click.prevent="logout" class="navbar-item">Logout</a>
      </div>
      <div class="navbar-end" v-show="!this.$store.getters.authenticated">
        <nuxt-link class="navbar-item" to="/register">
          Register
        </nuxt-link>
        <nuxt-link to="/login" class="navbar-item">
          Login
        </nuxt-link>
      </div>
    </div>
  </nav>
</template>
<script lang="ts">
  import {Component, Vue} from 'vue-property-decorator';

  @Component
  export default class NavBar extends Vue {
    isLogged: boolean = false;
    userName: string = "";
    name: string = "NavBar"
    $auth: any;

    logout() {
        this.$auth.logout();
    }
  }
</script>
