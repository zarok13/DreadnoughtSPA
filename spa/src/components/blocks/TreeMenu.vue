<template>
  <div>
    <!-- <div :style="indent">{{ title }}</div> -->
    <li>
        <router-link class="nav-link" to="/">{{ title }}</router-link>
    </li>
    <tree-menu 
      v-for="(node, index) in nodes" 
      v-bind:key="index"
      :nodes="node.sub_menu"
      :title="node.title"
      :depth="depth + 1"
    >
    </tree-menu>
  </div>
</template>
<script>
  export default { 
    props: [ 'title', 'nodes', 'depth' ],
    name: 'tree-menu',
    computed: {
      indent() {
        return { transform: `translate(${this.depth * 50}px)` }
      }
    }
  }
</script>