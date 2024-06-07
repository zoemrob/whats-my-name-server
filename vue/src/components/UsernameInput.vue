<script setup lang="ts">
import {type Ref, ref} from 'vue';
import {checkUsernameUrl} from "@/lib/api";

const wmnUrl = 'https://raw.githubusercontent.com/WebBreacher/WhatsMyName/main/wmn-data.json';
const username: Ref<string> = ref('');

type WMNData = {
  license: Array<string>,
  authors: Array<string>,
  categories: Array<string>,
  sites: Array<WMNSite>,
};

type WMNSite = {
  name: string,
  uri_check: string,
  uri_pretty: string,
  cat: string,
  e_code: Number,
  e_string: string,
  m_code: Number,
  m_string: string,
  known: Array<string>,
};

async function searchUsername() {
  const wmnData: WMNData = await loadWMN();
  wmnData.sites.slice(0,1).map(async (site: WMNSite) => {
    const url: string = site.uri_check.replace('{account}', username.value);
    const resp = await checkUsernameUrl(url);
    console.log(resp);
  });
}

async function loadWMN(): Promise<WMNData> {
  const resp = await fetch(wmnUrl);
  return await resp.json();
}
</script>

<template>
  <div class="wrapper">
    <input class="input" type="text" v-model="username" autocomplete="off" @keyup.enter="searchUsername" />
    <button type="button" @click="searchUsername">Search</button>
  </div>
</template>

<style scoped>

</style>
