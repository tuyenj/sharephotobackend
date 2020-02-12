<template>
  <div class="container">
    <div class="image" v-for="item in photo">
      <h2>Test</h2>
      <img :src="item.url" alt="">
    </div>
  </div>
</template>
<script lang="ts">
  import {Component, Vue} from 'vue-property-decorator';
  import Photo from '../Models/index';

  @Component
  export default class Index extends Vue {
    name: string = "Index"
    photo: Photo[] = []
    $axios: any;

    mounted() {
      this.getListPhotos();
    }

    async getListPhotos() {
      const response = await this.$axios.$get('photos');
      this.photo = response.data;
    }
  }
</script>
