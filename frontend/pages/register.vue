<template>
  <div class="container">
    <div class="box">
      <h2 class="title is-6">ユーザー登録</h2>
      <div class="field">
        <div class="control">
          <p class="control has-icons-left has-icons-right">
            <input v-model="userData.name" class="input is-primary" type="text" placeholder="名前">
            <span class="icon is-small is-left">
            <font-awesome-icon :icon="['fas','address-book']" aria-hidden="true"></font-awesome-icon>
          </span>
          </p>
          <div v-if="errors !==''">
            <p v-for="n in errors.name" class="is-size-7 has-text-danger">{{n}}</p>
          </div>
        </div>
      </div>

      <div class="field">
        <p class="control has-icons-left has-icons-right">
          <input v-model="userData.email" class="input" type="email" placeholder="メールアドレス">
          <span class="icon is-small is-left">
          <font-awesome-icon :icon="['fas','envelope']" aria-hidden="true"></font-awesome-icon>
        </span>
        </p>
        <div v-if="errors !==''">
          <p v-for="e in errors.email" class="is-size-7 has-text-danger">{{e}}</p>
        </div>
      </div>
      <div class="field">
        <p class="control has-icons-left">
          <input v-model="userData.password" class="input" type="password" placeholder="パスワード">
          <span class="icon is-small is-left">
          <font-awesome-icon :icon="['fas','lock']" aria-hidden="true"></font-awesome-icon>
        </span>
        </p>
        <div v-if="errors !==''">
          <p v-for="p in errors.password" class="is-size-7 has-text-danger">{{p}}</p>
        </div>
      </div>
      <div class="field">
        <button class="button is-info" @click.stop.prevent="register">register</button>
        <button class="button is-danger">cancel</button>
      </div>
    </div>
  </div>
</template>
<script lang="ts">
  import {Component, Vue} from 'vue-property-decorator';

  @Component
  export default class Register extends Vue {
    name: string = "Register";
    userData = {
      name: '',
      email: '',
      password: ''
    };
    $axios: any;
    $auth: any;

    async register() {
      await this.$axios.$post('register', this.userData).then((data: any) => {
        this.$auth.loginWith("local", {
          data: {
            email: this.userData.email,
            password: this.userData.password
          }
        });
      }).then(() => {
        this.$router.push('/');
      }).catch((err: any) => {
        console.log(err)
      });

    }
  }
</script>
<style scoped>
  .box {
    margin-top: 10px;
  }
</style>
