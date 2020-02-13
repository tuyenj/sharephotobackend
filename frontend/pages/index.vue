<template>
  <div class="container">
    <div class="columns is-multiline">
      <div class="column is-4" v-for="item in photo">
        <div class="box">
          <div class="author is-size-7 has-text-right">@author:{{item.owner.name}}</div>
          <img :src="item.url" alt="">
        </div>
      </div>
    </div>
    <nav class="pagination is-small is-centered" role="navigation" aria-label="pagination">
      <ul class="pagination-list">
        <li v-for="(key,value) in links">
          <a @click="changePage(key)" class="pagination-link">{{value}}</a>
        </li>
      </ul>
    </nav>
  </div>
</template>
<script lang="ts">
  import {Component, Vue} from 'vue-property-decorator';
  import Photo from '../Models/index';

  @Component
  export default class Index extends Vue {
    name: string = "Index"
    photo: Photo[] = []
    links: string[] = []
    $axios: any;

    created() {
      this.getListPhotos();
    }

    async getListPhotos(params: any = "", links: any = []) {
      const response = await this.$axios.$get('photos');
      this.photo = response.data;
      this.links = response.links;
    }

    async changePage(key: string) {
      const {data, links} = await this.$axios.$get(key);
      this.links = links;
      return this.photo = data;
    }
  }
</script>
<style scoped>
  .columns {
    margin-top: 5px;
  }

  .box {
    min-height: 250px;
    position: relative;
  }

  .box img {
    height: 200px;
  }

  .author {
    position: absolute;
    right: 0;
    bottom: 0;
    padding: 2px 20px;
  }
</style>
