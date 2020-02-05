<template>
  <div class="container">
    <div class="box">
      <h2 class="title">ユーザーログイン</h2>
      <form @submit.prevent="login">
        <div class="field">
          <p class="control has-icons-left has-icons-right">
            <input class="input" type="email" placeholder="メールアドレス" v-model="formData.email">
            <span class="icon is-small is-left">
          <font-awesome-icon :icon="['fas','envelope']" aria-hidden="true"></font-awesome-icon>
        </span>
          </p>
        </div>
        <div class="field">
          <p class="control has-icons-left">
            <input class="input" type="password" placeholder="パスワード" v-model="formData.password">
            <span class="icon is-small is-left">
          <font-awesome-icon :icon="['fas','lock']" aria-hidden="true"></font-awesome-icon>
        </span>
          </p>
        </div>
        <div class="field">
          <button class="button is-info" type="submit">login</button>
          <button class="button is-danger">cancel</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script lang="ts">
  import {Component, Vue} from 'vue-property-decorator';

  @Component
  export default class Login extends Vue {
    name: string = "Login";
    formData: any = {
      email: '',
      password: ''
    }
    $auth: any;

    async login() {
      await this.$auth.loginWith('local', {
        data: this.formData
      });
      this.$router.push('/');
    }
  }
</script>
