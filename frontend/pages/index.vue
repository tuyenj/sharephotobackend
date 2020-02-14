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
    <div v-if="links.length !== 0" class="field has-addons has-addons-centered">
      <p v-if="links.first !== null" class="control">
        <button class="button is-small" @click="changePage(links.first)">first</button>
      </p>
      <p v-else class="control">
        <button class="button is-small " disabled>first</button>
      </p>
      <p v-if="links.prev !== null" class="control">
        <button class="button is-small" @click="changePage(links.prev)">prev</button>
      </p>
      <p v-else class="control">
        <button class="button is-small" disabled>prev</button>
      </p>
      <p v-if="links.next !== null" class="control">
        <button class="button is-small"
                　@click="changePage(links.next)">next
        </button>
      </p>
      <p v-else class="control">
        <button class="button is-small" disabled>next
        </button>
      </p>
      <p v-if="links.last !== null" class="control">
        <button class="button is-small"
                　@click="changePage(links.last)">last
        </button>
      </p>
      <p v-else class="control">
        <button class="button is-small" disabled>last
        </button>
      </p>
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
