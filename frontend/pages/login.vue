<template>
  <div class="container">
    <div class="box column is-half is-offset-one-quarter">
      <h2 class="title is-6">ユーザーログイン</h2>
      <form @submit.prevent="login">
        <div class="field">
          <p class="control has-icons-left has-icons-right">
            <input class="input" type="email" placeholder="メールアドレス" v-model="formData.email">
            <span class="icon is-small is-left">
          <font-awesome-icon :icon="['fas','envelope']" aria-hidden="true"></font-awesome-icon>
        </span>
          </p>
          <div v-if="errors.email !==''">
            <p v-for="er in errors.email" class="is-size-7 has-text-danger">{{er}}</p>
          </div>
        </div>
        <div class="field">
          <p class="control has-icons-left">
            <input class="input" type="password" placeholder="パスワード" v-model="formData.password">
            <span class="icon is-small is-left">
          <font-awesome-icon :icon="['fas','lock']" aria-hidden="true"></font-awesome-icon>
        </span>
          </p>
          <div v-if="errors.password !==''">
            <p v-for="p in errors.password" class="is-size-7 has-text-danger">{{p}}</p>
          </div>
        </div>
        <div class="field">
          <button class="button is-info" type="submit">login</button>
          <button @click="reset" class="button is-danger">cancel</button>
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
      this.$auth.loginWith('local', {
        data: this.formData
      }).then(() => {
        this.$router.push('/');
      }).catch((error: any) => {
        console.error(error);
      });
    };

    reset() {
      this.$router.push('/');
    }
  }
</script>
<style scoped>
  .box {
    margin-top: 10px;
  }
</style>
