<template>
  <ul v-if="nodes.length" :class="{ 'right chevron': isFirst }">
    <li v-if="isFirst">
      <router-link to="/">Home</router-link>
    </li>
    <li v-for="(item, index) in nodes" :key="index">
      <router-link v-if="item.slug !== null" class="nav-link" :to="item.slug">{{ item.title }}</router-link>
      <a v-else class="nav-link" href="javascript:void(0)">{{ item.title }}</a>
      <tree-menu :nodes="item.sub_menu" v-if="item.sub_menu && item.sub_menu.length" />
    </li>
  </ul>
</template>
<script>

  export default {
    name: 'tree-menu',
    props: {
      nodes: { 
        type: Array, 
        default: () => [] 
      },
      isFirst: { 
        type: Boolean,
        default: false 
       },
    },
  }
</script>