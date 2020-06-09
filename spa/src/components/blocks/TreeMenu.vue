<template>

<!--  <div>-->
<!---->

    <li>

<!--    </ul>-->
<!--    <li>-->
<!--        <div :style="indent">{{ title }}</div>-->
        <!--        <router-link class="nav-link" v-if="slug !== '/'" :to="slug">{{ title }}</router-link>-->
        <!--        <router-link class="nav-link" v-else to="/">{{ title }}</router-link>-->
<!--        {{this.list()}}-->

        <a v-if="this.list().sub_menu" href="javascript:void(0)" >{{ title}} else</a>
        <ul >
            <li>
                <a href="javascript:void(0)" >{{ title}} if</a>
            </li>
        </ul>
<!--        <li>-->
<!--            -->
<!--        </li>-->
        <tree-menu
                v-for="(node, index) in nodes"
                v-bind:key="index"
                :nodes="node.sub_menu"
                :title="node.title"
                :slug="node.slug"
                :depth="node"
        >

        </tree-menu>

    </li>
<!--      </div>-->

</template>
<script>

  export default { 
    props: [ 'title', 'nodes', 'depth', 'slug' ],
    name: 'tree-menu',
    computed: {
      // indent() {
      //   return { transform: `translate(${this.depth * 50}px)` }
      // }
    },
    methods:{
        list(){
            return this.depth;
        },
    }
  }
</script>