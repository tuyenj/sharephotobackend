<template>
  <div>
    <NavBar/>
    <nuxt/>
  </div>
</template>
<script lang="ts">
  import NavBar from '../components/Navbar.vue';
  import {Component, Vue} from 'vue-property-decorator';

  @Component({
    components: {
      NavBar
    }
  })
  export default class extends Vue {

  }
</script>
