<template>
    <li>

<!--    </ul>-->
<!--    <li>-->
        <!-- <div :style="indent">{{ title }}</div> -->
        <!--        <router-link class="nav-link" v-if="slug !== '/'" :to="slug">{{ title }}</router-link>-->
        <!--        <router-link class="nav-link" v-else to="/">{{ title }}</router-link>-->

<!-- {{this.hasChild()}} -->
        {{this.nodes[this.depth]['id'] !== undefined}}
        <!-- <ul v-if="this.list().sub_menu">
            <li>
                <a href="javascript:void(0)" >{{ title}} if</a>
            </li>
        </ul>
        <a v-else  href="javascript:void(0)" >{{ title}} else</a> -->

      <!-- <div v-if="this.hasChild()"> -->
        <tree-menu
                v-for="node in nodes"
                v-bind:key="node.id"
                :nodes="node.sub_menu"
                :title="node.title"
                :slug="node.slug"
                :depth="depth + 1"
                :child=true
        >
        </tree-menu>
      <!-- </div> -->

      <!-- <div v-else> -->
      <!--   <tree-menu
                v-for="node in nodes"
                v-bind:key="node.id"
                :nodes="node.sub_menu"
                :title="node.title"
                :slug="node.slug"
                :depth="node"
                :child=false
        >
        </tree-menu>
      </div> -->
        

        

    </li>
</template>
<script>

  export default { 
    props: [ 'title', 'nodes', 'depth', 'slug' ],
    name: 'tree-menu',
    computed: {
      indent() {
        return { transform: `translate(${this.depth * 50}px)` }
      }
    },
    data(){
      return {
        child:false,
      }
    },
    created(){
      // console.log(this.nodes['id'] !== "undefined");
    },
    methods:{
        hasChild(){
          console.log(typeof this.nodes['sub_menu'] !== "undefined");
            return typeof this.nodes['sub_menu'] !== "undefined";
            // return true
        },
    }
  }
</script>