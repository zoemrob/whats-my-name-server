<script setup lang="ts">
import UsernameInput from './components/UsernameInput.vue';
</script>

<template>
  <div>
    <img
        alt="Vue logo"
        class="logo"
        src="https://github.com/WebBreacher/WhatsMyName/blob/main/whatsmyname.png?raw=true"
        width="50%"
    />

    <div class="wrapper">
      <h2>What's My Name - Vue/PHP</h2>
      <UsernameInput />
    </div>
  </div>
</template>

<style scoped>
header {
  line-height: 1.5;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }
}
</style>
