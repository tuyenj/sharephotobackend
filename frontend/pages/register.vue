<template>
  <div class="container">
    <div class="box">
      <h2 class="title">ユーザー登録</h2>
      <div class="field">
        <div class="control">
          <p class="control has-icons-left has-icons-right">
            <input class="input is-primary" type="text" placeholder="名前">
            <span class="icon is-small is-left">
            <font-awesome-icon :icon="['fas','address-book']" aria-hidden="true"></font-awesome-icon>
          </span>
          </p>
        </div>
      </div>

      <div class="field">
        <p class="control has-icons-left has-icons-right">
          <input class="input" type="email" placeholder="メールアドレス">
          <span class="icon is-small is-left">
          <font-awesome-icon :icon="['fas','envelope']" aria-hidden="true"></font-awesome-icon>
        </span>
        </p>
      </div>
      <div class="field">
        <p class="control has-icons-left">
          <input class="input" type="password" placeholder="パスワード">
          <span class="icon is-small is-left">
          <font-awesome-icon :icon="['fas','lock']" aria-hidden="true"></font-awesome-icon>
        </span>
        </p>
      </div>
      <div class="field">
        <button class="button is-info">register</button>
        <button class="button is-danger">cancel</button>
      </div>
    </div>
  </div>
</template>
