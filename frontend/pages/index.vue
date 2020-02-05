<template>
  <div class="container">
    <h2>page index</h2>
  </div>
</template>
<script lang="ts">
  import {Component, Vue} from 'vue-property-decorator';

  @Component
  export default class Index extends Vue {
    name: string = "Index"
  }
</script>
