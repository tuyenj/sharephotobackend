<template>
  <client-only>
    <div class="container">
      <div class="box" v-if="this.$store.getters.authenticated">
        <h4>Add new Photo</h4>
        <div class="columns">
          <div class="column is-4">
            <div class="field file has-name">
              <label class="file-label">
                <input class="file-input" type="file" name="resume" @change="fileChange">
                <span class="file-cta">
                    <span class="file-icon">
                       <font-awesome-icon :icon="['fas','upload']" aria-hidden="true"></font-awesome-icon>
                    </span>
                    <span class="file-label">
                    Choose a file…
                    </span>
                  </span>
                <span class="file-name is-fullwidth" v-if="this.image !== null">
                      {{this.image.name}}
                  </span>
              </label>
            </div>
            <div class="field" v-if="errors !==''">
              <p v-for="n in errors.photo" class="is-size-7 has-text-danger">{{n}}</p>
            </div>
            <div class="field">
              <button class="button is-success is-small has-margin-top-15" @click="submit">Upload</button>
            </div>
          </div>
          <figure class="image is-128x128" v-if="this.image !== null">
            <img :src="preview" @error="imageLoadError"></img>
          </figure>
        </div>
      </div>
    </div>
  </client-only>
</template>
<script lang="ts">
  import {Component, Vue} from 'vue-property-decorator';

  @Component
  export default class New extends Vue {
    image: any = null
    preview: string = ''
    $axios: any;

    fileChange(e: any) {
      this.image = e.target.files[0];
      this.preview = URL.createObjectURL(this.image);
    }

    async submit() {
      const formData = new FormData();
      formData.append('photo', this.image);
      const response = await this.$axios.$post('/photos/new', formData).then(() => {
        this.$router.push('/');
      }).catch((e: any) => {
        console.log(e);
      });
    }

    imageLoadError(e: any) {
      e.target.src = require('~/assets/images/no-image.jpg');
    }
  }
</script>
<style scoped>
  .box {
    margin-top: 5px;
  }

  .image img {
    width: 128px;
    height: 128px;
    border: solid 1px #ececec;
  }
</style>
