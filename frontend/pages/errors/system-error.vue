<template>
    <div class="hero is-warning is-fullheight">
      <div class="hero-body is-warning">
        <div class="container has-text-centered">
          <span class="icon">
           <font-awesome-icon :icon="['fas','radiation']" aria-hidden="true" class="has-text-danger"></font-awesome-icon></span>
          <h1 class="title">
            System Error
          </h1>
          <div class="field">
            <nuxt-link to="/" class="button is-success">back to home page</nuxt-link>
          </div>
        </div>
      </div>
    </div>
</template>
